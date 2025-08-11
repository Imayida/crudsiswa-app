<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clas extends Model
{
    protected $table = "clases";

    protected $guarded =[];

    public function users (){

        $clases = Clas::all();

        return $this->hasMany(User::clas, 'clas_id');
}
}
