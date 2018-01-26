<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VariationOption extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'variation_attribute_id', 'title'
    ];
    
    /**
     * Get this users role
     */
    public function attribute()
    {
        return $this->belongsTo('App\Models\VariationAttribute', 'variation_attribute_id', 'id');
    }
}
