<?php

namespace App\Http\Controllers;

use App\Services\NotebookService;
use Illuminate\Http\Request;

class NotebookController extends Controller
{


    public function __construct(protected NotebookService $notebookService) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $view = [];
        return view('pages.notebooks.index', $view);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.notebooks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $this->notebookService->store($request->all());
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = $this->notebookService->get($id);
        if (!$data) {
            return back();
        }
        return view('pages.notebooks.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->notebookService->destroy($id);
        flash()->success('Caderno excluido com sucesso.');
        return redirect()->route('notebooks.index');
    }
}
