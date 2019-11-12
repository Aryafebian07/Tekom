<?php

namespace App\Repositories\Gallery;

use App\Models\Gallery\GalleryPhoto;
use InfyOm\Generator\Common\BaseRepository;

class GalleryPhotoRepository extends BaseRepository
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
        return GalleryPhoto::class;
    }
}
