<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'book';
   
    public $timestamps = true;
    protected $fillable = ['id_user', 'name', 'pages', 'price', 'title'];

    protected $guarded = [];

    public function relUsers()
    {
         return $this->hasOne(related: 'App\Models\User', foreignKey: 'id', localKey: 'id_user');
    }
   
}
