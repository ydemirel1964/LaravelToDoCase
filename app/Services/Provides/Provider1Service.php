<?php
namespace App\Services\Provides;


use Illuminate\Support\Facades\Http;

class Provider1Service implements ProviderInterface
{
    public function fetchTasks(): array
    {
        $response = Http::get('https://raw.githubusercontent.com/WEG-Technology/mock/main/mock-one');
        $tasks = $response->json();

        return array_map(function ($task) {
            return [
                'id' => $task['id'],
                'duration' => $task['estimated_duration'],
                'difficulty' => $task['value'],
            ];
        }, $tasks);
    }
}
