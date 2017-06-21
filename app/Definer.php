<?php

namespace App;

use Illuminate\Support\HtmlString;

class Definer
{
    /**
     * 获取状态动作.
     *
     * @param $id
     * @param string $size
     * @return array|mixed
     */
    public static function getStatusAction($id, $size = 'fa-lg')
    {
        $action = self::_statusAction($size);

        if ($id != '' or (int) $id === 0) {
            return $action[$id];
        } else {
            return $action;
        }
    }

    public static function projectConfigMenu($mode)
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

    /******************************************************************************************************************/

    /**
     * 状态动作(根据大小).
     *
     * @param $size
     * @return array
     */
    private static function _statusAction($size)
    {
        $action = [];
        $action[config('todo.status.default')] = '<i class="fa fa-spinner fa-pulse '.$size.' fa-fw"></i>';
        $action[config('todo.status.finished')] = '<i class="fa fa-check '.$size.'" aria-hidden="true"></i>';
        $action[config('todo.status.underway')] = '<i class="fa fa-circle-o-notch fa-spin '.$size.' fa-fw"></i>';
        $action[config('todo.status.undetermined')] = '<i class="fa fa-spinner fa-pulse '.$size.' fa-fw"></i>';

        return $action;
    }
}
