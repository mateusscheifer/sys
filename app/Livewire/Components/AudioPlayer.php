<?php

namespace App\Livewire\Components;

use Livewire\Component;

class AudioPlayer extends Component
{

    public $layout;

    public function mount($layout = 0)
    {
        $this->layout = $layout;
    }

    public function render()
    {
        return view('livewire.components.audio-player');
    }
}
