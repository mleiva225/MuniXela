<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property float quantity
 * @property string id_item
 * @property string unit_value
 * @property string value
 * @property string low_value
 * @property string created_by
 * @property string created_at
 * @property string updated_at
 * @property string lastname
 */
class DetailResponsibilitySheet extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'details_sheet';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<string>|bool
     */
    protected $guarded = [
        'id'
    ];
}
