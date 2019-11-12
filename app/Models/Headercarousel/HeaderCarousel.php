<?php

namespace App\Models\Headercarousel;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class HeaderCarousel extends Model
{
    use SoftDeletes;

    public $table = 'HeaderCarousels';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'filename',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'filename' => 'string',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'filename' => 'mimes:jpg,jpeg,bmp,png,gif|max:100000'
    ];
}
