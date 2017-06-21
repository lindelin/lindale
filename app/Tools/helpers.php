<?php

use Illuminate\Support\HtmlString;

if (! function_exists('project_config_menu_sp')) {

    /**
     *
     *
     * @param $mode
     * @return HtmlString|string
     */
    function project_config_menu_sp($mode)
    {
        if ($mode == 'basic') {
            return new HtmlString('<span class="glyphicon glyphicon-briefcase lindale-icon-color"></span> '.trans('config.basic'));
        } elseif ($mode == 'locale') {
            return new HtmlString('<span class="glyphicon glyphicon-globe lindale-icon-color"></span> '.trans('config.locale'));
        } elseif ($mode == 'notification') {
            return new HtmlString('<span class="glyphicon glyphicon-bell lindale-icon-color"></span> '.trans('config.notification'));
        } elseif ($mode == 'taskType') {
            return new HtmlString('<span class="glyphicon glyphicon-tag lindale-icon-color"></span> '.trans('config.task-type-config'));
        } elseif ($mode == 'taskStatus') {
            return new HtmlString('<span class="glyphicon glyphicon-dashboard lindale-icon-color"></span> '.trans('config.task-status-config'));
        } else {
            return 'MENU';
        }
    }

}