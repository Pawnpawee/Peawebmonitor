<div class="mb-10">

    <livewire:search-feeder />

        <table class="table">
            <thead >
                <tr>
                    <th>Feeder</th>
                    <th class="!text-center w-[150px]">State</th>
                    <th class="!text-center w-[400px]">Action</th>
                </tr>
            </thead>

            <tbody>
            @foreach ($feeders as $feeder)
            <tr  class="row-list">
                <td>
                    <strong>{{$feeder->name}}</strong> <br>
                    <small>{{$feeder->description}}</small>
                </td>
                
                @if ($feeder->state == 'draft')
                <td class="text-center"><span class="state inactive">{{$feeder->state}}</span></td>
                @else
                <td class="text-center"><span class="state success">{{$feeder->state}}</span></td>
                @endif

                <td class="!text-center">
                    <button wire:click="$dispatch('openModal', {component: 'edit-feeder', arguments: { feeder: {{ $feeder->id }} }})" class="action success"
                    ><i class="fa-solid fa-pen-to-square mr-1"></i>Edit</button>
                    <button wire:click="$dispatch('openModal', {component: 'del-feeder', arguments: { feeder: {{ $feeder->id }} }})"class="action danger"
                    ><i class="fa-solid fa-trash mr-1"></i>Del</button>
                    <button wire:click="redirectToFeederPhase({{ $feeder->id }})" class="action warning"
                    ><i class="fa-solid fa-eye mr-1"></i>View</button>
                    
                </th>
            </tr>
            @endforeach
        </table>

        <div class="mt-5 pl-4">
            @if ($empty)
                <p>No feeders in this feeder.</p>
            @elseif ($notfound)
                <p>No feeders found matching the search.</p>
            @endif
        </div>


        <div class="mt-5">
        {{ $feeders->links('http::paginate.custom-pagination') }}
        </div>

</div>