<?php

declare(strict_types=1);

namespace Montopolis\Mynabird\Models;

use Illuminate\Database\Eloquent\Model;

class AlertRecipient extends Model
{
    protected $table = 'alert_recipients';

    protected $fillable = [
        'alert_id',
        'recipient_id',
        'read_at',
    ];
}
