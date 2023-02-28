<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'         ,
        'slug'          ,
        'description'   ,
        'field_1_label' ,
        'field_1_type'  ,
        'field_2_label' ,
        'field_2_type'  ,
        'field_3_label' ,
        'field_3_type'  ,
        'field_4_label' ,
        'field_4_type'  ,
        'field_5_label' ,
        'field_5_type'  ,
        'field_6_label' ,
        'field_6_type'  ,
        'field_7_label' ,
        'field_7_type'  ,
        'field_8_label' ,
        'field_8_type'  ,
        'field_9_label' ,
        'field_9_type'  ,
        'field_10_label',
        'field_10_type' ,
        'field_11_label',
        'field_11_type' ,
        'field_12_label',
        'field_12_type' ,
        'field_13_label',
        'field_13_type' ,
        'field_14_label',
        'field_14_type' ,
        'field_15_label',
        'field_15_type' ,
        'designation_id',
        'status'        ,
    ];
}
