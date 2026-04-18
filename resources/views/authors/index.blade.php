<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('Authors') }}</title>
</head>
<body>
    <h1>{{ __('Authors') }}</h1>
    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif
    <ul>
        @foreach ($authors as $author)
            <li>{{ $author->fullName() }} — {{ $author->birthdate->format('Y-m-d') }}</li>
        @endforeach
    </ul>
</body>
</html>
