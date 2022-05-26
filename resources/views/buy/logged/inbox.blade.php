@extends('buy.logged.main')
@section('body')

    <div class="message">
        <div class="inbox-mode">
            @foreach($senders as $id => $message)
                <div class="inbox-content">
                    <button id="message" style="border: 0px; background: none; font-weight: {{ ($message->opened == 0) ? 'bolder' : 'light'  }}">
                        <h5>{{ $message->sender }}</h5>
                        <p>{{ $message->header }}</p>
                    </button>
                </div>
            @endforeach
        </div>

        <div class="vr"></div>

        <div class="inbox-details">
            @foreach($messages as $id => $message)
                <div class="message-details" hidden>
                    <p id="{{ $id }}">
                        {{ $message->message }}
                    </p>
                    <i style="cursor: pointer; text-align: end; display: block; color: grey; font-size: 13px">{{  date('h:i a',strtotime($message->created_at)) }}</i>
                </div>
                <b class="open" hidden>{{ $message->id }}</b>

                @if($message->reply !== null)
                    <div class="reply-details" hidden>
                        <p>
                            {{ $message->reply}}
                        </p>
                        <i style="cursor: pointer; text-align: start; display: block; color: grey; font-size: 13px">{{  date('h:i a',strtotime($message->updated_at)) }}</i>
                    </div>
                @else
                @endif
            @endforeach
            <div class="reply" hidden>
                <form>
                    @csrf
                    <input type="text" name="reply" placeholder="Text a message....">
                    <button type="submit">Reply</button>
                </form>
            </div>
            <div class="inbox-details-message">
                <img src="{{ Storage::url('/logo/inbox.png') }}">
                <div class="inbox-details-contents">
                    <p>Nothing to show here</p>
                    <p>You don't have any messages opened</p>
                    <p style="margin-top: 14px">Here you will be able to see all the messages that we send you. Stay tuned</p>
                </div>
                <a class="btn btn-warning fw-bold text-light" onclick="history.back()"> Go Back</a>
            </div>
        </div>
    </div>

@endsection

