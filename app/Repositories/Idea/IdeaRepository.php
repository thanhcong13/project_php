<?php 

namespace App\Repositories\Idea;

use App\Models\Idea;

class IdeaRepository implements IIdeaRepository
{
    public function show($id)
    {
        return Idea::find($id);   
    }
    public function store(array $data)
    {
        return Idea::create([
            'content' => $data['content'],
            'user_id' => $data['user_id']
        ]);
    }
    public function delete($id)
    {
        return Idea::destroy($id);   
    }
    public function update($id,$content)
    {
        $data = Idea::find($id);
        $data->content = $content;
        $data->save();
    }

}