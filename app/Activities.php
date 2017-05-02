<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activities extends Model {

    protected $table = 'activities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'type',
        'miles',
        'duration',
        'description',
        'thumbnail',
        'completed_on'
    ];

    /**
     * Blacklist
     *
     * Allow for mass Update
     *
     * @var string
     */
    protected $guarded = [];
}