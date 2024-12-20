<?php 

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\IDashboardRepository;

class DashboardService implements IDashboardService
{
    protected $dashboardRepository;
    public function __construct(IDashboardRepository $dashboardRepository)
    {
        $this->dashboardRepository = $dashboardRepository;
    }
    public function show()
    {
        return $this->dashboardRepository->show();
    }
}