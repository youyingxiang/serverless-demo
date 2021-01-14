<?php

namespace App\Jobs;

use App\Models\ArticleModel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TestJop implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public string $title;
    public string $content;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $title,string $content)
    {
        $this->title = $title;
        $this->content = $content;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $articleModel = new ArticleModel;
        $articleModel->title = $this->title;
        $articleModel->content = $this->content;
        $articleModel->saveOrFail();
    }
}
