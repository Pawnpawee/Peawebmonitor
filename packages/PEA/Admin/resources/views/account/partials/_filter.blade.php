<div class="items-center justify-between block md:flex">
    <div class="flex items-center mb-4 md:mb-0">
        {{ Form::model(request()->query(), ['url' => route('admin::account'), 'method' => 'get', 'class' => 'relative flex md:items-center w-full gap-3']) }}
            <div class="relative w-full md:w-64 xl:w-96">
                {{ Form::text('name', null, ['class'=>'form-control','placeholder'=>'Name']) }}
            </div>

            <div id="filterPanel" class="z-[99] hidden bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-full dark:bg-gray-700 !translate-y-[54px]">
                <div class="p-4 text-gray-700 dark:text-gray-200">
                    <h3 class="font-semibold mb-2">Advance search</h3>
                    <div class="grid grid-cols-2 gap-3 mb-4">
                        <div class="flex flex-col gap-2">
                            {{ Form::label('email', null, ['class' => 'text-xs']) }}
                            {{ Form::text('email', null, ['class'=>'form-control','placeholder'=>'Email address']) }}
                        </div>
                        <div class="flex flex-col gap-2">
                            {{ Form::label('status', null, ['class' => 'text-xs']) }}
                            {{ Form::select('status', ['Active' =>'Active', 'Inactive' =>'Inactive'] , null, ['class'=>'form-control', 'placeholder'=>'-- Please select status --']) }}
                        </div>
                    </div>

                    <div class="flex justify-end gap-2">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </div>

            <div class="flex space-x-2">
                <button
                    class="btn btn-ghost"
                    data-dropdown-toggle="filterPanel"
                    type="button">
                    <i class="fas fa-sliders-h rotate-90"></i>
                </button>

                <button class="btn btn-primary" type="submit">
                    <i class="far fa-search"></i>
                    <span class="hidden md:inline-block">Search</span>
                </button>
                <a href="{{ route('admin::account') }}" class="btn">
                    <i class="fal fa-undo"></i>
                    <span class="hidden md:inline-block">Clear</span>
                </a>
            </div>

        {{ Form::close() }}
    </div>
    <div class="flex">
        <a href="{{ route('admin::account.create') }}"
            class="btn btn-primary">
            <i class="far fa-plus mr-2"></i> Create Account
        </a>
    </div>

    {{-- {{ Form::model(request()->query(), ['url' => route('admin::account'), 'method' => 'get']) }}
    <div class="grid grid-cols-2 gap-3">
        <div class="grid grid-cols-2 gap-3">
            {{ Form::text('name', '', ['class'=>'form-control','placeholder'=>'Name']) }}
            {{ Form::select('status', ['ACTIVE'=>'Active', 'INACTIVE'=>'Inactive'] , null, ['class'=>'form-control', 'placeholder'=>'-- Please select status --']) }}
        </div>

        <div class="grid grid-cols-2 gap-3">
            <div class="">
                <button class="btn btn-primary" type="submit">
                    <i class="far fa-search"></i> Search
                </button>
                <a href="{{ route('admin::account') }}" class="btn">
                    <i class="fal fa-undo"></i> Clear
                </a>
            </div>
            <div class="text-right">
                <a href="{{ route('admin::account.create') }}"
                   class="btn btn-primary">
                    <i class="far fa-plus mr-2"></i> Create Account
                </a>
            </div>
        </div>
    </div>
    {{ Form::close() }} --}}
</div>
