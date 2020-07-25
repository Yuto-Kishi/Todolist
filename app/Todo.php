<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'title' => 'required',
        'due_date' => 'required',
        'state' => 'required',
    );
    public function histories()
    {
        return $this->hasMany('App\History');
    }
    
}
