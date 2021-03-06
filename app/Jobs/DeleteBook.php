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
    protected $bookId;

    public function __construct($bookId)
    {
        $this->bookId = $bookId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $book=Book::find($this->bookId);
        $book->delete();
    }
}
