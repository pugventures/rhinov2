<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VariationAttribute extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title'
    ];
    
    /**
     * Get this users role
     */
    public function options()
    {
        return $this->hasMany('App\Models\VariationOption');
    }
}
