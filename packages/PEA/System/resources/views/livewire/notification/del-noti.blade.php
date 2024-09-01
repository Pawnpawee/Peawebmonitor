<div>
    
    <div id="popup-modal" tabindex="-1" class="modal-div">
        <div class="relative p-4 w-full max-h-full">
            <div class="relative bg-white rounded-lg  dark:bg-gray-700">
                
                <div class="p-4 md:p-5 text-center">
                    <i class="fa-solid fa-circle-exclamation text-3xl text-red-600 mb-2"></i>
                    <h3 class="mb-5 text-md font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this transformer?</h3>
                    <button wire:click="delete" type="button" class="action danger">
                        Yes
                    </button>
                    <button wire:click="close" type="button" class="action cancle">
                        No</button>
                </div>
            </div>
        </div>
    </div>