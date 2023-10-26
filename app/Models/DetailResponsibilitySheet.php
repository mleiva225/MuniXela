<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailResponsibilitySheet extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function Items(){
        return $this->belongsTo(Item::class,'id_item','id');
    }

    protected $fillable = ['id_responsibilitysheet'];
    
}