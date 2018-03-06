<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeHas extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'heHas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * The attributes that are mass guarded.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public $timestamps = false;
}
