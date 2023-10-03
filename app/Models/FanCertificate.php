<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $vtuber_id
 * @property string $fan_name
 * @property string $likes
 * @property string $support_comment
 */
class FanCertificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vtuber_id',
        'fan_name',
        'likes',
        'support_comment'
    ];
}
