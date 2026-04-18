<?php

namespace Tests\Unit;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthorTest extends TestCase
{
    use RefreshDatabase;

    public function test_full_name_concatenates_name_and_surname(): void
    {
        $author = new Author([
            'name' => 'Leo',
            'surname' => 'Tolstoy',
            'birthdate' => '1828-09-09',
        ]);

        $this->assertSame('Leo Tolstoy', $author->fullName());
    }

    public function test_author_has_many_books(): void
    {
        $author = Author::factory()->create();
        Book::factory()->count(2)->for($author)->create();

        $this->assertCount(2, $author->books);
    }
}
