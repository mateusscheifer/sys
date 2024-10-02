

<script src="{{ mix('js/app.js') }}"></script>

<div id="messageBox" class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-12">
    <div class="flex flex-col lg:flex-row gap-8 justify-center">

        <div class="grid grid-cols-2 gap-4 ">
            <div class="p-4 rounded-lg shadow-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 text-white text-center cursor-pointer" data-voice="chloe">
                <img src="/profile2.png" alt="Felipe Costa" class="rounded-full mx-auto mb-2 w-24 h-24 sm:w-16 sm:h-16" />
                <h3 class="text-lg sm:text-xl font-semibold">Chloe Woods</h3>
                <p class="text-sm">Podcaster</p>
            </div>

            <div class="p-4 rounded-lg shadow-lg bg-gray-100 hover:bg-gray-200 text-center cursor-pointer" data-voice="ana">
                <img src="/profile1.png" alt="Sophia Butler" class="rounded-full mx-auto mb-2 w-24 h-24 sm:w-16 sm:h-16" />
                <h3 class="text-lg sm:text-xl font-semibold">Ana Clara</h3>
                <p class="text-sm">Professora</p>
            </div>

            <div class="p-4 rounded-lg shadow-lg bg-gray-100 hover:bg-gray-200 text-center cursor-pointer" data-voice="rafaela">
                <img src="/profile3.png" alt="Thomas Coleman" class="rounded-full mx-auto mb-2 w-24 h-24 sm:w-16 sm:h-16" />
                <h3 class="text-lg sm:text-xl font-semibold">Rafaela Almeida</h3>
                <p class="text-sm">Empresária</p>
            </div>

            <div class="p-4 rounded-lg shadow-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 text-white text-center cursor-pointer" data-voice="rafael">
                <img src="/profile4.png" alt="Bryan Lee Jr." class="rounded-full mx-auto mb-2 w-24 h-24 sm:w-16 sm:h-16" />
                <h3 class="text-lg sm:text-xl font-semibold">Rafael Som</h3>
                <p class="text-sm">Dublador</p>
            </div>

        </div>

        <div class="flex flex-col justify-between w-full lg:w-auto relative">
            <form id="messageFormElement" class="w-full">
                <div class="relative w-full lg:w-80">
      <textarea
          id="gennyTextarea"
          class="p-4 border border-gray-300 rounded-lg w-full h-32 resize-none"
          placeholder="Escolha a sua voz, digite o seu texto e clique em ouvir."
          maxlength="180"
          oninput="updateCharacterCount()"
      ></textarea>
                    <span id="charCount" class="absolute bottom-2 right-2 text-gray-500 text-sm">
        0 / 180
      </span>
                </div>

                <div class="mt-2 w-full lg:w-80">
                    <button type="submit" class="bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800  text-white px-4 py-2 rounded-lg w-full">
                        Ouvir
                    </button>
                </div>
            </form>
        </div>

    </div>

    <!-- Loading Spinner -->
    <div id="loadingSpinner" class="hidden flex justify-center items-center mt-12">
        <div role="status" class="max-w-sm animate-pulse">
            <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-48 mb-4"></div>
            <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[360px] mb-2.5"></div>
            <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 mb-2.5"></div>
            <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[330px] mb-2.5"></div>
            <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[300px] mb-2.5"></div>
            <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[360px]"></div>
            <span class="sr-only">Carregando...</span>
        </div>
    </div>

    <!-- Audio Player (hidden until loaded) -->
    <div class="flex gap-8 mt-12 justify-center">
        <div id="audioPlayer" class="hidden mt-6">
            <div class="flex items-start gap-2.5">
                <div class="flex flex-col gap-2.5 w-full max-w-[320px] leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-xl dark:bg-gray-700">
                    <div class="flex items-center space-x-2 rtl:space-x-reverse">
                        <!-- Play/Pause button -->
                        <button id="playButton" class="inline-flex self-center items-center p-2 text-sm font-medium text-center text-gray-900 bg-gray-100 rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-600" type="button">
                            <svg id="playIcon" class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 12 16">
                                <path d="M3 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm7 0H9a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Z"/>
                            </svg>
                        </button>
                        <!-- Audio visualization (could be replaced with something dynamic) -->
                        <svg aria-hidden="true" class="w-[145px] md:w-[185px] md:h-[40px]" viewBox="0 0 185 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <!-- Rectangles here (as shown in your original code) -->
                        </svg>
                        <span id="audioDuration" class="inline-flex self-center items-center p-2 text-sm font-medium text-gray-900 dark:text-white">0:00</span>
                    </div>
                </div>
                <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots" data-dropdown-placement="bottom-start" class="flex-shrink-0 inline-flex self-center items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-800 dark:focus:ring-gray-600" type="button">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                        <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                    </svg>
                </button>
                <div id="dropdownDots" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-40 dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                        <li>
                            <a id="downloadLink" href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Download</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


</div>

