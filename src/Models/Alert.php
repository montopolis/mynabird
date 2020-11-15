<?php

declare(strict_types=1);

namespace Montopolis\Mynabird\Models;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    protected $table = 'alerts';

    protected $fillable = [
        'title',
        'body',
        'is_broadcast',
        'url',
        'level',
    ];
}
