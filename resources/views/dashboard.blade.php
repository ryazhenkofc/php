<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 space-y-2">
                    <p>{{ __("You're logged in!") }}</p>
                    @if (auth()->user()->isAdmin())
                        <p class="text-sm text-gray-600">{{ __('You are signed in as an administrator. You can view and manage all articles, but you cannot create new articles.') }}</p>
                    @else
                        <p class="text-sm text-gray-600">{{ __('You can create and manage your own articles.') }}</p>
                    @endif
                </div>
            </div>
            <div>
                <a href="{{ route('articles.index') }}">
                    <x-primary-button type="button">{{ __('Go to articles') }}</x-primary-button>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
