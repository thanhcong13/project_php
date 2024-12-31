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
    // public function show()
    // {
    //     $search = request()->get('search', '');
    //     $page = request()->get('page', 1);
    //     $cacheKey = 'ideas_' . md5('search :' . $search . '|page :' . $page);
    //     Log::info('cachekey' , [$cacheKey]);
    //     //$query = Idea::query();
    //     //dd($query->get());

    //     $ideas = Cache::remember($cacheKey, 6000, function () use ($search, $page) {
    //         $query = Idea::query();
            
    //         if ($search) {
    //             $query->where('content', 'LIKE', '%' . $search . '%');
    //         }

    //         return $query->orderBy('created_at', 'DESC')->paginate(config('pagination.per_page'), ['*'], 'page', $page);
    //     });

    //     return $ideas;
    // }

}
