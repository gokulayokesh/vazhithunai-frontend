@include('include.header')

<body class="properties-page">
    @include('include.nav-header')

    <main class="main">

        <div class="container-fluid py-4">
            <div class="row">
                <!-- Left: Chat List -->
                <div class="col-lg-4 col-md-5 border-end">
                    <h5 class="mb-3">Chats</h5>
                    <ul class="list-group chat-list">
                        @foreach ($chats as $chatItem)
                            @php
                                $otherUser =
                                    $chatItem->user_one_id == auth()->id() ? $chatItem->userTwo : $chatItem->userOne;
                            @endphp
                            <a href="{{ route('chat.show', $chatItem->id) }}"
                                class="list-group-item list-group-item-action d-flex align-items-center {{ $chatItem->id == $chat->id ? 'active' : '' }}">
                                <img src="{{ asset($otherUser->userImages->first()?->image_path) ?? asset('assets/img/default-profile.jpg') }}"
                                    alt="{{ $otherUser->name }}" class="rounded-circle me-2" width="40"
                                    height="40">
                                <div class="flex-grow-1">
                                    <strong>{{ $otherUser->name }}</strong>
                                    <p class="mb-0 text-muted small">
                                        {{ Str::limit($chatItem->messages->last()->content ?? 'No messages yet', 30) }}
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    </ul>
                </div>

                <!-- Right: Chat Window -->
                <div class="col-lg-8 col-md-7 d-flex flex-column">
                    @php
                        $activeUser = $chat->user_one_id == auth()->id() ? $chat->userTwo : $chat->userOne;
                    @endphp

                    <div class="chat-header border-bottom py-2 px-3 d-flex align-items-center">
                        <img src="{{ asset($activeUser->userImages->first()?->image_path) ?? asset('assets/img/default-profile.jpg') }}"
                            alt="{{ $activeUser->name }}" class="rounded-circle me-2" width="45" height="45">
                        <div>
                            <h6 class="mb-0">{{ $activeUser->name }}</h6>
                            @if ($activeUser->isOnline())
                                <small class="text-success">● Online</small>
                            @else
                                <small class="text-muted">Last seen
                                    {{ $activeUser->last_seen?->diffForHumans() ?? 'a while ago' }}</small>
                            @endif
                            {{-- <small class="text-muted">{{ $activeUser->userDetails->city->name ?? '' }}</small> --}}
                        </div>
                    </div>

                    <div id="chatBody" class="chat-body flex-grow-1 p-3"
                        style="background:#f9f9f9; height:300px; overflow-y:auto;">
                        @forelse($chat->messages as $msg)
                            @if ($msg->sender_id == auth()->id())
                                {{-- My messages (right aligned) --}}
                                <div class="d-flex justify-content-end mb-3">
                                    <div class="p-2 rounded bg-primary text-white"
                                        style="max-width: 70%; border-radius:15px 15px 0 15px;">
                                        {{ $msg->content }}
                                        <div class="small text-light mt-1 text-end">
                                            {{ $msg->created_at->format('h:i A') }}</div>
                                    </div>
                                </div>
                            @else
                                {{-- Received messages (left aligned) --}}
                                <div class="d-flex justify-content-start mb-3">
                                    <div class="p-2 rounded bg-secondary-subtle"
                                        style="max-width: 70%; border-radius:15px 15px 15px 0;">
                                        {{ $msg->content }}
                                        <div class="small text-muted mt-1">{{ $msg->created_at->format('h:i A') }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <p class="text-muted">No messages yet. Start the conversation!</p>
                        @endforelse
                    </div>


                    <div class="chat-footer border-top p-3">
                        <form action="{{ route('chat.send', $chat->id) }}" method="POST" class="d-flex">
                            @csrf
                            <input type="text" name="content" class="form-control me-2"
                                placeholder="Type a message..." style="text-transform: capitalize;" required>
                            <button class="btn btn-primary"><i class="bi bi-send"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>

    @include('include.login')
    @include('include.footer')
    @include('include.script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let chatBody = document.getElementById('chatBody');
            if (chatBody) {
                chatBody.scrollTop = chatBody.scrollHeight;
            }

        });
    </script>
    <script>
        // Enable logging for debugging
        Pusher.logToConsole = true;

        // Initialize Pusher with your key/cluster
        var pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
            cluster: "{{ env('PUSHER_APP_CLUSTER') }}",
            authEndpoint: "/broadcasting/auth",
            auth: {
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                }
            }
        });


        // Subscribe to the same channel Laravel broadcasts to
        var channel = pusher.subscribe("private-chat.{{ $chat->id }}")


        // Bind to your event
        channel.bind("message.sent", function(data) {
            console.log("New message:", data);
            // appendMessage(data.message, data.user); // update UI
        });
    </script>

</body>
