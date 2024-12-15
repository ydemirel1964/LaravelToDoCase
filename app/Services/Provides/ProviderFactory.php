<?php
namespace App\Services\Provides;

class ProviderFactory
{
    public static function getProvider(string $provider): ProviderInterface
    {
       switch ($provider) {
           case 'provider1':
               return new Provider1Service();
           case 'provider2':
               return new Provider2Service();
           default:
               throw new \InvalidArgumentException('Invalid provider');
       }
    }
}
