<div class="space-y-5">
    <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 relative">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$page->title}}</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            {{$page->url}}
        </p>
        <div class="relative" wire:ignore>
            <pre class="bg-gray-100 p-6 pb-0 rounded-lg border border-gray-300">
                <code id="highlighted-code-block" class="language-html rounded-lg p-0">

                </code>
            </pre>
            <x-button id="copy-code-btn" class="bg-sky-600 hover:bg-sky-800 active:bg-sky-800 absolute top-2 right-2">
                Copiar
            </x-button>
        </div>

        <div class="">
            <div class="mt-6">
                <x-label class="text-[18px] font-semibold" value="Editar Título" />
                <x-input  class="block mt-1 w-full" />
            </div>
            <div class="flex justify-end mt-4">
                <x-button class="">
                    Salvar
                </x-button>
            </div>
        </div>
        <div class="mt-2">
            <div class="w-full">
                @livewire('components.audio-player')
            </div>
            <div class="flex justify-end mt-4">
                <x-button class=""  wire:click="$toggle('showEditUrlModal')">
                    Editar áudio
                </x-button>
            </div>
        </div>

        <div class="border-t-2 mt-6 space-y-3">
            <h1 class="font-bold text-2xl mt-5">Resumo da pagina:</h1>
            <p>Era uma vez, em uma pequena vila cercada por montanhas e rios cristalinos, uma garota chamada Lia. Ela era conhecida por seu sorriso contagiante e seu espírito aventureiro. Lia adorava explorar os arredores da vila, especialmente as florestas e os riachos escondidos. Um dia, enquanto caminhava pela trilha mais distante que já tinha conhecido, ela encontrou algo inesperado: uma pequena raposa dourada, presa em um galho.
                Com o coração cheio de compaixão, Lia ajudou a raposa a se soltar. Em agradecimento, a raposa, com olhos brilhantes e uma cauda que parecia feita de fios de ouro, a conduziu por um caminho secreto. Elas atravessaram florestas e prados até chegarem a um campo encantado, onde tudo era iluminado por uma luz suave e dourada.
                No centro do campo havia uma árvore enorme, com folhas cintilantes e frutos coloridos. A raposa, com um brilho no olhar, revelou que aquele lugar mágico só poderia ser visto por aqueles com um coração puro e uma alma alegre. E ali, ao lado da árvore, Lia encontrou uma comunidade de animais falantes que viviam em perfeita harmonia, compartilhando suas histórias e ajudando uns aos outros.
                A partir daquele dia, Lia voltou ao campo encantado sempre que podia, aprendendo valiosas lições de amizade e alegria com seus novos amigos. Ela compartilhava as histórias com os moradores de sua vila, espalhando a felicidade por onde passava.
                E assim, com cada sorriso, Lia trouxe mais cor ao mundo, mostrando que a bondade e a alegria são os maiores tesouros que alguém pode encontrar.</p>
        </div>
        <div class="border-t-2 mt-6 space-y-3">
            <h1 class="font-bold text-2xl mt-5">Edições:</h1>

            <div class="mt-4">
                <x-label value="ID da tag para criação do player:" />
                <x-input  class="block mt-1 w-full" />
            </div>
            <div class="flex justify-end mt-4">
                <x-button class="">
                    Salvar
                </x-button>
            </div>
        </div>
    </div>



    <x-dialog-modal wire:model="showEditUrlModal">
        <x-slot name="title">
            Editar URL
        </x-slot>

        <x-slot name="content">
            <div class="space-y-4">
                <div>
                    <x-label for="url" value="Título " />
                    <x-input
                        id="url"
                        type="text"
                        class="mt-1 block w-full"
                        wire:model.defer="url"
                        placeholder="Digite o novo Título" />
                    <x-input-error for="url" class="mt-2" />
                </div>
                <div>
                    <x-label for="url" value="Descrição" />
                    <x-input
                        id="url"
                        type="text"
                        class="mt-1 block w-full"
                        wire:model.defer="url"
                        placeholder="Digite a nova Descrição" />
                    <x-input-error for="url" class="mt-2" />
                </div>

                <div>
                    <x-label for="url" value="Imagem" />
                    <div
                        x-data="{ isDragging: false }"
                        x-on:dragover.prevent="isDragging = true"
                        x-on:dragleave.prevent="isDragging = false"
                        x-on:drop.prevent="isDragging = false; $refs.fileInputImage.files = $event.dataTransfer.files; $refs.fileInputImage.dispatchEvent(new Event('change'))"
                        class="border-2 border-dashed rounded-lg p-6 text-center"
                        :class="{ 'border-blue-500 bg-blue-50': isDragging, 'border-gray-300': !isDragging }"
                    >
                        <p class="mb-4 text-gray-500">
                            Solte o arquivo da imagem de fundo ou clique para fazer upload
                        </p>
                        <button
                            type="button"
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                            x-on:click="$refs.fileInputImage.click()"
                        >
                            Selecionar Arquivo
                        </button>

                        <input
                            type="file"
                            class="hidden"
                            wire:model="fileImage"
                            x-ref="fileInputImage"
                            accept="audio/*"
                        />

                        @error('fileImage')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror

                        <div wire:loading wire:target="file" class="mt-4 text-blue-500">
                            Carregando arquivo...
                        </div>

                        @if ($fileImage)
                            <p class="mt-4 text-gray-700">
                                Arquivo carregado: {{ $file->getClientOriginalName() }}
                            </p>
                        @endif
                    </div>
                </div>

                <div>
                    <x-label for="url" value="Audio" />
                    <div
                        x-data="{ isDragging: false }"
                        x-on:dragover.prevent="isDragging = true"
                        x-on:dragleave.prevent="isDragging = false"
                        x-on:drop.prevent="isDragging = false; $refs.fileInput.files = $event.dataTransfer.files; $refs.fileInput.dispatchEvent(new Event('change'))"
                        class="border-2 border-dashed rounded-lg p-6 text-center"
                        :class="{ 'border-blue-500 bg-blue-50': isDragging, 'border-gray-300': !isDragging }"
                    >
                        <p class="mb-4 text-gray-500">
                            Solte o arquivo de áudio aqui ou clique para fazer upload
                        </p>
                        <button
                            type="button"
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                            x-on:click="$refs.fileInput.click()"
                        >
                            Selecionar Arquivo
                        </button>

                        <input
                            type="file"
                            class="hidden"
                            wire:model="file"
                            x-ref="fileInput"
                            accept="audio/*"
                        />

                        @error('file')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror

                        <div wire:loading wire:target="file" class="mt-4 text-blue-500">
                            Carregando arquivo...
                        </div>

                        @if ($file)
                            <p class="mt-4 text-gray-700">
                                Arquivo carregado: {{ $file->getClientOriginalName() }}
                            </p>
                        @endif
                    </div>
                </div>

            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('showEditUrlModal')" wire:loading.attr="disabled">
                Cancelar
            </x-secondary-button>

            <x-button class="ml-2" wire:click="uploadAudio" wire:loading.attr="disabled">
                Salvar
            </x-button>
        </x-slot>
    </x-dialog-modal>


    @push('scripts')
        <!-- Incluindo Highlight.js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', () => {

                function decodeHtmlEntities(str) {
                    return str.replace(/&lt;/g, '<').replace(/&gt;/g, '>');
                }
                const codeToHighlights = `
                &lt;script src="{{url('/script/view.js')}}"&gt;&lt;/script&gt;
            `;
                const codeToHighlight = decodeHtmlEntities(codeToHighlights);

                document.getElementById('highlighted-code-block').innerHTML = hljs.highlight(codeToHighlight, {language: 'html'}).value;

                hljs.highlightAll();

                document.getElementById('copy-code-btn').addEventListener('click', function() {
                    const tempTextarea = document.createElement('textarea');
                    tempTextarea.value = codeToHighlight.trim();
                    document.body.appendChild(tempTextarea);
                    tempTextarea.select();
                    document.execCommand('copy');
                    document.body.removeChild(tempTextarea);

                    // Feedback visual
                    this.textContent = 'Copiado!';
                    setTimeout(() => {
                        this.textContent = 'Copiar';
                    }, 2000);
                });
            });
        </script>
    @endpush
</div>

