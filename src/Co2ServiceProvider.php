<?php

namespace Ahoicloud\Co2;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Ahoicloud\Co2\Commands\Co2Command;

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
            ->hasViews()
            ->hasMigration('create_co2_table')
            ->hasCommand(Co2Command::class);
    }
}
