<div class="mb-10">

    <livewire:search-area />

    <table class="table">
        <thead>
            <tr>
                <th>Area</th>
                <th class="!text-center w-[100px]">Weight</th>
                <th class="!text-center w-[150px]">State</th>
                <th class="!text-center w-[400px]">Action</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($areas as $area)
                <tr class="row-list">
                    <td>
                        <strong>{{ $area->name }}</strong> <br>
                    </td>

                    <td class="text-center">
                        <span class="bordered-badge order">{{ $area->weight }}</span>
                    </td>

                    @if ($area->state == 'draft')
                        <td class="text-center"><span class="state inactive">{{ $area->state }}</span></td>
                    @else
                        <td class="text-center"><span class="state success">{{ $area->state }}</span></td>
                    @endif

                    <td class="!text-center">
                        <button
                            wire:click="$dispatch('openModal', {component: 'edit-area', arguments: { area: {{ $area->id }} }})"
                            class="action success"><i class="fa-solid fa-pen-to-square mr-1"></i>Edit</button>
                        <button
                            wire:click="$dispatch('openModal', {component: 'del-area', arguments: { area: {{ $area->id }} }})"class="action danger"><i
                                class="fa-solid fa-trash mr-1"></i>Del</button>
                       
                    </td>

                </tr>
            @endforeach

        </tbody>

    </table>

    <div class="mt-5 pl-4">
        @if ($empty)
            <p>No areas in this feeder.</p>
        @elseif ($notfound)
            <p>No areas found matching the search.</p>
        @endif
    </div>

    <div class="mt-5">
        {{ $areas->links('http::paginate.custom-pagination') }}
    </div>
</div>
