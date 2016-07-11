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
    protected $book_id;
    protected $books;
    public function __construct($book_id, $books)
    {
        $this->book_id = $book_id;
        $this->books   = $books;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $book=Book::find($this->book_id);

        $book->update($this->books);
    }
}
