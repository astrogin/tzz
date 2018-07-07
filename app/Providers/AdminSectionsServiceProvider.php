<?php

namespace App\Providers;

use SleepingOwl\Admin\Navigation\Page;
use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $sections = [
        \App\Record::class => 'App\Admin\Sections\Record',
    ];

    /**
     * Register sections.
     *
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
    	//

        parent::boot($admin);

        \AdminNavigation::setFromArray(array(
            (new Page(\App\Record::class))
        ));

        /*$this->app['router']->group(array(
            'prefix' => config('sleeping_owl.url_prefix'),
            'middleware' => config('sleeping_owl.middleware')
        ), function ($router) {
            $router->get('records',
                array(
                    'as' => 'admin.records',
                    'uses' => '\App\Http\Sections\Controllers\AdminCoursesController@deleteConflictChapter',
                ));
        });*/
    }
}
