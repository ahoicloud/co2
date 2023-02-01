<?php

namespace Ahoicloud\Co2\Commands;

use Illuminate\Console\Command;

class Co2Command extends Command
{
    public $signature = 'co2';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
