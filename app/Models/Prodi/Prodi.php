<?php

namespace App\Models\Prodi;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Prodi extends Model
{
    use SoftDeletes;

    public $table = 'Prodis';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name_prodi',
        'visi',
        'misi',
        'tujuan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name_prodi' => 'string',
        'visi' => 'string',
        'misi' => 'string',
        'tujuan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'visi' => 'required',
        'misi' => 'required',
        'tujuan' => 'required'
    ];
}
