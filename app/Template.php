<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model {

    protected $fillable=['name'];

    public function checklists() {
        return $this->hasMany('App\Checklist');
    }

}
