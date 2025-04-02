<?php

namespace App\Livewire\Notebooks;

use App\Services\NotebookService;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public string $search = '';

    protected $queryString = ['search' => ['except' => '']];

    public $notebook;

    public function toggleFavorite($id)
    {
        $this->notebook = app(NotebookService::class)->updateFavorite($id);

        // Recarregar a tela ou apenas atualizar o notebook na view
        $this->dispatch('favoriteUpdated', $this->notebook->is_favorite);
    }

    public function render()
    {
        $service = new NotebookService();
        $filters = ['search' => $this->search];
        return view('livewire.notebooks.index', [
            'data' => $service->index($filters)
        ]);
    }

    public function clearFilter(): void
    {
        $this->search = '';
    }
}
