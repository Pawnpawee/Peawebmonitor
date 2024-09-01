<div class="mb-10">

    <livewire:search-grid />

    <table class="table">
        <thead>
            <tr>
                <th>Microgrid</th>
                <th class="!text-center w-[150px]">State</th>
                <th class="!text-center w-[400px]">Action</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($microgrids as $microgrid)
                <tr class="row-list">
                    <td>
                        <strong>{{ $microgrid->name }}</strong> <br>
                        <small>{{ $microgrid->description }}</small> <br>

                        <span class="bordered-badge info">
                            Location :
                            {{ number_format($microgrid->latitude, 4) }} ,
                            {{ number_format($microgrid->longitude, 4) }}
                        </span>

                    </td>

                    @if ($microgrid->state == 'draft')
                        <td class="text-center"><span class="state inactive">{{ $microgrid->state }}</span></td>
                    @else
                        <td class="text-center"><span class="state success">{{ $microgrid->state }}</span></td>
                    @endif

                    <td class="!text-center">
                        <button
                            wire:click="$dispatch('openModal', {component: 'edit-grid', arguments: { microgrid: {{ $microgrid->id }} }})"
                            class="action success"><i class="fa-solid fa-pen-to-square mr-1"></i>Edit</button>
                        <button
                            wire:click="$dispatch('openModal', {component: 'del-grid', arguments: { microgrid: {{ $microgrid->id }} }})"class="action danger"><i
                                class="fa-solid fa-trash mr-1"></i>Del</button>
                        <button
                            wire:click="$dispatch('openModal', {component: 'view-grid', arguments: { microgrid: {{ $microgrid->id }} }})"
                            class="action warning"><i class="fa-solid fa-eye mr-1"></i>View</button>
                    </td>

                </tr>
            @endforeach

        </tbody>

    </table>

    <div class="mt-5 pl-4">
        @if ($empty)
            <p>No microgrids in this feeder.</p>
        @elseif ($notfound)
            <p>No microgrids found matching the search.</p>
        @endif
    </div>

    <div class="mt-5">
        {{ $microgrids->links('http::paginate.custom-pagination') }}
    </div>
</div>
