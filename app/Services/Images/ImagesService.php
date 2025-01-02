<?php

namespace App\Services\Images;

use App\Models\Image;
use App\Repositories\Images\IImagesRepository;

class ImagesService implements IImagesService 
{
    public $imageRepository;
    public function __construct(IImagesRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }
    public function store(array $image)
    {
        return $this->imageRepository->store([
            'idea_id' => $image['idea_id'],
            'url' => $image['url'],
        ]);
    }
}