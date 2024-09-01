@if($errors->any())
    <div class="alert alert-danger">
        <header class="text-sm font-medium">Ensure that these requirements are met:</header>

        <ul class="list-disc pl-5">
            @foreach($errors->all() as $msg)
                <li>{{ $msg }}</li>
            @endforeach
        </ul>
    </div>
@endif
