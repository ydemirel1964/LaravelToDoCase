<?php
namespace App\Services\Provides;

interface ProviderInterface
{
    public function fetchTasks(): array;
}
