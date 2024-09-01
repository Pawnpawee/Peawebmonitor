<aside class="top-0 left-0 z-40 w-full pr-4 h-screen transition-transform -translate-x-full sm:translate-x-0">
    <div class="h-full p-3 overflow-y-auto bg-gray-50">
        <ul class="font-medium">
            <li>
                <a href="{{ route('system::microgrid.list') }}" class="flex items-center p-2 rounded-full hover:bg-secondary group {{ $active=='microgrid'?"bg-secondary":"" }}">
                    <span class="ms-3">Microgrid</span>
                </a>
            </li>
            <li>
                <a href="{{ route('system::transformers.list') }}" class="flex items-center p-2 rounded-full hover:bg-secondary group {{ $active=='transformers'?"bg-secondary":"" }}">
                    <span class="ms-3">Transformer</span>
                </a>
            </li>
            <li>
                <a href="{{ route('system::feeder.list') }}" class="flex items-center p-2 rounded-full hover:bg-secondary group {{ $active=='feeder'?"bg-secondary":"" }}">
                    <span class="ms-3">Feeder</span>
                </a>
            </li>
            <li>
                <a href="{{ route('system::area.list') }}" class="flex items-center p-2 rounded-full hover:bg-secondary group {{ $active=='area'?"bg-secondary":"" }}">
                    <span class="ms-3">Area</span>
                </a>
            </li>
        </ul>
    </div>
</aside>