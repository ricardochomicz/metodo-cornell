<?php

namespace App\Http\Controllers;

use App\Models\Notebook;
use App\Services\NotebookService;
use App\Services\NoteService;
use Illuminate\Http\Request;
use Parsedown;
use Illuminate\Support\Str;

class NoteController extends Controller
{

    public function __construct(
        protected NoteService $noteService,
        protected NotebookService $notebookService
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index(string $uuid)
    {
        return view('pages.notes.index', ['uuid' => $uuid]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($uuid)
    {
        // Encontrar o notebook com o UUID fornecido
        $notebook = $this->notebookService->getByUuid($uuid);

        // Passar o notebook (ou apenas o UUID) para a view
        return view('pages.notes.create', ['notebook' => $notebook]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $this->noteService->store($request->all());
            flash()->success('Caderno cadastrado com sucesso.');
            return redirect()->route('notebooks.index');
        } catch (\Throwable $e) {
            flash()->error("Ops! Erro ao cadastrar." . $e->getMessage());
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $uuid, int $id)
    {

        $notebook = $this->notebookService->getByUuid($uuid);
        $note = $notebook->notes()->where('id', $id)->firstOrFail();
        return view('pages.notes.show', [
            'notebook' => $notebook,
            'note' => $note,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $data = $this->noteService->get($id);
        if (!$data) {
            return back();
        }
        return view('pages.notes.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $note = $this->noteService->update($request->all(), $id);
            flash()->success('Anotação atualizada com sucesso.');
            return redirect()->route('notebooks.notes', ['uuid' => $note->notebook->uuid]);
        } catch (\Throwable $e) {
            flash()->error("Ops! Erro ao atualizar." . $e->getMessage());
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->noteService->destroy($id);
        flash()->success('Anotação excluida com sucesso.');
        return redirect()->route('notebooks.index');
    }
}
