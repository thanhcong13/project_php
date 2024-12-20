<?php
namespace App\Repositories\Idea;

interface IIdeaRepository
{
    public function show($id);
    public function store(array $data);
    public function delete($id);
    public function update($id,$content);

}

?>