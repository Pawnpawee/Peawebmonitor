<div>
    {{ html()->form('POST')->route('http::asset.parameter.transformer.store')->open() }}
        <div class="flex flex-row justify-between mb-5">
            <div class="_header">
                <div class="text-xl font-bold text-gold">{{ $sub_header }} Information</div>
            </div>
            <div class="_button">
                <button type="button" class="action cancle">Cancel</button>
                <button type="submit" class="action save">Save</button>
            </div>
        </div>

        <div class="flex flex-row space-x-5">
            <div class="w-1/2">
                <div class="flex flex-row w-full space-x-3">
                    <div class="w-1/2">
                        <div class="mb-5">
                            <label for="device" class="block mb-2 text-sm font-bold text-primary">Device Name</label>
                            <input type="text" id="device" class="input-form" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="w-1/2">
                        <div class="mb-5">
                            <div class="mb-5">
                                <label for="brand" class="block mb-2 text-sm font-bold text-primary">Brand</label>
                                <input type="text" id="brand" class="input-form" placeholder="Brand" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row w-full space-x-3">
                    <div class="w-1/2">
                        <div class="mb-5">
                            <label for="Type" class="block mb-2 text-sm font-bold text-primary">Type</label>
                            <input type="text" id="type" class="input-form" placeholder="Type" required>
                        </div>
                    </div>
                    <div class="w-1/2">
                        <div class="mb-5">
                            <div class="mb-5">
                                <label for="sn" class="block mb-2 text-sm font-bold text-primary">SN</label>
                                <input type="text" id="sn" class="input-form" placeholder="SN" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row w-full space-x-3">
                    <div class="w-1/2">
                        <div class="mb-5">
                            <label for="model" class="block mb-2 text-sm font-bold text-primary">Model</label>
                            <input type="text" id="model" class="input-form" placeholder="Model" required>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row w-full space-x-3">
                    <div class="w-1/2">
                        <div class="mb-5">
                            <label for="v-primary" class="block mb-2 text-sm font-bold text-primary">V Primary</label>
                            <input type="text" id="v-primary" class="input-form" placeholder="V Primary" required>
                        </div>
                    </div>
                    <div class="w-1/2">
                        <div class="mb-5">
                            <div class="mb-5">
                                <label for="v-secondary" class="block mb-2 text-sm font-bold text-primary">V Secondary</label>
                                <input type="text" id="v-secondary" class="input-form" placeholder="V Secondary" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row w-full space-x-3">
                    <div class="w-1/2">
                        <div class="mb-5">
                            <label for="s-rating" class="block mb-2 text-sm font-bold text-primary">S Rating</label>
                            <input type="text" id="s-rating" class="input-form" placeholder="S Rating" required>
                        </div>
                    </div>
                    <div class="w-1/2">
                        <div class="mb-5">
                            <div class="mb-5">
                                <label for="frequency" class="block mb-2 text-sm font-bold text-primary">Frequency</label>
                                <input type="text" id="frequency" class="input-form" placeholder="Frequency" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-1 mx-[40px]">
                <div class="h-full w-1 bg-gray-200 rounded"></div>
            </div>
            <div class="w-1/2">
                <label for="image" class="block mb-2 text-sm font-bold text-primary">Picture</label>
                <img src="https://placehold.co/600x400" alt="">
            </div>
        </div>

        <hr class="bg-gray-200 w-auto h-1 my-4 border-0 rounded">

        <div class="flex flex-row">
            <div class="_header">
                <div class="text-xl font-bold text-gold">{{ $sub_header }} Relation</div>
            </div>
        </div>

        <div class="font-bold text-primary">Location</div>
        <div class="flex flex-row">
            <div class="w-1/2">
                <div class="flex flex-row w-full space-x-3">
                    <div class="w-1/2">
                        <div class="mb-5">
                            <label for="latitude" class="block mb-2 text-sm font-bold text-primary">Latitude</label>
                            <input type="text" id="latitude" class="input-form" placeholder="Latitude" required>
                        </div>
                    </div>
                    <div class="w-1/2">
                        <div class="mb-5">
                            <div class="mb-5">
                                <label for="longitude" class="block mb-2 text-sm font-bold text-primary">Longitude</label>
                                <input type="text" id="Longitude" class="input-form" placeholder="Longitude" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row w-full space-x-3">
                    <div class="w-1/2">
                        <div class="mb-5">
                            <label for="Type" class="block mb-2 text-sm font-bold text-primary">Type</label>
                            <input type="text" id="type" class="input-form" placeholder="Type" required>
                        </div>
                    </div>
                    <div class="w-1/2">
                        <div class="mb-5">
                            <div class="mb-5">
                                <label for="sn" class="block mb-2 text-sm font-bold text-primary">SN</label>
                                <input type="text" id="sn" class="input-form" placeholder="SN" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="font-bold text-primary">Relation with</div>
        <div class="flex flex-row">
            <div class="w-1/2">
                <div class="flex flex-row w-full space-x-3">
                    <div class="mb-5 w-1/3">
                        <select id="microgrid" class="dropdown-form">
                            <option value="" disabled selected>Microgrid</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <div class="mb-5 w-1/3">
                        <select id="feeder" class="dropdown-form">
                            <option value="" disabled selected>Feeder</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <div class="mb-5 w-1/3">
                        <select id="relation" class="dropdown-form">
                            <option value="" disabled selected>Relation</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    {{ html()->form()->close() }}
</div>