<?php

namespace App\Livewire\Client\Tag;

use App\Models\Page;
use Livewire\Component;

class AudioEdit extends Component
{

    public $page;
    public function mount($id)
    {
        $this->page = Page::with(['clientUrl'])->find($id);
//        dd($page);
    }

    public function uploadAudio()
    {

    }

    public function render()
    {
        return view('livewire.client.tag.audio-edit');
    }
}
