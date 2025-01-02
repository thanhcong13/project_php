<?php

namespace App\Http\Controllers;

use App\Services\Images\IImagesService;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    protected $imageService;
    public function __construct(IImagesService $imageService)
    {
        $this->imageService = $imageService;
    }
}
