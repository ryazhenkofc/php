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
            'name' => 'George Orwell',
            'email' => 'george@example.com',
        ]);
        $author1->books()->createMany([
            ['title' => '1984', 'description' => 'A dystopian novel set in a totalitarian society.'],
            ['title' => 'Animal Farm', 'description' => 'A satirical allegory about power and corruption.'],
        ]);

        $author2 = Author::create([
            'name' => 'Jane Austen',
            'email' => 'jane@example.com',
        ]);
        $author2->books()->createMany([
            ['title' => 'Pride and Prejudice', 'description' => 'A romantic novel about manners and marriage.'],
            ['title' => 'Sense and Sensibility', 'description' => 'A story of two sisters and their romantic lives.'],
        ]);

        $author3 = Author::create([
            'name' => 'Mark Twain',
            'email' => 'mark@example.com',
        ]);
        $author3->books()->createMany([
            ['title' => 'The Adventures of Tom Sawyer', 'description' => 'A novel about a boy growing up along the Mississippi River.'],
            ['title' => 'Adventures of Huckleberry Finn', 'description' => 'A story of a boy and a runaway slave traveling down the Mississippi.'],
        ]);
    }
}
