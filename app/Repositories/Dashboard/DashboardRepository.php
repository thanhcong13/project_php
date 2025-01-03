<?php

namespace App\Repositories\Dashboard;

use App\Models\Idea;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class DashboardRepository implements IDashboardRepository
{
    public function show()
    {
        $query = Idea::with('image')->orderBy('created_at', 'DESC');
        
        if (request()->has('search')) {
            $search = request()->get('search', '');
            $query->where('content', 'LIKE', '%' . $search . '%');
        }

        return $query->paginate(5);
    }
    
}
