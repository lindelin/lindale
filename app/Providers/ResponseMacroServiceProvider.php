<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('save', function ($result) {
            if ($result) {
                return redirect()->back()->with('status', trans('errors.save-succeed'));
            } else {
                return redirect()->back()->withErrors(trans('errors.save-failed'));
            }
        });

        Response::macro('update', function ($result) {
            if ($result) {
                return redirect()->back()->with('status', trans('errors.update-succeed'));
            } else {
                return redirect()->back()->withErrors(trans('errors.update-failed'));
            }
        });

        Response::macro('delete', function ($result) {
            if ($result) {
                return redirect()->back()->with('status', trans('errors.delete-succeed'));
            } else {
                return redirect()->back()->withErrors(trans('errors.delete-failed'));
            }
        });

        Response::macro('remove', function ($result) {
            if ($result) {
                return redirect()->back()->with('status', trans('errors.remove-succeed'));
            } else {
                return redirect()->back()->withErrors(trans('errors.remove-failed'));
            }
        });

        Response::macro('add', function ($result) {
            if ($result) {
                return redirect()->back()->with('status', trans('errors.add-succeed'));
            } else {
                return redirect()->back()->withErrors(trans('errors.add-failed'));
            }
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
