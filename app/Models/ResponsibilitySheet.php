<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponsibilitySheet extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Users(){
        return $this->belongsTo(User::class,'id_responsible','id');
    }

    public function responsibleUser()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }


}
