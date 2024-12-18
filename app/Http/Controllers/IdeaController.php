<?php

namespace App\Http\Controllers;

use App\Http\Requests\IdeaRequest;
use Illuminate\Http\Request;
use App\Models\Idea;
use Illuminate\Support\Facades\Log;

class IdeaController extends Controller
{
    public function index($id){
        return view('idea', [
            'idea' => Idea::find($id)
        ]);
    }
    public function store(IdeaRequest $request)
    {
        $data['content'] = $request->input('idea');
        $data['user_id'] = auth()->user()->id;
        $idea = Idea::create($data);

        return redirect()->route('dashboard')->with('success','Idea created Successfully');
    }
    public function delete($id){
        $idea = Idea::destroy($id);
        return redirect()->route('dashboard')->with('success','Idea Deleted Successfully');
    }

    public function update(IdeaRequest $request, $id){
        $content = $request->input('idea');
        $data = Idea::find($id);
        $data->content = $content;
        $data->save();

        return redirect()->route('ideas.index', $id)->with('success','Update idea successfully !');
    }
}
