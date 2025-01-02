<?php 

namespace App\Services\Idea;

use App\Repositories\Idea\IIdeaRepository;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class IdeaService implements IIdeaService
{
    protected $ideaRepository;
    public function __construct(IIdeaRepository $ideaRepository)
    {
        $this->ideaRepository = $ideaRepository;
    }
    public function show($id)
    {
        return $this->ideaRepository->show($id);   
    }
    public function store(array $data)
    {
        return $this->ideaRepository->store([
            'content' => $data['content'],
            'user_id' => $data['user_id']
        ]);
    }
    public function delete($id)
    {
        return $this->ideaRepository->delete($id);
    }
    public function update($id, $content)
    {
        return $this->ideaRepository->update($id , $content);
    }

    public function updateImage($imageBase64) {
            $imageData = base64_decode(explode(',', $imageBase64)[1]);

            $tempFile = tmpfile();
            fwrite($tempFile, $imageData);
            $tempFilePath = stream_get_meta_data($tempFile)['uri'];

            $uploadedFileUrl = Cloudinary::upload($tempFilePath)->getSecurePath();

            fclose($tempFile);

            return $uploadedFileUrl;
        
    }

}