<?php

namespace App\Observers;

use App\Models\Notebook;

class NotebookObserver
{
    public function creating(Notebook $notebook)
    {
        $notebook->uuid = str()->uuid();
        $notebook->slug = str($notebook->title)->slug();
    }

    public function updating(Notebook $notebook)
    {
        $notebook->slug = str($notebook->title)->slug();
    }
}
