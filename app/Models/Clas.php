<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clas extends Model
{
    protected $table = "clases";

    protected $guarde =[];

    public function users (){
        return $this->hasMany(User::clases, 'clas_id');
    }
}
