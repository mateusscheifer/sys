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

    protected $user;

    public $newUrl = '';
    public $urls;
    public $urlDelete;
    public $showDeleteUrlModal = false;


    public function mount()
    {
        $this->user = Auth::user()->load('client.urls');
        $this->urls = $this->user->client->urls;
    }

    public function save()
    {
        $this->user = Auth::user()->load('client');

        $this->validate([
            'newUrl' => 'required|url',
        ],[
            'newUrl.required'=>'Informe uma URL valida',
            'newUrl.url'=>'Informe uma URL valida',
        ]);

        $url = new ClientUrl();
        $url->client_id = $this->user->client->id;
        $url->url = $this->newUrl;
        $url->active = true;
        $url->save();

        $this->mount();
        $this->alert('success', 'Link salvo com sucesso!');
    }

    public function delete($id)
    {
        $this->showDeleteUrlModal = true;
        $this->urlDelete = $this->urls->find($id);

    }
    public function deleteUrl()
    {
        $this->showDeleteUrlModal = false;
        $this->urlDelete->delete();

        $this->mount();
        $this->alert('success', 'Link excluido com sucesso!');
    }

    public function render()
    {
        return view('livewire.client.config');
    }
}
