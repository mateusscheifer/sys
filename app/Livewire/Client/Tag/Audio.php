<?php

namespace App\Livewire\Client\Tag;

use App\Models\ClientUrl;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Audio extends Component
{
    protected $client;
    public $pages;

    public function mount()
    {
        $clientUrl = ClientUrl::where('client_id', Auth::user()->associable_id)->with('pages')->first();
        $this->pages = $clientUrl->pages;
    }
    public function render()
    {
        return view('livewire.client.tag.audio');
    }
}
