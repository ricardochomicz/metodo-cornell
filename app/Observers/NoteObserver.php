<?php

namespace App\Observers;

use App\Models\Note;
use Parsedown;

class NoteObserver
{
    public function creating(Note $note)
    {
        $note->content = json_encode([
            'raw' => $note->content,
            'html' => (new Parsedown())->text($note->content)
        ]);

        $note->keywords = json_encode([
            'raw' => $note->keywords,
            'html' => (new Parsedown())->text($note->keywords)
        ]);
    }

    public function updating(Note $note)
    {
        $note->content = json_encode([
            'raw' => $note->content,
            'html' => (new Parsedown())->text($note->content)
        ]);

        $note->keywords = json_encode([
            'raw' => $note->keywords,
            'html' => (new Parsedown())->text($note->keywords)
        ]);
    }
}
