<?php

namespace App\Livewire\Client;

use App\Models\Client;
use App\Models\ClientUrl;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Config extends Component
{
    use LivewireAlert;

    private $user;

    public $newUrl = '';
    public $urls;


    public function mount()
    {
        $this->user = Auth::user()->load('client');

        $this->urls = $this->user->client->urls;
    }

    public function save()
    {
        $this->validate([
            'newUrl' => 'required|url',
        ],[
            'newUrl.required'=>'Informe uma URL valida',
            'newUrl.url'=>'Informe uma URL valida',
        ]);

        $this->alert('success', 'Link salvo com sucesso!');
    }

    public function render()
    {
        return view('livewire.client.config');
    }
}
