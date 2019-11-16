<?php

namespace App\Models\Tugasakhir;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class TugasAkhir extends Model
{
    use SoftDeletes;

    public $table = 'TugasAkhirs';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nim',
        'nama',
        'judul',
        'file'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nim' => 'integer',
        'nama' => 'string',
        'judul' => 'string',
        'file' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nim' => 'required'
    ];
}
