<div class="mb-10">

    <h1 class="text-xl font-bold p-2">Feeder Name : {{ $feeder->name }}</h1>      
    <livewire:search-phase  :feederId="$feeder->id"/>

        <table class="table">
            <thead >
                <tr>
                    <th>Name</th>
                    <th class="!text-center w-[150px]">State</th>
                    <th class="!text-center w-[400px]">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($feeder_phases as $feeder_phase)
                    <tr class="row-list">
                        <td> 
                            <strong>{{ $feeder_phase->name }}</strong>

                        @if ($feeder_phase->state == 'draft')
                            <td class="text-center"><span
                                    class="state inactive">{{ $feeder_phase->state }}</span>
                            </td>
                        @else
                            <td class="text-center"><span
                                    class="state success">{{ $feeder_phase->state }}</span>
                            </td>
                        @endif

                        <td class="!text-center">
                            <button
                                wire:click="$dispatch('openModal', {component: 'edit-phase', arguments: { feeder_phase: {{ $feeder_phase->id}} , feeder_id:{{$feeder->id}}  }})"
                                class="action success"><i
                                    class="fa-solid fa-pen-to-square mr-1"></i>Edit</button>
                            <button
                                wire:click="$dispatch('openModal', {component: 'del-phase', arguments: { feeder_phase: {{ $feeder_phase->id }} }})"class="action danger"><i
                                    class="fa-solid fa-trash mr-1"></i>Del</button>
                            <button
                                wire:click="$dispatch('openModal', {component: 'view-phase', arguments: { feeder_phase: {{ $feeder_phase->id }} , feeder_id:{{$feeder->id}} }})"
                                class="action warning"><i
                                    class="fa-solid fa-eye mr-1"></i>View</button>

                        </th>
                    </tr>
                @endforeach
        </table>

        
        <div class="mt-5 pl-4">
            @if ($empty)
                <p>No feeder phases in this feeder.</p>
            @elseif ($notfound)
                <p>No feeder phases found matching the search.</p>
            @endif
        </div>


        <div class="mt-5">
        {{ $feeder_phases->links('http::paginate.custom-pagination') }}
        </div>

</div>
