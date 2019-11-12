<?php

namespace App\Repositories\Dosen;

use App\Models\Dosen\Dosen;
use InfyOm\Generator\Common\BaseRepository;

class DosenRepository extends BaseRepository
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
        return Dosen::class;
    }
}
