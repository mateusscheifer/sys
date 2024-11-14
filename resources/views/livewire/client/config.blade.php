<div class="p-6">
    <div class=" w-full bg-white rounded-lg  dark:bg-gray-800">

        <div style="border-color: #c61000" class="w-full bg-red-100 border-2 rounded-lg p-4">
            <h1 style="color: #9c0a00" class="font-bold text-lg">Atenção:</h1>
            <p style="color: #9c0a00">Ao adicionar as URLs, o sistema irá capturar e processar automaticamente o conteúdo de todas as páginas fornecidas.  Certifique-se de inserir apenas URLs válidas e confiáveis, pois o conteúdo será armazenado e utilizado para futuras análises.</p>
        </div>
        <div class=" space-y-3">
            <div class="mt-4">
                <x-label class="text-[16px]" value="URL do site" />
                <x-input wire:model="newUrl" class="block mt-1 w-full" />
                @error('newUrl')
                    <span class="text-sm text-red-700">{{$message}}</span>
                @enderror
            </div>
            <div class="flex justify-end mt-4">
                <x-button wire:click="save">
                    Salvar
                </x-button>
            </div>
        </div>
        <table class="table-auto w-full mt-4">
            <thead>
                <tr>
                    <th class="text-start">URL</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($urls as $url)
                <tr>
                    <td>{{$url->url}}</td>
                    <td> <button wire:click="delete({{$url->id}})">deletar</button></td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

    <x-confirmation-modal wire:model="showDeleteUrlModal">
        <x-slot name="title">
            Deletar URL
        </x-slot>

        <x-slot name="content">
            Nenhum conteúdo desta Link será mais captado
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('showDeleteUrlModal')" wire:loading.attr="disabled">
                Cancelar
            </x-secondary-button>

            <x-danger-button class="ml-2" wire:click="deleteUrl" wire:loading.attr="disabled">
                Deletar
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>

</div>
