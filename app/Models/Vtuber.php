<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $self_introduction
 * @property string $image
 */
class Vtuber extends Model
{
    protected $table = 'vtubers';
    protected $fillable = [
        'name',
        'self_introduction',
        'image'
    ];
}
