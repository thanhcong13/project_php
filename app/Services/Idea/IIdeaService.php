<?php

namespace App\Services\Idea;

interface IIdeaService
{
    public function show($id);
    public function store(array $data);
    public function delete($id);
    public function update($id,$content);
    public function updateImage($imageBase64);
}