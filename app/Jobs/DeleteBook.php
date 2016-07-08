<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Book;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteBook extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $book_id;

    public function __construct($book_id)
    {
        $this->book_id = $book_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Book::find($this->book_id)->delete();
    }
}
