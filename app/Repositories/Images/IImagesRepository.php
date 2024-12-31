<?php 

namespace App\Repositories\Images;

use App\Models\Image;

interface IImagesRepository 
{
    public function store(array $image);
}


?>