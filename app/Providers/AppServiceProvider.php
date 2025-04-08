<?php

namespace App\Providers;

use App\Models\Note;
use App\Models\Notebook;
use App\Observers\NotebookObserver;
use App\Observers\NoteObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // $this->configModel();
        Notebook::observe(NotebookObserver::class);
        Note::observe(NoteObserver::class);
        Blade::directive('markdown', function ($e) {
            return "<?php echo (new Parsedown)->text($e); ?>";
        });
    }

    private function configModel()
    {
        Model::unguard();
    }
}
