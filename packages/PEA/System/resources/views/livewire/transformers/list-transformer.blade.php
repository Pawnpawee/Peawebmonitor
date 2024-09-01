<div class="mb-10">

    <livewire:search-transformer />
    
        <table class="table">
            <thead >
                <tr>
                    <th>Microgrid</th>
                    <th>Transformer</th>
                    <th class="!text-center w-[150px]">State</th>
                    <th class="!text-center w-[400px]">Action</th>
                </tr>
            </thead>

            <tbody>
            
            @foreach ($transformers as $transformer)
            <tr  class="row-list">
                <td>
                    {{ object_get($transformer, 'microgrid.name')}}
                </td>
                <td>
                    <strong>{{$transformer->name}}</strong> <br>

                    <span class="bordered-badge info">
                        Location :
                        {{ number_format($transformer->latitude, 4) }} ,
                        {{ number_format($transformer->longitude, 4) }}
                    </span>
                </td>
                

                @if ($transformer->state == 'draft')
                <td class="text-center"><span class="state inactive">
                    {{$transformer->state}}
                </span></td>
                @else 
                <td class="text-center"><span class="state success">
                    {{$transformer->state}}
                </span></td>
                @endif 

                <td class="!text-center">
                    <button 
                    wire:click="$dispatch('openModal', {component: 'edit-transformer', arguments: { transformer: {{ $transformer->id }} }})" 
                    class="action success"
                    ><i class="fa-solid fa-pen-to-square mr-1"></i>Edit</button>
                    <button 
                    wire:click="$dispatch('openModal', {component: 'del-transformer', arguments: { transformer: {{ $transformer->id }} }})"
                    class="action danger"
                    ><i class="fa-solid fa-trash mr-1"></i>Del</button>
                    <button 
                    wire:click="$dispatch('openModal', {component: 'view-transformer', arguments: { transformer: {{ $transformer->id }} }})" 
                    class="action warning"
                    ><i class="fa-solid fa-eye mr-1"></i>View</button>
                </td>
            </tr>
            @endforeach
        </table>

        <div class="mt-5 pl-4">
            @if ($empty)
                <p>No transformers phases in this feeder.</p>
            @elseif ($notfound)
                <p>No transformers found matching the search.</p>
            @endif
        </div>


            <div class="mt-5">
            {{ $transformers->links('http::paginate.custom-pagination') }}
            </div>

</div>