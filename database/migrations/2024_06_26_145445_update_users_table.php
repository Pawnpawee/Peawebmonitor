<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function(Blueprint $table)
	    {
            $table->dropColumn('name');
            $table->string('password')->nullable()->change();

            $table->string('provider_id')->nullable()->after('id');
            $table->string('provider_type')->nullable()->after('provider_id');
		    $table->string('first_name')->after('provider_type');
            $table->string('last_name')->after('first_name');
            $table->timestamp('last_login')->nullable()->after('remember_token');
            $table->string('employee_id', 45)->nullable()->after('last_login');
            $table->string('department', 45)->nullable()->after('employee_id');
            $table->string('position', 45)->nullable()->after('department');
            $table->string('business_area', 45)->nullable()->after('position');
            $table->string('mobile_phone', 45)->nullable()->after('business_area');
            $table->string('state', 45)->nullable()->after('mobile_phone');
            $table->bigInteger('role_id')->nullable()->after('state');
            $table->softDeletes();
	    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function($table) {
            $table->string('name')->after('id');
            $table->string('password')->change();
            $table->dropColumn('first_name');
            $table->dropColumn('first_name');
		    $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('last_login');
            $table->dropColumn('employee_id');
            $table->dropColumn('department');
            $table->dropColumn('position');
            $table->dropColumn('business_area');
            $table->dropColumn('mobile_phone');
            $table->dropColumn('state');
            $table->dropColumn('role_id');
            $table->dropColumn('deleted_at');
	    });
    }
};
