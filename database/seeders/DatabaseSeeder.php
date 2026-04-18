<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $demoUser = User::firstOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'Demo User',
                'password' => Hash::make('password'),
                'role' => User::ROLE_USER,
                'email_verified_at' => now(),
            ]
        );

        User::where('email', 'moderator@example.com')->delete();

        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Demo Admin',
                'password' => Hash::make('password'),
                'role' => User::ROLE_ADMIN,
                'email_verified_at' => now(),
            ]
        );

        if ($demoUser->articles()->count() === 0) {
            Article::create([
                'user_id' => $demoUser->id,
                'title' => 'Welcome to the article system',
                'body' => 'This sample article belongs to user@example.com. Log in as the admin (admin@example.com) to manage all articles.',
            ]);
        }

        $author1 = Author::create([
            'name' => 'George',
            'surname' => 'Orwell',
            'birthdate' => '1903-06-25',
        ]);
        $author1->books()->createMany([
            ['title' => 'Nineteen Eighty-Four', 'short_title' => '1984', 'year' => 1949],
            ['title' => 'Animal Farm', 'short_title' => 'Animal Farm', 'year' => 1945],
        ]);

        $author2 = Author::create([
            'name' => 'Jane',
            'surname' => 'Austen',
            'birthdate' => '1775-12-16',
        ]);
        $author2->books()->createMany([
            ['title' => 'Pride and Prejudice', 'short_title' => 'P&P', 'year' => 1813],
            ['title' => 'Sense and Sensibility', 'short_title' => 'S&S', 'year' => 1811],
        ]);

        $author3 = Author::create([
            'name' => 'Mark',
            'surname' => 'Twain',
            'birthdate' => '1835-11-30',
        ]);
        $author3->books()->createMany([
            ['title' => 'The Adventures of Tom Sawyer', 'short_title' => 'Tom Sawyer', 'year' => 1876],
            ['title' => 'Adventures of Huckleberry Finn', 'short_title' => 'Huck Finn', 'year' => 1884],
        ]);
    }
}
