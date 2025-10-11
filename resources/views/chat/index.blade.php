@extends('include.header')
@section('title', 'About Us | Vazhithunai Matrimony')
@section('content')

    <body class="properties-page">
        @include('include.nav-header')

        <main class="main">

            <div class="container-fluid py-4">
                <div class="row">
                    <!-- Left: Chat List -->
                    <div class="col-lg-4 col-md-5 border-end">
                        <h5 class="mb-3">Chats</h5>
                        <ul class="list-group chat-list">
                            @forelse($chats as $chat)
                                @php
                                    $otherUser = $chat->user_one_id == auth()->id() ? $chat->userTwo : $chat->userOne;
                                @endphp
                                <a href="{{ route('chat.show', $chat->id) }}"
                                    class="list-group-item list-group-item-action d-flex align-items-center">
                                    <img src="{{ Storage::url($otherUser->userImages->first()?->image_path) ?? asset('assets/img/default-profile.jpg') }}"
                                        alt="{{ $otherUser->name }}" class="rounded-circle me-2" width="40"
                                        height="40">
                                    <div class="flex-grow-1">
                                        <strong>{{ $otherUser->name }}</strong>
                                        <p class="mb-0 text-muted small">
                                            {{ Str::limit($chat->messages->last()->content ?? 'No messages yet', 30) }}
                                        </p>
                                    </div>
                                </a>
                            @empty
                                <li class="list-group-item text-muted">No chats yet</li>
                            @endforelse
                        </ul>
                    </div>

                    <!-- Right: Placeholder -->
                    <div class="col-lg-8 col-md-7 d-flex align-items-center justify-content-center">
                        <p class="text-muted">Select a chat to start messaging</p>
                    </div>
                </div>
            </div>

        </main>

        @include('include.login-modal')
        @include('include.footer')
        @include('include.script')
    </body>
@endsection
