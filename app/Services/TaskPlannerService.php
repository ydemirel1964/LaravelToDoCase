<?php
namespace App\Services;

use App\Models\Task;
use App\Models\Developer;

class TaskPlannerService
{
    public function planTasks()
    {
        /*
        Fonksiyonun içerisinde geliştiricilerin verimliliklerine göre sıralanması ve görevlerin zorluk ve sürelerine göre sıralanması işlemleri yapılmıştır.
        Daha sonra geliştiricilere görev atamaları yapılırken, her bir geliştiricinin verimliliğine göre görevlerin süreleri hesaplanmış ve 45 saati geçmeyecek şekilde görevler atanmıştır.
        45 saati geçmesi durumunda diğer geliştiriciye görev atanmıştır.Tüm geliştiricilerin saatleri dolduğunda bir sonraki haftaya geçilmiştir.
        */

        $developers = Developer::orderBy('efficiency', 'desc')->get();
        $tasks = Task::all()->sortByDesc(function ($task) {
            return $task->difficulty * $task->duration;
        });

        $developerPlans = [];
        $week = 1;
        $remainingTasks = $tasks->toArray();

        while (!empty($remainingTasks)) {
            $hoursWorked = [];
            foreach ($developers as $developer) {
                $hoursWorked[$developer->id] = 0;
            }
            $assignedTasks = [];

            foreach ($remainingTasks as $key => $task) {
                $minHoursDeveloperId = array_keys($hoursWorked, min($hoursWorked))[0];
                $developer = $developers->find($minHoursDeveloperId);
                $taskHours = ($task['duration'] * $task['difficulty']) / $developer->efficiency;
                if ($hoursWorked[$minHoursDeveloperId] + $taskHours <= 45) {
                    $assignedTasks[$minHoursDeveloperId][$task['name']] = $task;
                    $hoursWorked[$minHoursDeveloperId] += $taskHours;
                    unset($remainingTasks[$key]);
                }
            }

            if (!empty($assignedTasks)) {
                $developerPlans[$developer->id]['weeks'][$week] = [
                    'tasks' => $assignedTasks,
                    'hours' => $hoursWorked,
                ];
            }
            $week++;
        }
        return $developerPlans;
    }
}
