<?php

namespace App\Repositories\Headercarousel;

use App\Models\Headercarousel\HeaderCarousel;
use InfyOm\Generator\Common\BaseRepository;

class HeaderCarouselRepository extends BaseRepository
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
        return HeaderCarousel::class;
    }
}
