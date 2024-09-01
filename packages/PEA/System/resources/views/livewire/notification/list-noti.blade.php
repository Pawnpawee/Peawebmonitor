<div class="mb-10">

    <livewire:search-noti />
    
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-3">
        <table class="table">
            <thead >
                <tr>
                    <td>Name</th>
                    <td>Subject</th>
                    <td>Type</th>
                    <td>State</th>
                    <th class="!text-center w-[400px]">Action</th>
                </tr>
            </thead>

            <tbody>
            
            @foreach ($notis as $noti)
            <tr  class="row-list">
                <th  class="row-list-head">
                    {{$noti->name}}
                </th>
                <td class="px-6 py-4">
                    {{object_get($noti, 'subject')}}
                </td>
                <td class="px-6 py-4">
                    {{$noti->type}}
                </td>
                @if ($noti->state == 'draft')
                <td class="px-6 py-4"><span class="state inactive">
                    {{$noti->state}}
                </span></td>
                @else 
                <td class="px-6 py-4"><span class="state success">
                    {{$noti->state}}
                </span></td>
                @endif 

                <td>
                    <button 
                    wire:click="$dispatch('openModal', {component: 'edit-noti', arguments: { noti: {{ $noti->id }} }})" 
                    class="action success"
                    ><i class="fa-solid fa-pen-to-square mr-1"></i>Edit</button>
                    <button 
                    wire:click="$dispatch('openModal', {component: 'del-noti', arguments: { noti: {{ $noti->id }} }})"
                    class="action danger"
                    ><i class="fa-solid fa-trash mr-1"></i>Del</button>
                    <button 
                    wire:click="$dispatch('openModal', {component: 'view-noti', arguments: { noti: {{ $noti->id }} }})" 
                    class="action warning"
                    ><i class="fa-solid fa-eye mr-1"></i>View</button>
                </th>
            </tr>
            @endforeach
        </table>
    </div>

    {{ $notis->links('http::paginate.custom-pagination') }}
</div>