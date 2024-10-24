<div class="p-6">

    <div class="space-y-5">
        <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Newsletter de Segunda</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">https://flowbite.com/docs/components/card/#default-card</p>

<<<<<<< HEAD
            <div class="flex justify-between">
                <div class="w-full max-w-2xl">
                    @livewire('components.audio-player',['layout'=>1])
                </div>
                <a href="{{route('tag-audio-edit',['id'=>1])}}" class="flex items-center">
                    <x-button>
                        Editar
                    </x-button>
                </a>
            </div>
        </div>
    </div>

=======

        </div>
        <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Newsletter de Segunda</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">https://flowbite.com/docs/components/card/#default-card</p>

        </div>
    </div>


    <div id="audio-player" class="max-w-lg mx-auto p-4 bg-gray-800 rounded-lg shadow-lg">
        <audio id="audio" src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-17.mp3" preload="metadata"></audio>
        <div class="flex items-center justify-between mb-4">
            <button id="rewind" class="bg-blue-500 text-white p-2 rounded">Rewind 10s</button>
            <button id="play-pause" class="bg-green-500 text-white p-2 rounded">Play</button>
            <button id="forward" class="bg-blue-500 text-white p-2 rounded">Forward 10s</button>
        </div>
        <input
            type="range"
            id="progress-bar"
            class="w-full h-2 bg-gray-300 rounded-lg cursor-pointer"
            value="0"
            min="0"
            max="100"
        />
        <div class="flex items-center justify-between mt-2">
            <span id="current-time" class="text-white">0:00</span>
            <span id="duration" class="text-white">0:00</span>
        </div>
        <div class="flex items-center justify-between mt-4">
            <button id="volume-down" class="bg-blue-500 text-white p-2 rounded">-</button>
            <input
                type="range"
                id="volume-bar"
                class="w-full h-2 bg-gray-300 rounded-lg cursor-pointer mx-2"
                value="100"
                min="0"
                max="100"
            />
            <button id="volume-up" class="bg-blue-500 text-white p-2 rounded">+</button>
        </div>
    </div>


>>>>>>> master
</div>
