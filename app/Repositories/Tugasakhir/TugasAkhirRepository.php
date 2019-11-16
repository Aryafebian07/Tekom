<?php

namespace App\Repositories\Tugasakhir;

use App\Models\Tugasakhir\TugasAkhir;
use InfyOm\Generator\Common\BaseRepository;

class TugasAkhirRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TugasAkhir::class;
    }
}
