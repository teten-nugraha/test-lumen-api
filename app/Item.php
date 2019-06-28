<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {

    protected $fillable=['checklist_id','name','description','urgency','due_interval','due_unit'];

    public function checklist() {
        return $this->belongsTo('App\Checklist');
    }


}
