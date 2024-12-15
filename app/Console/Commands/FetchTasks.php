<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
use App\Services\Provides\ProviderFactory;

class FetchTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch tasks from providers';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $providers = ['provider1', 'provider2'];

        foreach ($providers as $providerName) {
            $provider = ProviderFactory::getProvider($providerName);
            $tasks = $provider->fetchTasks();

            foreach ($tasks as $task) {
                Task::updateOrCreate(
                    [
                        'name' => $task['id'] ?? '',
                        'provider' => $providerName
                    ],
                    [
                        'name' => $task['id'] ?? '',
                        'duration' => $task['duration'] ?? 0,
                        'difficulty' => $task['difficulty'] ?? 0,
                        'provider' => $providerName,
                    ]
                );
            }
        }
    }
}
