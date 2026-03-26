<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;

class ArticlePolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Article $article): bool
    {
        return $user->isAdmin() || $user->id === $article->user_id;
    }

    public function create(User $user): bool
    {
        return $user->isRegularUser();
    }

    public function update(User $user, Article $article): bool
    {
        return $user->isAdmin() || $user->id === $article->user_id;
    }

    public function delete(User $user, Article $article): bool
    {
        return $user->isAdmin() || $user->id === $article->user_id;
    }
}
