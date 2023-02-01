<?php

namespace Ahoicloud\Co2\Commands;

use Ahoicloud\Co2\Co2;
use Illuminate\Console\Command;

class Co2Command extends Command
{
    public $signature = 'co2';

    public $description = 'Calculated Co2 emission';

    public function handle(): int
    {
        $bytes = $this->ask('How many bytes?');
        $co2 = new Co2();
        $result = $co2->energyPerByteByComponent($bytes);
        $this->info('Result');
        $this->info($result);

        return self::SUCCESS;
    }
}
