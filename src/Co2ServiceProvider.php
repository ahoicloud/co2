<?php

namespace Ahoicloud\Co2;

use Ahoicloud\Co2\Commands\Co2Command;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class Co2ServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('co2')
            ->hasConfigFile()
            ->hasCommand(Co2Command::class);
    }
}
