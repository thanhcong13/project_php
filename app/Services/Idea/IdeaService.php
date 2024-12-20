<?php 

namespace App\Services\Idea;

use App\Repositories\Idea\IIdeaRepository;

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

}