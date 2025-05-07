<?php

namespace App\Providers;

use App\Models\OrderItems;
use Carbon\Carbon;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

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
        Blade::directive('oldIfModal', function ($expression) {
            [$modalName, $field] = explode(',', str_replace(['(', ')', ' ', "'"], '', $expression));
            return "session('show_modal') === '{$modalName}' ? old('{$field}') : ''";
        });

        Blade::directive('selectedIfModal', function ($expression) {
            [$modalName, $field, $value] = explode(',', str_replace(['(', ')', ' ', "'"], '', $expression));
            return "<?php echo session('show_modal') === '{$modalName}' && old('{$field}') === '{$value}' ? 'selected'  : ''; ?>";
        });

        Blade::directive('errorIfModal', function ($expression) {
            [$modalName, $field] = explode(',', str_replace(['(', ')', ' ', "'"], '', $expression));
            return "<?php if(session('show_modal') === '{$modalName}' && \$errors->has('{$field}')) : ?>";
        });

        Blade::directive('enderrorIfModal', function () {
            return "<?php endif; ?>";
        });
    }
}
