pipeline {

  environment {
    registry = "727613293961.dkr.ecr.ap-southeast-1.amazonaws.com/pea-web-monitor"
    FLEX_CICD_PJT_NAME = 'pea-web-monitor'
    JENKINS_HELM_DOWNSTREAM_JOB_NAME = "pea_webmonitor_helm_deployment"
  }

  agent any
  stages {
    stage('Clone Git Repository') {
      steps {
        script {
          // Set GIT_ENV based on env.GIT_BRANCH
          if (env.GIT_BRANCH == 'origin/develop') {
            env.GIT_ENV = 'develop'
            env.credentialsId = "dev_pea"
            env.APP_URL = "https://pea-web-monitor-develop.flexintelligent.com"
          } else if (env.GIT_BRANCH == 'origin/production') {
            env.GIT_ENV = 'production'
            env.credentialsId = "prod_pea"
            env.APP_URL = "https://pea-web-monitor-prod.flexintelligent.com"
          } else {
            error "Unsupported branch: ${env.GIT_BRANCH}"
          }

          // Define build name and description in Jenkins pipeline.
          currentBuild.displayName = "Deploy on ${env.GIT_BRANCH} [#${BUILD_NUMBER}]"
          
          // Clone Git Repository
          def gitBranch = env.GIT_BRANCH == 'origin/develop' ? 'develop' : 'production'
          git branch: gitBranch,
            credentialsId: 'bb4bb0b0-3515-4c1a-9b21-f2f88834cb02',
            url: 'https://kittichai512@bitbucket.org/flex-dev/peawebmonitor.git'
        }
      }
    }

    //Skip the Sonar Scanner stage if the branch is develop
    stage('Sonar Scanner') {
      when {
        expression { env.GIT_BRANCH == 'origin/production' }
      }
      steps {
        script {
          def scannerHome = tool 'Flex-SonarScanner'
          withSonarQubeEnv('sq1') {
            sh 'printenv'
            sh "${scannerHome}/bin/sonar-scanner -D sonar.projectKey=$FLEX_CICD_PJT_NAME-${env.GIT_ENV} -D sonar.projectName=$FLEX_CICD_PJT_NAME-${env.GIT_ENV} -D sonar.projectBaseDir=$WORKSPACE"
          }
        }
      }
    }

    stage("Quality Gate") {
      when {
        expression { env.GIT_BRANCH == 'origin/production' }
      }
      steps {
        script {
          timeout(time: 1, unit: 'HOURS') {
            def qg = waitForQualityGate()
            if (qg.status != 'OK') {
              echo "Quality gate failed: ${qg.status}"
            }
          }
        }
      }
    }

    stage('Docker Image Process') {
      steps {
        script {
            sh """
                aws ecr get-login-password --region ap-southeast-1 | docker login --username AWS --password-stdin 727613293961.dkr.ecr.ap-southeast-1.amazonaws.com
                ls -al;pwd
                docker build -f Dockerfile-${env.GIT_ENV} -t $registry:${env.GIT_ENV} .
                docker tag $registry:${env.GIT_ENV} ${registry}:${env.GIT_ENV}-build${BUILD_NUMBER}
            """
          }
        }
      }

    stage('Migrate Database') {
      agent {
        docker {
          image "$registry:${env.GIT_ENV}-build${BUILD_NUMBER}"
          args "-v /mnt/efs-laravel-storage:/efs-laravel-storage -v /mnt/efs-nginx-log:/efs-nginx-log -u root:root"
          reuseNode true
        }
      }
      steps {
        script {
            withCredentials([usernamePassword(credentialsId: "${env.credentialsId}", usernameVariable: 'DB_USERNAME', passwordVariable: 'DB_PASSWORD')]) {
                sh """
                    echo Jenkins credentialsId to use is ${env.credentialsId}
                    grep -E 'DB_HOST|DB_DATABASE' /usr/share/nginx/html/$FLEX_CICD_PJT_NAME/.env
                    php /usr/share/nginx/html/$FLEX_CICD_PJT_NAME/artisan migrate --force
                """
          }
        }
      }
    }

    stage('Push Docker Image') {
      steps {
        script {
          sh """
            docker push $registry:${env.GIT_ENV}
            docker push $registry:${env.GIT_ENV}-build${BUILD_NUMBER}
          """

        }
      }
    }

    stage('Service Deployment') {
      steps {
        script {
          build job: "kubernetes_deployments/$JENKINS_HELM_DOWNSTREAM_JOB_NAME", parameters: [
            string(name: 'git_branch', value: "${env.GIT_ENV}")
          ]
        }
      }
    }

    stage('Cleaning Docker Cache') {
      steps {
        script {
          sh """
            docker container prune -f
            echo Your $FLEX_CICD_PJT_NAME-${env.GIT_ENV} application is running on ${env.APP_URL}
          """
        }
      }
    }
  }
}