<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg max-w-2xl">
                <form method="POST" action="{{ route('articles.store') }}">
                    @include('articles.partials.form', [
                        'article' => null,
                        'submitLabel' => __('Save'),
                        'cancelUrl' => route('articles.index'),
                    ])
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
