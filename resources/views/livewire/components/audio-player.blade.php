<div>
    <div id="audio-player" class="max-w-lg mx-auto p-4 bg-gray-800 rounded-lg shadow-lg">
    <audio id="audio" src="{{route('streamAudio')}}" preload="metadata"></audio>
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
    <div class="flex items-center justify-between mt-4">
        <label for="playback-rate" class="text-white">Speed:</label>
        <select id="playback-rate" class="bg-gray-600 text-white rounded p-2">
            <option value="0.5">0.5x</option>
            <option value="1" selected>1x</option>
            <option value="1.5">1.5x</option>
            <option value="2">2x</option>
        </select>
    </div>
</div>



<!-- component -->
<div id="audio-player"  class="flex min-h-screen items-center justify-center bg-gray-100">
    <div class="w-2/3">
        <div class="bg-white border-slate-100 dark:bg-slate-800 dark:border-slate-500 border-b rounded-t-xl p-4 pb-6 sm:p-10 sm:pb-8 lg:p-6 xl:p-10 xl:pb-8 space-y-6 sm:space-y-8 lg:space-y-6 xl:space-y-8  items-center">
            <div class="flex items-center space-x-4">
                <img src="https://img.freepik.com/free-psd/square-flyer-template-maximalist-business_23-2148524497.jpg?w=1800&t=st=1699458420~exp=1699459020~hmac=5b00d72d6983d04966cc08ccd0fc1f80ad0d7ba75ec20316660e11efd18133cd" alt="" width="88" height="88" class="flex-none rounded-lg bg-slate-100" loading="lazy" />
                <div class="min-w-0 flex-auto space-y-1 font-semibold">
                    <p class="text-cyan-500 dark:text-cyan-400 text-sm leading-6">
                        <abbr title="Track">Track:</abbr> 05
                    </p>
                    <h2 class="text-slate-500 dark:text-slate-400 text-sm leading-6 truncate">
                        Music: New Album The Lorem
                    </h2>
                    <p class="text-slate-900 dark:text-slate-50 text-lg">
                        Spotisimo
                    </p>
                </div>
            </div>
            <div class="space-y-2">
                <input
                    type="range"
                    id="progress-bar"
                    class="w-full h-2 bg-gray-300 rounded-lg cursor-pointer"
                    value="0"
                    min="0"
                    max="100"
                />
                <div class="flex justify-between text-sm leading-6 font-medium tabular-nums">
                    <div id="current-time" class="text-cyan-500 dark:text-slate-100">0:00</div>
                    <div id="duration" class="text-slate-500 dark:text-slate-400">3:20</div>
                </div>
            </div>
        </div>
        <div class="bg-slate-50 text-slate-500 dark:bg-slate-600 dark:text-slate-200 rounded-b-xl flex items-center">
            <div class="flex-auto flex items-center justify-evenly">
                <button id="rewind" type="button" aria-label="Rewind 10 seconds">
                    <svg width="24" height="24" fill="none">
                        <path d="M6.492 16.95c2.861 2.733 7.5 2.733 10.362 0 2.861-2.734 2.861-7.166 0-9.9-2.862-2.733-7.501-2.733-10.362 0A7.096 7.096 0 0 0 5.5 8.226" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M5 5v3.111c0 .491.398.889.889.889H9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
            <button id="play-pause" type="button" class="bg-white text-slate-900 dark:bg-slate-100 dark:text-slate-700 flex-none -my-2 mx-auto w-20 h-20 rounded-full ring-1 ring-slate-900/5 shadow-md flex items-center justify-center" aria-label="Pause">
                <svg width="30" height="32" fill="currentColor">
                    <rect x="6" y="4" width="4" height="24" rx="2" />
                    <rect x="20" y="4" width="4" height="24" rx="2" />
                </svg>
            </button>
            <div class="flex-auto flex items-center justify-evenly">
                <button id="forward" type="button" aria-label="Skip 10 seconds">
                    <svg width="24" height="24" fill="none">
                        <path d="M17.509 16.95c-2.862 2.733-7.501 2.733-10.363 0-2.861-2.734-2.861-7.166 0-9.9 2.862-2.733 7.501-2.733 10.363 0 .38.365.711.759.991 1.176" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M19 5v3.111c0 .491-.398.889-.889.889H15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <div class="flex items-center justify-between">
                    <select id="playback-rate" class="  rounded ">
                        <option value="0.5">0.5x</option>
                        <option value="1" selected>1x</option>
                        <option value="1.5">1.5x</option>
                        <option value="2">2x</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        const audio = document.getElementById('audio');
        const playPauseButton = document.getElementById('play-pause');
        const rewindButton = document.getElementById('rewind');
        const forwardButton = document.getElementById('forward');
        const progressBar = document.getElementById('progress-bar');
        const currentTimeLabel = document.getElementById('current-time');
        const durationLabel = document.getElementById('duration');
        const volumeBar = document.getElementById('volume-bar');
        const volumeDownButton = document.getElementById('volume-down');
        const volumeUpButton = document.getElementById('volume-up');
        const playbackRateSelector = document.getElementById('playback-rate');

        if (playPauseButton && audio) {
            playPauseButton.addEventListener('click', () => {
                if (audio.paused) {
                    audio.play();
                    playPauseButton.textContent = 'Pause';
                } else {
                    audio.pause();
                    playPauseButton.textContent = 'Play';
                }
            });
        }

        if (rewindButton && audio) {
            rewindButton.addEventListener('click', () => {
                audio.currentTime = Math.max(0, audio.currentTime - 10);
            });
        }

        if (forwardButton && audio) {
            forwardButton.addEventListener('click', () => {
                audio.currentTime = Math.min(audio.duration, audio.currentTime + 10);
            });
        }

        if (audio) {
            audio.addEventListener('loadedmetadata', () => {
                if (durationLabel) {
                    durationLabel.textContent = formatTime(audio.duration);
                }
            });

            audio.addEventListener('timeupdate', () => {
                if (progressBar) {
                    progressBar.value = (audio.currentTime / audio.duration) * 100;
                }
                if (currentTimeLabel) {
                    currentTimeLabel.textContent = formatTime(audio.currentTime);
                }
            });
        }

        if (progressBar && audio) {
            progressBar.addEventListener('input', () => {
                const newTime = (progressBar.value / 100) * audio.duration;
                audio.currentTime = newTime;
            });
        }

        if (volumeBar && audio) {
            volumeBar.addEventListener('input', () => {
                audio.volume = volumeBar.value / 100;
            });
        }

        if (volumeDownButton && volumeBar && audio) {
            volumeDownButton.addEventListener('click', () => {
                volumeBar.value = Math.max(0, volumeBar.value - 10);
                audio.volume = volumeBar.value / 100;
            });
        }

        if (volumeUpButton && volumeBar && audio) {
            volumeUpButton.addEventListener('click', () => {
                volumeBar.value = Math.min(100, volumeBar.value + 10);
                audio.volume = volumeBar.value / 100;
            });
        }

        if (playbackRateSelector && audio) {
            playbackRateSelector.addEventListener('change', () => {
                audio.playbackRate = playbackRateSelector.value;
            });
        }

        function formatTime(seconds) {
            const minutes = Math.floor(seconds / 60);
            const secs = Math.floor(seconds % 60);
            return `${minutes}:${secs < 10 ? '0' + secs : secs}`;
        }
    </script>

@endpush
</div>
