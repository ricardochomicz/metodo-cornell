<?php

namespace App\Services;

use App\Models\Note;
use App\Models\Notebook;

class NoteService extends BaseService
{
    public function index(string $uuid, array $filters = [])
    {
        $notebook = Notebook::where('uuid', $uuid)->first();
        return $notebook->notes()
            ->orderBy('is_important', 'desc')
            ->orderBy('id', 'asc')
            ->filter($filters)
            ->paginate();
    }

    public function get(int $id)
    {
        return Note::find($id);
    }

    public function store(array $data)
    {
        return $this->executeTransaction(function () use ($data) {
            $note = Note::create($data);
            return $note;
        });
    }

    public function update(array $data, int $id)
    {
        return $this->executeTransaction(function () use ($data, $id) {
            $note = $this->get($id);
            $note->update($data);
            return $note;
        });
    }

    public function updateIsImportant(int $id)
    {
        return $this->executeTransaction(function () use ($id) {
            $note = $this->get($id);
            $note->is_important = !$note->is_important;
            $note->save();
            return $note;
        });
    }

    public function destroy(int $id)
    {
        return $this->executeTransaction(function () use ($id) {
            $note = $this->get($id);
            $note->delete();
            return true;
        });
    }
}
