<?php 

namespace App\Repositories\Images;

use App\Models\Image;

class ImagesRepository implements IImagesRepository
{

    public function store(array $image)
    {
        return Image::create([
            'idea_id' => $image['idea_id'],
            'url' => $image['url'],
        ]);
    }
}


?>