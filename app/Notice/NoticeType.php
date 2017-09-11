<?php

namespace App\Notice;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Notice\NoticeType
 *
 * @property int $id
 * @property string $name
 * @property int $color_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notice\NoticeType whereColorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notice\NoticeType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notice\NoticeType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notice\NoticeType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notice\NoticeType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class NoticeType extends Model
{
    //
}
