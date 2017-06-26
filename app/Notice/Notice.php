<?php

namespace App\Notice;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    /**
     * 一对一
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Type()
    {
        return $this->hasOne(NoticeType::class, 'id', 'type_id');
    }
}
