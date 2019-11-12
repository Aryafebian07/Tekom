<?php

namespace App\Models\Fokus;

use App\Models\Prodi\Prodi;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Focus extends Model
{
    use SoftDeletes;

    public $table = 'Focus';


    protected $dates = ['deleted_at'];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class,'id');
    }

    public function getProdiAttribute()
    {
        return $this->prodi->pluck('id');
    }

    public $fillable = [
        'prodi_id',
        'name_focus',
        'icon',
        'icon_color',
        'desc'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'prodi_id' => 'integer',
        'name_focus' => 'string',
        'icon' => 'string',
        'icon_color' => 'string',
        'desc' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'prodi_id' => 'required',
        'name_focus' => 'required'
    ];
}
