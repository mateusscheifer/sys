<x-guest-layout>
    <x-header></x-header>
    <section class="bg-white dark:bg-gray-900 mt-20">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
{{--            <a href="#" class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-gray-700 bg-gray-100 rounded-full dark:bg-gray-800 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700" role="alert">--}}
{{--                <span class="text-xs bg-primary-600 rounded-full text-white px-4 py-1.5 mr-3">Novo</span> <span class="text-sm font-medium">A Versão 2.0 foi lançada! Teste agora</span>--}}
{{--                <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>--}}
{{--            </a>--}}
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Deixe a sua mensagem ser Ouvida</h1>
            <p class="mb-4 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Adicione áudios às suas páginas de forma fácil e rápida.</p>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Crie automaticamente um áudio personalizado com o conteúdo da sua página usando IA.</p>
            <div class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                <a href="{{route('login')}}" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center  rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                    Teste agora
                    <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
                <a href="#" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    <svg class="mr-2 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path></svg>
                    Demonstração
                </a>
            </div>
            <section class="bg-white dark:bg-gray-900 mt-20">
                <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
                    <div class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
                        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Dê voz aos seus projetos.</h2>
                        <p class="mb-4">Crie áudios profissionais a partir de qualquer texto de forma rápida e intuitiva. Nossa ferramenta de conversão de texto em áudio, alimentada por inteligência artificial, oferece resultados impressionantes, garantindo a máxima qualidade sonora.
                        </p>
                        <p>Com uma vasta seleção de vozes, você pode encontrar o tom perfeito para sua mensagem, seja para podcasts, audiobooks, leitura de newsletters ou qualquer outro projeto.
                            Além disso, você pode integrar nossa solução diretamente em seus sistemas através da nossa API.</p>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mt-8">
                        <img class="w-full rounded-lg" src="/section1.png" alt="office content 1">
                        <img class="mt-4 w-full lg:mt-10 rounded-lg" src="/section2.png" alt="office content 2">
                    </div>
                </div>
            </section>
        </div>
    </section>
{{--<x-text-to-audio></x-text-to-audio>--}}

    <x-footer></x-footer>

</x-guest-layout>
