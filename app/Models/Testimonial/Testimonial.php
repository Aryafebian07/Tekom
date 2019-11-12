<?php

namespace App\Models\Testimonial;

use Illuminate\Database\Eloquent\Model;



class Testimonial extends Model
{

    public $table = 'testimonials';



    public $fillable = [
        'name',
        'position',
        'impression',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'position' => 'string',
        'impression' => 'string',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
}
