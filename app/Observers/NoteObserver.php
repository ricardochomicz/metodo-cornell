<?php

namespace App\Observers;

use App\Models\Note;
use Parsedown;

class NoteObserver
{
    public function creating(Note $note)
    {
        // $note->content = json_encode([
        //     'raw' => $note->content,
        //     'html' => (new Parsedown())->text($note->content)
        // ]);

        // $note->keywords = json_encode([
        //     'raw' => $note->keywords,
        //     'html' => (new Parsedown())->text($note->keywords)
        // ]);

        $max = Note::where('notebook_id', $note->notebook_id)->max('note_number');
        $note->note_number = $max ? $max + 1 : 1;
    }

    // public function updating(Note $note)
    // {
    //     $note->content = json_encode([
    //         'raw' => $note->content,
    //         'html' => (new Parsedown())->text($note->content)
    //     ]);

    //     $note->keywords = json_encode([
    //         'raw' => $note->keywords,
    //         'html' => (new Parsedown())->text($note->keywords)
    //     ]);
    // }
}
