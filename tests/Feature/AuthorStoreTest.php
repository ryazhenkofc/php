<?php

namespace Tests\Feature;

use App\Models\Author;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthorStoreTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_creates_author_and_redirects_with_success(): void
    {
        $payload = [
            'name' => 'Virginia',
            'surname' => 'Woolf',
            'birthdate' => '1882-01-25',
        ];

        $response = $this->post(route('authors.store'), $payload);

        $response->assertStatus(302);
        $response->assertRedirect(route('authors.index'));
        $response->assertSessionHas('status', __('Author created.'));

        $this->assertDatabaseHas('authors', [
            'name' => 'Virginia',
            'surname' => 'Woolf',
        ]);
        $this->assertTrue(
            Author::where('name', 'Virginia')
                ->whereDate('birthdate', '1882-01-25')
                ->exists()
        );

        $this->assertSame(1, Author::count());
    }
}
