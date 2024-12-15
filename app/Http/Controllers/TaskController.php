<?php
namespace App\Http\Controllers;

use App\Services\TaskPlannerService;


class TaskController extends Controller
{
    public function index(TaskPlannerService $taskPlannerService)
    {
        $developerPlans = $taskPlannerService->planTasks();
        return view('welcome', compact(var_name: 'developerPlans'));
    }
}
