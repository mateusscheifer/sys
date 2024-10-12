<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'TagCast') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts


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

            playPauseButton.addEventListener('click', () => {
                if (audio.paused) {
                    audio.play();
                    playPauseButton.textContent = 'Pause';
                } else {
                    audio.pause();
                    playPauseButton.textContent = 'Play';
                }
            });

            rewindButton.addEventListener('click', () => {
                audio.currentTime = Math.max(0, audio.currentTime - 10);
            });

            forwardButton.addEventListener('click', () => {
                audio.currentTime = Math.min(audio.duration, audio.currentTime + 10);
            });

            audio.addEventListener('loadedmetadata', () => {
                durationLabel.textContent = formatTime(audio.duration);
            });

            audio.addEventListener('timeupdate', () => {
                progressBar.value = (audio.currentTime / audio.duration) * 100;
                currentTimeLabel.textContent = formatTime(audio.currentTime);
            });

            progressBar.addEventListener('input', () => {
                const newTime = (progressBar.value / 100) * audio.duration;
                audio.currentTime = newTime;
            });

            volumeBar.addEventListener('input', () => {
                audio.volume = volumeBar.value / 100;
            });

            volumeDownButton.addEventListener('click', () => {
                volumeBar.value = Math.max(0, volumeBar.value - 10);
                audio.volume = volumeBar.value / 100;
            });

            volumeUpButton.addEventListener('click', () => {
                volumeBar.value = Math.min(100, volumeBar.value + 10);
                audio.volume = volumeBar.value / 100;
            });

            function formatTime(seconds) {
                const minutes = Math.floor(seconds / 60);
                const secs = Math.floor(seconds % 60);
                return `${minutes}:${secs < 10 ? '0' + secs : secs}`;
            }
        </script>
    </body>
</html>
