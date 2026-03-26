<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Articles') }}
            </h2>
            @can('create', \App\Models\Article::class)
                <a href="{{ route('articles.create') }}">
                    <x-primary-button type="button">{{ __('Create article') }}</x-primary-button>
                </a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="mb-4 p-4 rounded-md bg-green-50 text-green-800 text-sm">
                    {{ session('status') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <ul class="divide-y divide-gray-200">
                    @forelse ($articles as $article)
                        <li class="p-4 sm:p-6 hover:bg-gray-50">
                            <div class="flex flex-col gap-2 sm:flex-row sm:items-start sm:justify-between">
                                <div>
                                    <a href="{{ route('articles.show', $article) }}" class="text-lg font-medium text-gray-900 hover:text-indigo-600">
                                        {{ $article->title }}
                                    </a>
                                    @if (auth()->user()->isAdmin())
                                        <p class="text-sm text-gray-500 mt-1">
                                            {{ __('Author') }}: {{ $article->user->name }} ({{ $article->user->email }})
                                        </p>
                                    @endif
                                    <p class="text-sm text-gray-600 mt-2 line-clamp-2">{{ Str::limit(strip_tags($article->body), 160) }}</p>
                                </div>
                                <div class="flex flex-wrap gap-2 shrink-0">
                                    @can('view', $article)
                                        <a href="{{ route('articles.show', $article) }}">
                                            <x-secondary-button type="button">{{ __('View') }}</x-secondary-button>
                                        </a>
                                    @endcan
                                    @can('update', $article)
                                        <a href="{{ route('articles.edit', $article) }}">
                                            <x-secondary-button type="button">{{ __('Edit') }}</x-secondary-button>
                                        </a>
                                    @endcan
                                    @can('delete', $article)
                                        <form method="POST" action="{{ route('articles.destroy', $article) }}" onsubmit="return confirm('{{ __('Delete this article?') }}');">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button type="submit">{{ __('Delete') }}</x-danger-button>
                                        </form>
                                    @endcan
                                </div>
                            </div>
                        </li>
                    @empty
                        <li class="p-6 text-gray-600">
                            {{ __('No articles yet.') }}
                        </li>
                    @endforelse
                </ul>
            </div>

            <div class="mt-6">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
