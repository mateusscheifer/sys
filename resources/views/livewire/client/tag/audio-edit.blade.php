<div class="space-y-5">
    <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Newsletter de Segunda</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            https://flowbite.com/docs/components/card/#default-card
        </p>

        <div class="container mx-auto">
            <h1 class="text-2xl">Exemplo de Código com Highlight.js</h1>
            <pre>
                <code id="highlighted-code-block" class="language-javascript rounded-lg">
                    <!-- O código gerado será inserido aqui -->
                </code>
            </pre>
        </div>

        <div class="flex justify-between">
            <div class="w-full">
                @livewire('components.audio-player')
            </div>
        </div>
    </div>
</div>


@push('scripts')
    <!-- Incluindo Highlight.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Aplicando o highlight automático para blocos de código
            hljs.highlightAll();

            // Código que será processado (com caracteres escapados)
            const codeToHighlight = `
                &lt;script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"&gt;&lt;/script&gt;
            `;

            // Gerar o código destacado
            const highlightedCode = hljs.highlight(codeToHighlight, { language: 'html' }).value;

            // Inserir o código destacado no bloco <code> correto
            document.getElementById('highlighted-code-block').innerHTML = highlightedCode;
        });
    </script>
@endpush
