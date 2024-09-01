<aside class="l-aside lg:flex hidden">
    <div class="relative flex flex-col flex-1 min-h-0 pt-0 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
            <div class="flex-1 px-3 space-y-1 bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                <ul class="pb-2 space-y-2">
                <li>
                    <div class="flex items-center max-w-lg mx-auto">
                        <div class="relative w-full">
                            <input type="text" id="transformer" wire:model="filter.transformer" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label for="transformer" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">ค้นหา Transformer</label>
                            <div class="absolute inset-y-0 end-0 flex items-center pe-3">
                                <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center max-w-lg mx-auto py-3">
                        <div wire:ignore class="relative w-full pr-2 pt-2">
                            <div x-data="Select2"
                                 x-init="register({placeholder: 'ค้นหาด้วยเลข Transformer', tokenSeparators: [','], maximumInputLength: 20 ,maximumSelectionLength:50, allowClear: false})">
                                <select class="select w-full"
                                    name="transformers[]"
                                    x-ref="select"
                                    wire:model="filter.selectedTransformer"
                                    multiple>
                                    @if(!empty($microgrids))
                                        @foreach($microgrids as $key => $microgrid)
                                            <optgroup label="{{ $microgrid->name }}">
                                                @foreach($microgrid->transformers as $key => $transformer)
                                                    <option value="{{ $transformer['name'] }}">{{ $transformer['name'] }}</option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <button class="text-white bg-[#733082] hover:bg-[#652a72] focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-2xl text-sm w-full sm:w-auto px-5 py-2.5 text-center" wire:click="$dispatch('filterClick', { id: 1 })">ค้นหา</button>
                    </div>
                </li>
                <li>
                    <div class="card mt-8 text-xl">
                        <div class="flex items-center justify-between mb-2">
                            <span class="flex items-center">
                                <div class="w-2 h-12 bg-[#733082] mr-2 rounded-xl"></div> 
                                <div>
                                    <span class="block text-[#733082] text-xl">All Area</span>
                                    <span class="block font-bold">100,000</span>
                                </div>
                            </span>
                            <span class="text-gray-600 mt-6">Unit</span>
                            
                        </div>
                    </div>
                </li>
                <li>
                    <div class="card mt-4 text-xl">
                        <h2 class="font-bold text-yellow-700 mb-4">Event Status</h2>
                        <div class="flex items-center justify-between mb-2">
                            <span class="flex items-center">
                                <div class="w-2 h-12 bg-red-600 mr-2 rounded-xl"></div> 
                                <div>
                                    <span class="block text-red-600 text-sm">Alarm</span>
                                    <span class="block font-bold">5</span>
                                </div>
                            </span>
                            <span class="text-gray-600 mt-6">Unit</span>
                            
                        </div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="flex items-center">
                                <div class="w-2 h-12 bg-yellow-400 mr-2 rounded-xl"></div>
                                <div>
                                    <span class="block text-yellow-400 text-sm">Warning</span>
                                    <span class="block font-bold">15</span>
                                </div>
                            </span>
                            <span class="text-gray-600">Unit</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="flex items-center">
                                <div class="w-2 h-12 bg-green-500 mr-2 rounded-xl"></div>
                                <div>
                                    <span class="block text-green-500 text-sm">Normal</span>
                                    <span class="block font-bold">100,000</span>
                                </div>
                            </span>
                            <span class="text-gray-600">Unit</span>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="card mt-4 text-xl">
                        <h2 class="font-bold text-yellow-700 mb-4">Event of the Transformer</h2>
                        <div class="flex items-center justify-between mb-2">
                            <span class="flex items-center">
                                <div class="w-2 h-12 bg-[#733082] mr-2 rounded-xl"></div> 
                                <div>
                                    <span class="block text-[#733082] text-sm">Over Voltage</span>
                                    <span class="block font-bold">10</span>
                                </div>
                            </span>
                            <span class="text-gray-600 mt-6">Unit</span>
                        </div>

                        <div class="flex items-center justify-between mb-2">
                            <span class="flex items-center">
                                <div class="w-2 h-12 bg-[#733082] mr-2 rounded-xl"></div> 
                                <div>
                                    <span class="block text-[#733082] text-sm">Over Current</span>
                                    <span class="block font-bold">5</span>
                                </div>
                            </span>
                            <span class="text-gray-600 mt-6">Unit</span>
                        </div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="flex items-center">
                                <div class="w-2 h-12 bg-[#733082] mr-2 rounded-xl"></div> 
                                <div>
                                    <span class="block text-[#733082] text-sm">Over Capacity</span>
                                    <span class="block font-bold">5</span>
                                </div>
                            </span>
                            <span class="text-gray-600 mt-6">Unit</span>
                        </div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="flex items-center">
                                <div class="w-2 h-12 bg-[#733082] mr-2 rounded-xl"></div> 
                                <div>
                                    <span class="block text-[#733082] text-sm">Under Current</span>
                                    <span class="block font-bold">5</span>
                                </div>
                            </span>
                            <span class="text-gray-600 mt-6">Unit</span>
                        </div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="flex items-center">
                                <div class="w-2 h-12 bg-[#733082] mr-2 rounded-xl"></div> 
                                <div>
                                    <span class="block text-[#733082] text-sm">Under Capacity</span>
                                    <span class="block font-bold">20</span>
                                </div>
                            </span>
                            <span class="text-gray-600 mt-6">Unit</span>
                        </div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="flex items-center">
                                <div class="w-2 h-12 bg-[#733082] mr-2 rounded-xl"></div> 
                                <div>
                                    <span class="block text-[#733082] text-sm">Power Outage</span>
                                    <span class="block font-bold">3</span>
                                </div>
                            </span>
                            <span class="text-gray-600 mt-6">Unit</span>
                        </div>
                    </div>
                </li>
            </div>
        </div>
    </div>
</aside>