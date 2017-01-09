<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model {

    protected $table = 'user_profiles';

    public $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'age',
        'weight',
        'height',
        'avatar'
    ];

    /**
     * Blacklist
     *
     * Allow for mass Update
     *
     * @var string
     */
    protected $guarded = [];

    public function user() {
        return $this->belongsTo( 'App\User' );
    }
}