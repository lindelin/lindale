<?php

use Illuminate\Support\HtmlString;

if (! function_exists('project_config_menu_sp')) {

    /**
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
        } elseif ($mode == 'notice') {
            return new HtmlString('<span class="glyphicon glyphicon-bullhorn lindale-icon-color"></span> '.trans('project.notice'));
        } else {
            return 'MENU';
        }
    }
}

if (! function_exists('markdown')) {

    /**
     * Text to Html.
     * @param $text
     * @return mixed
     */
    function markdown($text)
    {
        return app('markdown')->text($text);
    }
}

if (! function_exists('user_config')) {
    function user_config(\App\User $user, $key)
    {
        $system = app('ucs');

        $value = $system->get($user, $key);

        if ($value !== null or $value != '') {
            return $value;
        } else {
            $system->set($user, $key, config('config.user.default.'.$key));
            $value = $system->get($user, $key);

            return $value;
        }
    }
}

if (! function_exists('project_config')) {
    /**
     * Project Config.
     * @param \App\Project\Project $project
     * @param $key
     * @return mixed
     */
    function project_config(\App\Project\Project $project, $key)
    {
        $system = app('pcs');

        $value = $system->get($project, $key);

        if ($value !== null or $value != '') {
            return $value;
        } else {
            $system->set($project, $key, config('config.project.default.'.$key));
            $value = $system->get($project, $key);

            return $value;
        }
    }
}

if (! function_exists('trans_progress')) {
    /**
     * Progress to 小数.
     * @param $progress
     * @return float
     */
    function trans_progress($progress)
    {
        return round(($progress / 100), 2);
    }
}

if (! function_exists('trans_lang_for_gantt')) {
    /**
     * Progress to 小数.
     * @param $lang
     * @return float
     * @internal param $progress
     */
    function trans_lang_for_gantt($lang)
    {
        switch ($lang) {
            case 'zh':
                return 'cn';
                break;
            case 'ja':
                return 'jp';
                break;
            default:
                return 'en';
                break;
        }
    }
}

if (! function_exists('trans_lang_for_date')) {
    /**
     * @return string
     */
    function trans_lang_for_date()
    {
        switch (app()->getLocale()) {
            case 'zh':
                return 'zh-cn';
                break;
            case 'ja':
                return 'ja';
                break;
            default:
                return 'en';
                break;
        }
    }
}

if (! function_exists('trans_task_group_status_for_gantt')) {
    /**
     * Progress to 小数.
     * @param $status
     * @return float
     * @internal param $lang
     * @internal param $progress
     */
    function trans_task_group_status_for_gantt($status)
    {
        switch ($status) {
            case 999:
                return false;
                break;
            default:
                return true;
                break;
        }
    }
}

if (! function_exists('calculator')) {
    /**
     * 進捗 calculator
     * @return \App\Tools\Analytics\Calculator|Calculator|\Illuminate\Foundation\Application|mixed
     */
    function calculator()
    {
        return app('calculator');
    }
}
