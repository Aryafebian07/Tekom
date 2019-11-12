<?php

namespace App\Repositories\Fokus;

use App\Models\Fokus\Focus;
use InfyOm\Generator\Common\BaseRepository;

class FocusRepository extends BaseRepository
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
        return Focus::class;
    }
}
