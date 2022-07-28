<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Parser\Parser;

class LaunchParser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'file:parse {route=data_light.xml}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $parser = new Parser();
        $parser->parse($this->argument("route"));
    }
}
