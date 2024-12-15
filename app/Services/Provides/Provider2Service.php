<?php
namespace App\Services\Provides;

use Illuminate\Support\Facades\Http;
class Provider2Service implements ProviderInterface
{
    public function fetchTasks(): array
    {
        $response = Http::get('https://raw.githubusercontent.com/WEG-Technology/mock/main/mock-two');
        $tasks = $response->json();

        return array_map(function ($task) {
            return [
                'id' => $task['id'],
                'duration' => $task['sure'],
                'difficulty' => $task['zorluk'],
            ];
        }, $tasks);
    }
}
