@if(Session::has('message'))
    <?php
        $message = Session::get('message');
        if(strpos($message, '::') !== false){
            $msgs = explode('::', $message);
            $message = $msgs[1];
            $type = $msgs[0];
        }
        else{
            $type = 'info';
        }
    ?>

    <div class="alert alert-{{ $type }}">
        <p class="font-medium">{{ $message }}</p>
    </div>
@endif
