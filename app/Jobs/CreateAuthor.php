<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Author;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateAuthor extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $id;
    protected $name;

    /**
     * Create a new job instance.
     *
     * @param $id
     * @param $name
     */
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
        Author::create([
            'id' => $this->id,
            'name' => $this->name
        ]);
    }
}
