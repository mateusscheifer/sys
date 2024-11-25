<?php

namespace App\Livewire\Client\Tag;

use App\Models\Page;
use Livewire\Component;
use Livewire\WithFileUploads;

class AudioEdit extends Component
{

    public $page;
    public $audio;
    public $showEditUrlModal = true;

    use WithFileUploads;

    public $fileImage;
    public $file;
    public $uploadedFile;

    public function mount($id)
    {
        $this->page = Page::with(['clientUrl', 'audios'])->find($id);
        $this->audio = $this->page->audio?->first();
    }


    public function updatedFile()
    {
        $this->validate([
            'file' => 'file|mimes:mp3,wav,aac|max:102400', // Máximo de 10MB, apenas formatos de áudio
        ],['file.mimes' => 'Somente arquivos de áudio são permitidos']);
    }

    public function uploadAudio()
    {
        if (isset($this->audio->id)){
            $this->audio = new \App\Models\Audio();
        }

        $this->audio->page_id = $this->page->id;
        $this->audio->file_path = $this->page->id;
        $this->audio->file_name = $this->page->id;
        $this->audio->file_size = $this->page->id;
        $this->audio->file_extension = $this->page->id;
        $this->audio->title = $this->page->id;
        $this->audio->description = $this->page->id;
        $this->audio->tag_id_html = $this->page->id;
        $this->audio->generation_type = $this->page->id;
        $this->audio->save();
        dd($this->file);
        dd('ola');
    }

    public function render()
    {
        return view('livewire.client.tag.audio-edit');
    }
}
