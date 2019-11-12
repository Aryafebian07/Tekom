<?php

namespace App\Repositories\Testimonial;

use App\Models\Testimonial\Testimonial;
use InfyOm\Generator\Common\BaseRepository;

class TestimonialRepository extends BaseRepository
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
        return Testimonial::class;
    }
}
