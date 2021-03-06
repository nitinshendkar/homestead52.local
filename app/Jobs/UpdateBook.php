<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Book;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateBook extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $id,$title, $description,$authorId;
    public function __construct($id,$title, $description,$authorId)
    {
        $this->id = $id;
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
        $book=Book::find($this->id);
        $book->title = $this->title;
        $book->description = $this->description;
        $book->author_id = $this->authorId;
        $book->save();
    }
}
