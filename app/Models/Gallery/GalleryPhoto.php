<?php

namespace App\Models\Gallery;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class GalleryPhoto extends Model
{
    use SoftDeletes;

    public $table = 'GalleryPhotos';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'imagename'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'imagename' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'imagename' => 'required|max:10000'
    ];
}
