<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Wagon;
use Carbon\Carbon;
use Illuminate\View\View;

class ComposerServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        view()->composer('info.sidebar', function (View $view) {
            $todayDetainedCount = Wagon::where('detained_at', '>=', Carbon::today())->count();
            $todayReleasedCount = Wagon::where('released_at', '>=', Carbon::today())->count();
            $todayDepartedCount = Wagon::where('departed_at', '>=', Carbon::today())->count();

            $yesterdayDetainedCount = Wagon::whereBetween('detained_at', [Carbon::yesterday(), Carbon::today()])->count();
            $yesterdayReleasedCount = Wagon::whereBetween('released_at', [Carbon::yesterday(), Carbon::today()])->count();
            $yesterdayDepartedCount = Wagon::whereBetween('departed_at', [Carbon::yesterday(), Carbon::today()])->count();

            $localWagonDetainer = \App\Detainer::find(config('app.local_wagon_category_id'));

            return $view->with(compact('todayDetainedCount' , 'todayReleasedCount', 'todayDepartedCount',
                'yesterdayDetainedCount', 'yesterdayReleasedCount', 'yesterdayDepartedCount',
                'localWagonDetainer'));
        });

        view()->composer('backend.left-sidebar', function (View $view) {
            list($controller, $action) = explode('@', class_basename(\Route::getCurrentRoute()->action['controller']));

            return $view->with(compact('controller', 'action'));
        });
    }
}
