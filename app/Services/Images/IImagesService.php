<?php
namespace App\Services\Images;

use App\Models\Image;

interface IImagesService 
{
    public function store(array $image);
}

?>