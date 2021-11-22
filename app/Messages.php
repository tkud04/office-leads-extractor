<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'fmail_id', 'username', 'sn', 'sa', 'subject', 'content', 'label', 'status'
    ];
}
