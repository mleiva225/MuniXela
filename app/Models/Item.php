<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property ?float quantity
 * 
 * @property string name
 * @property string code
 * @property ?string series
 * @property ?string sicoin_gl
 * @property ?string description
 * @property ?string observations
 */
class Item extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];
}
