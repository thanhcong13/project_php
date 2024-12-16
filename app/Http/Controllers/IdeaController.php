<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;


class IdeaController extends Controller
{
    public function insert(Request $request)
    {
        request()->validate([
            'idea' => 'required|min:5'
        ]);
        $data = $request->input('idea');
        $idea = Idea::create([
            'content' => $data
        ]);
        return redirect()->route('dashboard')->with('success','Idea created Successfully');
    }
    public function delete($id){
        $idea = Idea::destroy($id);
        return redirect()->route('dashboard')->with('success','Idea Deleted Successfully');
    }
}
