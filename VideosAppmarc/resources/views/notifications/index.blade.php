@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Push Notifications</h1>
        <ul id="notification-list" class="list-disc pl-5">
            @forelse(auth()->user()->notifications as $notification)
                <li>
                    <strong>{{ $notification->data['title'] ?? 'No Title' }}</strong> -
                    <a href="{{ url('/videos/' . $notification->data['video_id']) }}">View</a>
                    <span class="text-sm text-gray-500">({{ $notification->created_at->diffForHumans() }})</span>
                </li>
            @empty
                <li>No notifications available.</li>
            @endforelse
        </ul>
    </div>
@endsection
