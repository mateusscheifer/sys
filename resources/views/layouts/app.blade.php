<!DOCTYPE html>

<html x-data="{ darkMode: false }" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
{{--            @livewire('navigation-menu')--}}

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


    <!-- Tudo isso aqui é o Appshell -->
    <div class="antialiased bg-gray-50 dark:bg-gray-900">
<x-navbar></x-navbar>

        <!-- Sidebar -->

        <aside
            class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
            aria-label="Sidenav"
            id="drawer-navigation"
        >
            <div class="overflow-y-auto py-6 px-3 h-full bg-white dark:bg-gray-800">
                <form action="#" method="GET" class="md:hidden mb-2">
                    <label for="sidebar-search" class="sr-only">Search</label>
                    <div class="relative">
                        <div
                            class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none"
                        >
                            <svg
                                class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                ></path>
                            </svg>
                        </div>
                        <input
                            type="text"
                            name="search"
                            id="sidebar-search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Search"
                        />
                    </div>
                </form>
                <ul class="space-y-2">
                    <li>
                        @php
                            $active = request()->routeIs('dashboard') ? true : false;
                        @endphp
                        <a
                            href="{{ route('dashboard') }}"
                            class="flex items-center p-2 font-medium rounded-lg transition duration-75 group
                            {{ $active ? 'text-green600 bg-gray-100 dark:bg-gray-700 dark:text-white' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }}"
                        >
                            <svg
                                aria-hidden="true"
                                class="w-6 h-6 {{ $active ? 'text-[#046C4E] dark:text-gray-400' : 'text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white' }}"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                            </svg>
                            <span class="ml-3 {{ $active ? 'text-green600 dark:text-gray-100' : 'hover:text-gray-900 dark:hover:text-gray-100' }}">
                                Dashboard
                            </span>
                        </a>
                    </li>
                    <li>
                        @php
                            // Verifica se uma das rotas do dropdown está ativa
                            $dropdownActive = request()->routeIs('tag-audio');
                        @endphp
                        <button
                            type="button"
                            class="flex items-center p-2 w-full text-base font-medium rounded-lg transition duration-75 group text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700'
                            aria-controls="dropdown-pages"
                            data-collapse-toggle="dropdown-pages"
                            onclick="document.getElementById('dropdown-pages').classList.toggle('hidden')"
                        >
                            <svg
                                aria-hidden="true"
                                class="w-6 h-6 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap">Tags</span>
                            <svg
                                aria-hidden="true"
                                class="w-6 h-6 text-gray-500 dark:text-gray-400"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                        </button>

                        <ul id="dropdown-pages" class="{{ $dropdownActive ? '' : 'hidden' }} py-2 space-y-2">
                            <li>
                                <a
                                    href="{{ route('tag-audio') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-medium rounded-lg transition duration-75 group
                                    {{ request()->routeIs('tag-audio') ? 'text-green600 bg-gray-100 hover:bg-gray-50 dark:hover:bg-gray-700 dark:text-white'  : 'text-gray-900 bg-gray-100 dark:bg-gray-700 dark:text-white'  }}"
                                >
                                    Tags de Áudio
                                </a>
                            </li>
                        </ul>
                    </li>



                    <li>
                        @php
                            $active = request()->routeIs('api') ? true : false;
                        @endphp
                        <a
                            href="{{ route('api') }}"
                            class="flex items-center p-2 font-medium rounded-lg transition duration-75 group
                            {{ $active ? 'text-green600 bg-gray-100 dark:bg-gray-700 dark:text-white' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }}"
                        >

                            <svg
                                class="w-6 h-6 {{ $active ? 'text-[#046C4E] dark:text-gray-400' : 'text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white' }}"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                fill="none"
                                viewBox="0 0 24 24"
                            >
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 8-4 4 4 4m8 0 4-4-4-4m-2-3-4 14"/>
                            </svg>

                            <span class="flex-1 ml-3 text-left whitespace-nowrap"
                            >API</span
                            >
                        </a>
                    </li>

                    <li>
                        @php
                            $active = request()->routeIs('config') ? true : false;
                        @endphp
                        <a
                            href="{{ route('config') }}"
                            class="flex items-center p-2 font-medium rounded-lg transition duration-75 group
                            {{ $active ? 'text-green600 bg-gray-100 dark:bg-gray-700 dark:text-white' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }}"
                        >
                            <i class="fa-solid fa-gear"></i>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap"
                            >Configurações</span
                            >
                        </a>
                    </li>
                </ul>
                <ul
                    class="pt-5 mt-5 space-y-2 border-t border-gray-200 dark:border-gray-700"
                >
                    <li>
                        @php
                            $active = request()->routeIs('docs') ? true : false;
                        @endphp
                        <a
                            href="{{ route('docs') }}"
                            class="flex items-center p-2 font-medium rounded-lg transition duration-75 group
            {{ $active ? 'text-green600 bg-gray-100 dark:bg-gray-700 dark:text-white' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }}"
                        >
                            <svg
                                aria-hidden="true"
                                class="w-6 h-6 {{ $active ? 'text-[#046C4E] dark:text-gray-400' : 'text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white' }}"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                <path
                                    fill-rule="evenodd"
                                    d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                            <span class="ml-3">Documentação</span>
                        </a>
                    </li>

                    <li>
                        @php
                            $active = request()->routeIs('ajuda') ? true : false;
                        @endphp
                        <a
                            href="{{ route('ajuda') }}"
                            class="flex items-center p-2 font-medium rounded-lg transition duration-75 group
            {{ $active ? 'text-green600 bg-gray-100 dark:bg-gray-700 dark:text-white' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }}"
                        >
                            <svg
                                aria-hidden="true"
                                class="w-6 h-6 {{ $active ? 'text-[#046C4E] dark:text-gray-400' : 'text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white' }}"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                            <span class="ml-3">Ajuda</span>
                        </a>
                    </li>
                </ul>
            </div>

        </aside>
{{--        <!-- faz o restante dos componentes rodarem dentro da appshell -->--}}
{{--        <main class="p-4 md:ml-64 h-auto pt-20">--}}
{{--            {{ $slot }}--}}
{{--        </main>--}}
    </div>



        @stack('modals')



        @livewireScripts
        <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script>
{{--        <x-livewire-alert::flash />--}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <x-livewire-alert::scripts />
        @stack('scripts')

{{--        <script>--}}
{{--            const audio = document.getElementById('audio');--}}
{{--            const playPauseButton = document.getElementById('play-pause');--}}
{{--            const rewindButton = document.getElementById('rewind');--}}
{{--            const forwardButton = document.getElementById('forward');--}}
{{--            const progressBar = document.getElementById('progress-bar');--}}
{{--            const currentTimeLabel = document.getElementById('current-time');--}}
{{--            const durationLabel = document.getElementById('duration');--}}
{{--            const volumeBar = document.getElementById('volume-bar');--}}
{{--            const volumeDownButton = document.getElementById('volume-down');--}}
{{--            const volumeUpButton = document.getElementById('volume-up');--}}

{{--            playPauseButton.addEventListener('click', () => {--}}
{{--                if (audio.paused) {--}}
{{--                    audio.play();--}}
{{--                    playPauseButton.textContent = 'Pause';--}}
{{--                } else {--}}
{{--                    audio.pause();--}}
{{--                    playPauseButton.textContent = 'Play';--}}
{{--                }--}}
{{--            });--}}

{{--            rewindButton.addEventListener('click', () => {--}}
{{--                audio.currentTime = Math.max(0, audio.currentTime - 10);--}}
{{--            });--}}

{{--            forwardButton.addEventListener('click', () => {--}}
{{--                audio.currentTime = Math.min(audio.duration, audio.currentTime + 10);--}}
{{--            });--}}

{{--            audio.addEventListener('loadedmetadata', () => {--}}
{{--                durationLabel.textContent = formatTime(audio.duration);--}}
{{--            });--}}

{{--            audio.addEventListener('timeupdate', () => {--}}
{{--                progressBar.value = (audio.currentTime / audio.duration) * 100;--}}
{{--                currentTimeLabel.textContent = formatTime(audio.currentTime);--}}
{{--            });--}}

{{--            progressBar.addEventListener('input', () => {--}}
{{--                const newTime = (progressBar.value / 100) * audio.duration;--}}
{{--                audio.currentTime = newTime;--}}
{{--            });--}}

{{--            volumeBar.addEventListener('input', () => {--}}
{{--                audio.volume = volumeBar.value / 100;--}}
{{--            });--}}

{{--            volumeDownButton.addEventListener('click', () => {--}}
{{--                volumeBar.value = Math.max(0, volumeBar.value - 10);--}}
{{--                audio.volume = volumeBar.value / 100;--}}
{{--            });--}}

{{--            volumeUpButton.addEventListener('click', () => {--}}
{{--                volumeBar.value = Math.min(100, volumeBar.value + 10);--}}
{{--                audio.volume = volumeBar.value / 100;--}}
{{--            });--}}

{{--            function formatTime(seconds) {--}}
{{--                const minutes = Math.floor(seconds / 60);--}}
{{--                const secs = Math.floor(seconds % 60);--}}
{{--                return `${minutes}:${secs < 10 ? '0' + secs : secs}`;--}}
{{--            }--}}
{{--        </script>--}}
    </body>
</html>
