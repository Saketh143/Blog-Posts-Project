<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // table name
    // protected $table = 'data';
    // primary key
    // public $primaryKey = 'item_id';
    // // time stamps
    // public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
