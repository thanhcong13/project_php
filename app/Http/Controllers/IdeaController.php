<?php

namespace App\Http\Controllers;

use App\Http\Requests\IdeaRequest;
use Illuminate\Http\Request;
use App\Models\Idea;

use App\Services\Idea\IIdeaService;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Log;

class IdeaController extends Controller
{

    protected $ideaService;
    public function __construct(IIdeaService $ideaService)
    {
        $this->ideaService = $ideaService;
    }
    public function index($id)
    {
        $idea = $this->ideaService->show($id);
        return view('idea',compact('idea'));
    }

    public function store(IdeaRequest $request)
    {
        $data['content'] = $request->input('idea');
        $data['user_id'] = auth()->user()->id;
        $this->ideaService->store($data);
        return redirect()->route('dashboard')->with('success', 'Idea created Successfully');
    }
    public function delete($id)
    {
        $this->ideaService->delete($id);
        return redirect()->route('dashboard')->with('success', 'Idea Deleted Successfully');

        $idea = Idea::create($data);

        return redirect()->route('dashboard')->with('success','Idea created Successfully');
    }
    public function update($id)
    {
        $content = request()->get('idea');
        $this->ideaService->update($id, $content);

        return redirect()->route('ideas.index', $id)->with('success', 'Update idea successfully !');
    }
}
