<?php

namespace App\Services;

use App\Models\Notebook;
use Illuminate\Support\Facades\Auth;

class NotebookService extends BaseService
{


    public function index(array $filters = [])
    {
        return Notebook::where('user_id', Auth::id())
            ->orderBy('is_favorite', 'desc')
            ->filter($filters)
            ->paginate();
    }

    public function get(int $id)
    {
        return Notebook::where('user_id', Auth::id())->find($id);
    }

    public function getByUuid(string $uuid)
    {
        return Notebook::with('notes')->where('user_id', Auth::id())->where('uuid', $uuid)->first();
    }

    public function store(array $data)
    {
        return $this->executeTransaction(function () use ($data) {
            $data['user_id'] = Auth::id();
            $notebook = Notebook::create($data);
            return $notebook;
        });
    }

    public function updateFavorite(int $id)
    {
        return $this->executeTransaction(function () use ($id) {
            $notebook = $this->get($id);
            $notebook->is_favorite = !$notebook->is_favorite;
            $notebook->save();
            return $notebook;
        });
    }

    public function destroy(int $id)
    {
        return $this->executeTransaction(function () use ($id) {
            $notebook = $this->get($id);
            $notebook->delete();
            return true;
        });
    }
}
