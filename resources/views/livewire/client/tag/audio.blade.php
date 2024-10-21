<div class="p-6">

    <div class="space-y-5">
        <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Newsletter de Segunda</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">https://flowbite.com/docs/components/card/#default-card</p>

            <div class="flex justify-between">
                <div class="w-full max-w-2xl">
                    @livewire('components.audio-player')
                </div>
                <a href="{{route('tag-audio-edit',['id'=>1])}}" class="flex items-center">
                    <x-button>
                        Editar
                    </x-button>
                </a>
            </div>
        </div>
    </div>

</div>
