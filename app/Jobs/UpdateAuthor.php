<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Author;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateAuthor extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $id,$name;
    public function __construct($id,$name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $author=Author::find($this->id);
        $author->name = $this->name;
        $author->save();
    }
}
