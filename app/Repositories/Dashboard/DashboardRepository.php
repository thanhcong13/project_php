<?php

namespace App\Repositories\Dashboard;

use App\Models\Idea;

class DashboardRepository implements IDashboardRepository 
{
    public function show()
    {
        $ideas = Idea::orderBy('created_at', 'DESC')->paginate(5);
        if (request()->has('search'))
        {
            $ideas = Idea::where('content','LIKE','%'.request()->get('search', '') .'%')->orderBy('created_at', 'DESC')->paginate(5);
        }
        return $ideas;
    }
}