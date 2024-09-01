<div class="w-full">
    <div>
        <ul class="flex flex-row space-x-10 mb-5">
            <a href="#" class="">
                <li class="px-5 py-2 hover:bg-primary hover:text-white hover:rounded-full {{ $active=='peak-demand'? "bg-primary rounded-full text-white":"" }}">
                    Peak Demand
                </li>
            </a>
            <a href="#" class="">
                <li class="px-5 py-2 hover:bg-primary hover:text-white hover:rounded-full {{ $active=='capacity'? "bg-primary rounded-full text-white":"" }}">
                    Capacity of Equipment
                </li>
            </a>
            <a href="{{ route('http::asset.prioritize.transformer.list') }}" class="">
                <li class="px-5 py-2 hover:bg-primary hover:text-white hover:rounded-full {{ $active=='prioritize'? "bg-primary rounded-full text-white":"" }}">
                    Prioritize Equipment
                </li>
            </a>
            <a href="{{ route('http::asset.parameter.transformer.list') }}" class="">
                <li class="px-5 py-2 hover:bg-primary hover:text-white hover:rounded-full {{ $active=='parameter'? "bg-primary rounded-full text-white":"" }}">
                    Parameter Setting
                </li>
            </a>
        </ul>
    </div>
</div>