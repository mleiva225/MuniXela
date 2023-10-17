<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property int id_responsible
 * 
 * @property string series
 * @property string created_by
 * @property string created_at
 * @property string updated_at
 * @property string lastname
 */
class ResponsibilitySheet extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'responsibilities_sheet';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<string>|bool
     */
    protected $guarded = [
        'id'
    ];
}
