<?php

namespace App\Models\Dosen;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Dosen extends Model
{
    use SoftDeletes;

    public $table = 'Dosens';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nidn',
        'name_dosen',
        'expertise',
        'email',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nidn' => 'string',
        'name_dosen' => 'string',
        'expertise' => 'string',
        'email' => 'string',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nidn' => 'required|min:3',
        'name_dosen' => 'required|min:3',
        'expertise' => 'required|min:3',
        'email' => 'required|email|unique:users,email'
    ];
}
