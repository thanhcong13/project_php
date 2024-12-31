<?php

namespace App\Http\Controllers;

use App\Http\Requests\IdeaRequest;
use Illuminate\Http\Request;
use App\Services\Idea\IIdeaService;
use App\Services\Images\IImagesService;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Log;

class IdeaController extends Controller
{

    protected $ideaService, $imageService;
    public function __construct(IIdeaService $ideaService, IImagesService $imageService)
    {
        $this->ideaService = $ideaService;
        $this->imageService = $imageService;
    }
    public function index($id)
    {
        $idea = $this->ideaService->show($id);
        return view('idea', compact('idea'));
    }

    public function store(IdeaRequest $request)
    {
        // Lấy dữ liệu từ request
        $data = [
            'content' => $request->input('idea'),
            'user_id' => auth()->user()->id,  
        ];
    
        $idea = $this->ideaService->store($data);
    
        if ($request->has('images')) {
            $images = $request->input('images'); 
    
            foreach ($images as $imageBase64) {
                $imageData = base64_decode(explode(',', $imageBase64)[1]);
    
                $tempFile = tmpfile();
                fwrite($tempFile, $imageData);
                $tempFilePath = stream_get_meta_data($tempFile)['uri'];
    
                $uploadedFileUrl = Cloudinary::upload($tempFilePath)->getSecurePath();
    
                fclose($tempFile);
    
                $this->imageService->store([
                    'idea_id' => $idea->id,
                    'url' => $uploadedFileUrl,
                ]);
            }
        }
        return response()->json([
            'message' => 'Idea created successfully!',
            'idea' => $idea,
            'status' => 'success'
        ], 200);  
    }
    

    public function delete($id)
    {
        $this->ideaService->delete($id);
        return redirect()->route('dashboard')->with('success', 'Idea Deleted Successfully');
    }
    public function update($id)
    {
        $content = request()->get('idea');
        $this->ideaService->update($id, $content);

        return redirect()->route('ideas.index', $id)->with('success', 'Update idea successfully !');
    }
}
