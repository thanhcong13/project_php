<?php

namespace App\Repositories\Dashboard;

use App\Models\Idea;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class DashboardRepository implements IDashboardRepository
{
    public function show()
    {
        $ideas = Idea::orderBy('created_at', 'DESC')->paginate(5);
        if (request()->has('search')) {
            $ideas = Idea::where('content', 'LIKE', '%' . request()->get('search', '') . '%')->orderBy('created_at', 'DESC')->paginate(5);
        }
        return $ideas;
        
    }
}
