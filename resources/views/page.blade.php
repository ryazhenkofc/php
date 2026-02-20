@extends('layouts.app')

@section('title', $title)

@section('content')

    <h2>{{ $title }}</h2>
    <p>{{ $message }}</p>

    @if ($featured)
        <p><strong>Featured</strong></p>
    @else
        <p>Regular page</p>
    @endif

    <h3>Items</h3>
    <ul>
        @foreach ($skills as $name => $description)
            <li><strong>{{ $name }}:</strong> {{ $description }}</li>
        @endforeach
    </ul>

    <h3>Notifications</h3>
    @forelse ($notifications as $note)
        <p>{{ $note }}</p>
    @empty
        <p>No notifications.</p>
    @endforelse

    @isset($message)
        <h3>Extra</h3>
        <em>"{{ $message }}"</em>
    @endisset

@endsection
