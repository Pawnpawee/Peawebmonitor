<div>
    <div class="bg-cyan-500 flex">
        <h1 class="text-2xl p-5">Add Message Template <em class="text-white text-lg not-italic ml-2">Default</em> </h1>
    </div>

    <div class="mx-5">
        <div class="mt-3">
            <label for="name" class="text-base text-cyan-700"> Name
                <input wire:model="name" type="text" name="name" id="name"
                    class="w-1/3 text-sm ml-3 p-1 bg-gray-50 border border-gray-300 text-gray-900 focus:ring-cyan-500 focus:border-cyan-600">
            </label>

            <label for="code" class="text-base text-cyan-700 ml-5"> Code
                <input wire:model="code" type="text" name="code" id="code"
                    class="w-1/3 text-sm ml-3 p-1 bg-gray-50 border border-gray-300 text-gray-900 focus:ring-cyan-500 focus:border-cyan-600">
            </label>
        </div>

        <div class="mt-8">
            <label for="state" class="text-lg text-cyan-700">Email Notification</label>
            <select wire:model="state" id="state"
                class="ml-3 p-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-cyan-500 focus:border-cyan-500">
                <option value="draft">draft</option>
                <option value="published">published</option>

            </select>
        </div>

        <div class="my-5 flex">
            <label for="type" class="text-lg text-cyan-700">Type</label>

            <div class="ml-3 flex items-center me-4 ">
                <input wire:model.live="type" id="sms" type="radio" value="sms" name="type-group"
                    class="w-4 h-4 text-cyan-600 bg-gray-100 border-gray-300 focus:ring-cyan-500">
                <label for="sms" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">SMS</label>
            </div>
            <div class="flex items-center me-4">
                <input wire:model.live="type" id="email" type="radio" value="email" name="type-group"
                    class="w-4 h-4 text-cyan-600 bg-gray-100 border-gray-300 focus:ring-cyan-500">
                <label for="email" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email</label>
            </div>
        </div>

        @if ($type == 'sms')
            <div class="mt-5 block">
                <label for="sms" class="text-lg text-amber-800">SMS</label>
                <textarea wire:model="sms" type="text"
                    class="mt-2 w-full text-sm p-2 bg-gray-50 border border-gray-300 text-gray-900 focus:ring-cyan-500 focus:border-cyan-600">
                </textarea>
            </div>
        @elseif ($type == 'email')
            <div class="mt-5 block">
                <label for="subject" class="text-lg text-amber-800">Email Subject</label>
                <input type="text" wire:model="subject"
                    class="mt-2 w-full text-sm p-2 bg-gray-50 border border-gray-300 text-gray-900 focus:ring-cyan-500 focus:border-cyan-600">
            </div>

            <div class="my-5 block">
                <label for="body" class="text-lg text-amber-800">Email Body (HTML Version)</label>

                <div wire:ignore x-data="myFunction()">
                    <textarea id="editor" wire:model="body"></textarea>
                </div>

            </div>
        @endif

    </div>

    <div class="bg-gray-200 w-full p-4">
        <div class="ms-auto">
            <button wire:click="close" type="button" class="text-blue-600 mx-2">cancel</button>
            <button wire:click="submit" type="button"
                class="mx-2 bg-blue-600 rounded-md px-4 py-3 text-white">Submit</button>
        </div>
    </div>

</div>

@script
    <script>
        
        window.myFunction = function() {

            ClassicEditor
                .create(document.querySelector('#editor'), {
                    toolbar: {
                        items: [
                            'undo', 'redo',
                            '|', 'bold', 'italic',
                            'link', 'blockQuote',
                            '|', 'bulletedList', 'numberedList', 'outdent', 'indent'
                        ],
                        shouldNotGroupWhenFull: true
                    }
                })
                .then(editor => {
                    editor.model.document.on('change:data', () => {
                        @this.set('body', editor.getData());
                    });

                })
                .catch(error => {
                    console.error(error);
                });
        }
    </script>
    
@endscript
