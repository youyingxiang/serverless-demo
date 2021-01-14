<?php

namespace App\Console\Commands;

use App\Jobs\TestJop;
use Illuminate\Console\Command;
use Illuminate\Queue\Jobs\Job;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:console-log';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Console log';

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
        $title = "test schedule and queue";

        $content = Str::replaceArray(
            "?",
            [now()->format('Y-m-d H:i:s')],
            "current time: ?"
        );

        TestJop::dispatch($title,$content);

    }
}
