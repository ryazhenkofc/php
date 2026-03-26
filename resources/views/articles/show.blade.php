<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $article->title }}
            </h2>
            <div class="flex flex-wrap gap-2">
                <a href="{{ route('articles.index') }}">
                    <x-secondary-button type="button">{{ __('Back to list') }}</x-secondary-button>
                </a>
                @can('update', $article)
                    <a href="{{ route('articles.edit', $article) }}">
                        <x-primary-button type="button">{{ __('Edit') }}</x-primary-button>
                    </a>
                @endcan
                @can('delete', $article)
                    <form method="POST" action="{{ route('articles.destroy', $article) }}" class="inline" onsubmit="return confirm('{{ __('Delete this article?') }}');">
                        @csrf
                        @method('DELETE')
                        <x-danger-button type="submit">{{ __('Delete') }}</x-danger-button>
                    </form>
                @endcan
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="mb-4 p-4 rounded-md bg-green-50 text-green-800 text-sm">
                    {{ session('status') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 space-y-4">
                @if (auth()->user()->isAdmin())
                    <p class="text-sm text-gray-500">
                        {{ __('Author') }}: {{ $article->user->name }} ({{ $article->user->email }})
                    </p>
                @endif
                <div class="prose max-w-none text-gray-800 whitespace-pre-wrap">{{ $article->body }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
