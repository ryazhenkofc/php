@csrf

<div>
    <x-input-label for="title" :value="__('Title')" />
    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $article?->title ?? '')" required autofocus />
    <x-input-error class="mt-2" :messages="$errors->get('title')" />
</div>

<div class="mt-4">
    <x-input-label for="body" :value="__('Body')" />
    <textarea id="body" name="body" rows="12" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>{{ old('body', $article?->body ?? '') }}</textarea>
    <x-input-error class="mt-2" :messages="$errors->get('body')" />
</div>

<div class="flex items-center gap-4 mt-6">
    <x-primary-button>{{ $submitLabel }}</x-primary-button>
    <a href="{{ $cancelUrl }}" class="text-sm text-gray-600 hover:text-gray-900">{{ __('Cancel') }}</a>
</div>
