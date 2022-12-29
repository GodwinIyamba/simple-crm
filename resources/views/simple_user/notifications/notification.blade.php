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
                    All Notifications
                </span>
                <div class="btn-group" role="group">
                    <a href="{{ route('user.notifications', $user) }}" class="btn btn-success text-white">All</a>
                    <a href="{{ route('user.unread.notifications', $user) }}" class="btn btn-success text-white">Unread</a>
                </div>

            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    @foreach($user_notifications as $notification)
                    <li class="list-group-item"><a href="{{ $notification->data['link'] }}">{{ $notification->data['message'] }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
