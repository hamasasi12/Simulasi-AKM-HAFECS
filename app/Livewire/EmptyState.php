<?php

namespace App\Livewire;

use Livewire\Component;

class EmptyState extends Component
{

    public string $title = 'Tidak Ada Data';
    public string $message = 'Belum ada data yang tersedia saat ini';
    public string $buttonText = '';
    public string $buttonLink = '';
    public int $colspan = 6;
    public bool $showButton = false;

    public function mount(
        string $title = null,
        string $message = null,
        string $buttonText = null,
        string $buttonLink = null,
        int $colspan = null,
        bool $showButton = null
    ) {
        if ($title) $this->title = $title;
        if ($message) $this->message = $message;
        if ($buttonText) $this->buttonText = $buttonText;
        if ($buttonLink) $this->buttonLink = $buttonLink;
        if ($colspan) $this->colspan = $colspan;
        if ($showButton !== null) $this->showButton = $showButton;
    }
    public function render()
    {
        return view('livewire.empty-state');
    }
}
