<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Models\Author;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthorController extends Controller
{
    public function index(): View
    {
        return view('authors.index', [
            'authors' => Author::query()->orderBy('surname')->orderBy('name')->get(),
        ]);
    }

    public function store(StoreAuthorRequest $request): RedirectResponse
    {
        Author::create($request->validated());

        return redirect()
            ->route('authors.index')
            ->with('status', __('Author created.'));
    }
}
