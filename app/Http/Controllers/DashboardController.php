<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Services\Dashboard\IDashboardService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $dashboardService;
    public function __construct(IDashboardService $dashboardService)
    {   
        $this->dashboardService = $dashboardService;
    }
    public function index()
    {
        $ideas = $this->dashboardService->show();

        return view("dashboard", compact('ideas'));
    }

    
}
