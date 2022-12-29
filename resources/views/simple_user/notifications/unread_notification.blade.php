@php
    $user = auth()->user();
@endphp

@extends('layouts.layout')
@section('sidebar')
    @include('simple_user.body.sidebar')
@endsection
@section('header')
    @include('simple_user.body.header')
@endsection
@section('content')
    <div class="container-lg mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span class="fs-4">
                    Unread Notifications
                </span>
                <div>
                    <div class="btn-group" role="group">
                        <a href="{{ route('user.notifications', $user) }}" class="btn btn-success text-white">All</a>
                        <a href="{{ route('user.unread.notifications', $user) }}" class="btn btn-success text-white">Unread</a>
                    </div>
                    @unless($user_notifications->isEmpty())
                    <a href="{{ route('user.read.notifications', $user) }}" class="btn btn-link">Mark all read</a>
                    @endunless
                </div>

            </div>
            <div class="card-body">
                @if($user_notifications->isEmpty())
                    <div class="col-md-8 text-center">
                        <div class="clearfix">
                            <h1 class="float-left display-3 me-4">Hey!</h1>
                            <h4 class="pt-3">All caught up!</h4>
                            <p class="text-medium-emphasis">You don't have any unread notificatons.</p>
                        </div>
                    </div>
                @else
                    <ul class="list-group list-group-flush">
                        @foreach($user_notifications as $notification)
                            <li class="list-group-item"><a href="{{ $notification->data['link'] }}">{{ $notification->data['message'] }}</a></li>
                        @endforeach
                    </ul>
                @endif

            </div>
        </div>
    </div>
@endsection
