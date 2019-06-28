<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model {

    protected $filable=[
        'template_id',
        'name',
        'description',
        'due',
        'urgency',
        'is_completed',
        'created_by',
        'last_update_by',
        'completed_at',
    
    ];

    public function template() {
        return $this->belongsTo('App\Template');
    }

    public function items() {
        return $this->hasMany('App\Item');
    }


}
