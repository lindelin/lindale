<?php
/**
 * Created by PhpStorm.
 * User: LINDALE
 * Date: 2017/06/21
 * Time: 午後6:23.
 */

namespace App\Tools\Html;

class IconTool
{
    /**
     * 获取状态动作.
     *
     * @param $id
     * @param string $size
     * @return array|mixed
     */
    public function action($id, $size = 'fa-lg')
    {
        $action = $this->statusAction($size);

        if ($id != '' or (int) $id === 0) {
            return $action[$id];
        } else {
            return $action;
        }
    }

    /******************************************************************************************************************/

    /**
     * 状态动作(根据大小).
     *
     * @param $size
     * @return array
     */
    private function statusAction($size)
    {
        $action = [];
        $action[config('todo.status.default')] = '<i class="fa fa-spinner fa-pulse '.$size.' fa-fw"></i>';
        $action[config('todo.status.finished')] = '<i class="fa fa-check '.$size.'" aria-hidden="true"></i>';
        $action[config('todo.status.underway')] = '<i class="fa fa-circle-o-notch fa-spin '.$size.' fa-fw"></i>';
        $action[config('todo.status.undetermined')] = '<i class="fa fa-spinner fa-pulse '.$size.' fa-fw"></i>';

        return $action;
    }
}
