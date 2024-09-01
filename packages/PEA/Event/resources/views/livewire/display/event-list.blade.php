<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="table">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Device
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Date Time
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Feeder
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Events

                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Value
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Location
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Status
                    </div>
                </th>
            </tr>
            </thead>
            <tbody>
            @forelse($events as $event)
                <tr class="row-list">
                    <th scope="row" class="row-list-head">
                        {{--                        {{ object_get($event,'device.name','null device')}}--}}
                    </th>
                    <td class="px-6 py-4">
                        {{ object_get($event,'created_at','event timestamp')}}
                    </td>
                    <td class="px-6 py-4">
                        {{--                        {{ object_get($event,'feeder.name','null feeder')}}--}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $event->full_event_name}}
                    </td>
                    <td class="px-6 py-4">
                        {{ object_get($event,'value','null device')}}
                    </td>
                    <td class="px-6 py-4">
                        {{--                        {{ object_get($event,'feeder.microgrid','null microgrid')}}--}}
                    </td>
                    <td class="px-6 py-4">
                        <span class="{{$event->state == 'alarm'? 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300':'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300'}}text-sm font-medium me-2 px-2.5 py-0.5 rounded-full">{{$event->state}}</span>
                    </td>
                </tr>
            @empty
                <tr class="row-list">
                    <th scope="row"
                        class="row-list-head text-center"
                        colspan="7">
                        No Events
                    </th>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

</div>
