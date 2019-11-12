<?php

namespace App\Repositories\Prodi;

use App\Models\Prodi\Prodi;
use InfyOm\Generator\Common\BaseRepository;

class ProdiRepository extends BaseRepository
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
        return Prodi::class;
    }
}
