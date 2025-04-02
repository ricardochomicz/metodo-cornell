<?php

namespace App\Livewire\Notes;

use App\Services\NotebookService;
use App\Services\NoteService;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public string $search = '';
    public string $uuid;
    public $note;

    protected $queryString = ['search' => ['except' => '']];

    public function mount(string $uuid): void
    {
        $this->uuid = $uuid;
    }



    public function toggleImportant($id)
    {
        $this->note = app(NoteService::class)->updateIsImportant($id);

        // Recarregar a tela ou apenas atualizar o notebook na view
        $this->dispatch('isImportantUpdated', $this->note->is_important);
        flash()->success('Anotação favoritada com sucesso.');
    }

    public function render()
    {
        $service = new NoteService();
        $notebook = new NotebookService();
        $filters = ['search' => $this->search];
        return view('livewire.notes.index', [
            'data' => $service->index($this->uuid, $filters),
            'notebook' => $notebook->getByUuid($this->uuid)
        ]);
    }

    public function clearFilter(): void
    {
        $this->search = '';
    }
}
