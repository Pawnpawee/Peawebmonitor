<div class="flex flex-col lg:flex-row gap-2 mb-5">
    <div class="basis-full lg:basis-1/5">
        {{ Form::label('first_name', null, ['class' => 'required']) }}
    </div>
    <div class="basis-full lg:basis-1/2">
        {{ Form::text('first_name', null, ['class' => 'form-control']) }}
        {{ Form::error('first_name') }}
    </div>
</div>

<div class="flex flex-col lg:flex-row gap-2 mb-5">
    <div class="basis-full lg:basis-1/5">
        {{ Form::label('last_name', null, ['class' => 'required']) }}
    </div>
    <div class="basis-full lg:basis-1/2">
        {{ Form::text('last_name', null, ['class' => 'form-control']) }}
        {{ Form::error('last_name') }}
    </div>
</div>

<div class="flex flex-col lg:flex-row gap-2 mb-5">
    <div class="basis-full lg:basis-1/5">
        {{ Form::label('email', null, ['class' => 'required']) }}
    </div>
    <div class="basis-full lg:basis-1/2">
        {{ Form::text('email', null, ['class' => 'form-control']) }}
        {{ Form::error('email') }}
    </div>
</div>

@if(isset($account) && !empty($account))

    <div class="flex flex-col lg:flex-row gap-2 mb-5">
        <div class="basis-full lg:basis-1/5">
            {{ Form::label('status') }}
        </div>
        <div class="basis-full lg:basis-1/4">
            {{ Form::select('status', ['ACTIVE' => 'Active', 'INACTIVE' => 'Inactive'], null, ['class' =>
            'form-control']) }}
        </div>
    </div>

@else

    <div class="flex flex-col lg:flex-row gap-2 mb-5">
        <div class="basis-full lg:basis-1/5">
            {{ Form::label('password') }}
            <span class="flex mt-2 lg:pr-4 text-xs">* รหัสผ่านต้องประกอบด้วยตัวอักษรภาษาอังกฤษตัวพิมพ์เล็ก, ตัวพิมพ์ใหญ่,
                        ตัวเลขและอักขระพิเศษ (!%*?&)<br>และมีความยาวไม่น้อยกว่า 6 ตัวอักษร</span>
        </div>
        <div class="basis-full lg:basis-1/2">
            {{ Form::password('password', ['class' => 'form-control']) }}
            {{ Form::error('password') }}
        </div>
    </div>

    <div class="flex flex-col lg:flex-row gap-2 mb-5">
        <div class="basis-full lg:basis-1/5">
            {{ Form::label('password_confirmation') }}
        </div>
        <div class="basis-full lg:basis-1/2">
            {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
            {{ Form::error('password_confirmation') }}
        </div>
    </div>

@endif

<div class="flex justify-end gap-2">
    <a href="{{ route('admin::account') }}" class="btn">Cancel</a>
    <button class="btn btn-primary">Save</button>
</div>
