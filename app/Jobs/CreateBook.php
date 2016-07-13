<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Book;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateBook extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $title;
    protected $description;
    protected $authorId;


    /**
     * Create a new job instance.
     *
     * @param $title
     * @param $description
     * @param $authorId
     */
    public function __construct($title, $description, $authorId)
    {
        $this->title = $title;
        $this->description = $description;
        $this->authorId = $authorId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Book::create([
            'title' => $this->title,
            'description' => $this->description,
            'author_id' => $this->authorId,
        ]);
    }
}
