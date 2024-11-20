<div class="p-6">

    <div class="space-y-5">
        @foreach($pages as $page)
            <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$page->title}}</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$page->url}}</p>

                <div class="flex justify-between">
{{--                    <div class="w-full max-w-2xl">--}}
{{--                        @livewire('components.audio-player',['layout'=>1])--}}
{{--                    </div>--}}
                    <a href="{{route('tag-audio-edit',['id'=>$page->id])}}" class="flex items-center">
                        <x-button>
                            Editar
                        </x-button>
                    </a>
                </div>
            </div>
        @endforeach

    </div>


</div>
