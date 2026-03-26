<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:'.User::ROLE_USER)->only(['create', 'store']);
        $this->authorizeResource(Article::class, 'article');
    }

    public function index(): View
    {
        $user = auth()->user();
        $query = Article::query()->latest();

        if (! $user->isAdmin()) {
            $query->where('user_id', $user->id);
        } else {
            $query->with('user');
        }

        return view('articles.index', [
            'articles' => $query->paginate(15),
        ]);
    }

    public function create(): View
    {
        return view('articles.create');
    }

    public function store(StoreArticleRequest $request): RedirectResponse
    {
        $request->user()->articles()->create($request->validated());

        return redirect()->route('articles.index')
            ->with('status', __('Article created.'));
    }

    public function show(Article $article): View
    {
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article): View
    {
        return view('articles.edit', compact('article'));
    }

    public function update(UpdateArticleRequest $request, Article $article): RedirectResponse
    {
        $article->update($request->validated());

        return redirect()->route('articles.show', $article)
            ->with('status', __('Article updated.'));
    }

    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();

        return redirect()->route('articles.index')
            ->with('status', __('Article deleted.'));
    }
}
