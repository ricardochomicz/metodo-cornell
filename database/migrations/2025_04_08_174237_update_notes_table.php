<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('notes', function (Blueprint $table) {
            $table->unsignedInteger('note_number')->after('notebook_id');

            // Se quiser garantir que cada note_number seja único por notebook:
            $table->unique(['notebook_id', 'note_number']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notes', function (Blueprint $table) {
            $table->dropUnique(['notebook_id', 'note_number']);
            $table->dropColumn('note_number');
        });
    }
};
