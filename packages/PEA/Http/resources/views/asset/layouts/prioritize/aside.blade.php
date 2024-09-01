<aside class="top-0 left-0 z-40 w-full pr-4 h-screen transition-transform -translate-x-full sm:translate-x-0">
    <div class="h-full p-3 overflow-y-auto bg-gray-50">
        <ul class="font-medium">
            <li>
                <a href="{{ route('http::asset.parameter.transformer.list') }}" class="flex items-center p-2 rounded-full hover:bg-secondary group {{ $active=='transformer'?"bg-secondary":"" }}">
                    <span class="ms-3">Transformer</span>
                </a>
            </li>
            <li>
                <a href="{{ route('http::asset.parameter.line.list') }}" class="flex items-center p-2 rounded-full hover:bg-secondary group {{ $active=='line'?"bg-secondary":"" }}">
                    <span class="ms-3">Line</span>
                </a>
            </li>
            <li>
                <a href="{{ route('http::asset.parameter.cb.list') }}" class="flex items-center p-2 rounded-full hover:bg-secondary group {{ $active=='cb'?"bg-secondary":"" }}">
                    <span class="ms-3">CB</span>
                </a>
            </li>
{{--            <li>--}}
{{--                <a href="{{ route('http::asset.parameter.meter.list') }}" class="flex items-center p-2 rounded-full hover:bg-secondary group {{ $active=='meter'?"bg-secondary":"" }}">--}}
{{--                    <span class="ms-3">Meter</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="{{ route('http::asset.parameter.dtms.list') }}" class="flex items-center p-2 rounded-full hover:bg-secondary group {{ $active=='dtms'?"bg-secondary":"" }}">--}}
{{--                    <span class="ms-3">DTMS Module</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="{{ route('http::asset.parameter.pv.list') }}" class="flex items-center p-2 rounded-full hover:bg-secondary group {{ $active=='pv'?"bg-secondary":"" }}">--}}
{{--                    <span class="ms-3">PV</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="{{ route('http::asset.parameter.bess.list') }}" class="flex items-center p-2 rounded-full hover:bg-secondary group {{ $active=='bess'?"bg-secondary":"" }}">--}}
{{--                    <span class="ms-3">Bess</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="{{ route('http::asset.parameter.ev-charger.list') }}" class="flex items-center p-2 rounded-full hover:bg-secondary group {{ $active=='ev-charger'?"bg-secondary":"" }}">--}}
{{--                    <span class="ms-3">EV Charger</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="{{ route('http::asset.parameter.arrestor.list') }}" class="flex items-center p-2 rounded-full hover:bg-secondary group {{ $active=='arrestor'?"bg-secondary":"" }}">--}}
{{--                    <span class="ms-3">Arrestor</span>--}}
{{--                </a>--}}
{{--            </li>--}}
        </ul>
    </div>
</aside>