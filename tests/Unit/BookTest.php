<?php

namespace Tests\Unit;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookTest extends TestCase
{
    use RefreshDatabase;

    public function test_short_title_is_trimmed_when_stored(): void
    {
        $author = Author::factory()->create();

        $book = Book::create([
            'title' => 'The Long Title of a Book',
            'short_title' => '  Short  ',
            'year' => 2020,
            'author_id' => $author->id,
        ]);

        $book->refresh();

        $this->assertSame('Short', $book->short_title);
    }

    public function test_short_title_persists_and_can_be_read_from_database(): void
    {
        $author = Author::factory()->create();

        $book = new Book([
            'title' => 'Full Title Here',
            'short_title' => 'FT',
            'year' => 2019,
            'author_id' => $author->id,
        ]);
        $book->save();

        $loaded = Book::query()->findOrFail($book->id);

        $this->assertSame('FT', $loaded->short_title);
        $this->assertSame('Full Title Here', $loaded->title);
        $this->assertSame(2019, $loaded->year);
    }

    public function test_book_belongs_to_author(): void
    {
        $author = Author::factory()->create(['name' => 'Jane', 'surname' => 'Doe']);
        $book = Book::factory()->for($author)->create();

        $this->assertTrue($book->author->is($author));
    }
}
