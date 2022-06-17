@extends('buy.logged.main')
@section('body')

    <div class="message">
        <div class="message-header">
            @foreach($messages as $message)
                <div class="message-list">
                    <a href="/buy/inbox/{{ $message->id }}">
                        <div class="message-canvas">
                            <canvas id="myCanvas"></canvas>
                        </div>
                        <div class="message-text-content">
                            <p class="message-head">{{ $message->sender }}</p>
                            <span>This is the body because is itrk ckcl</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="vr"></div>

        @isset($inboxes)
            <div class="message-header-contents">
                <div class="message-details">
                    @foreach($inboxes as $inbox)
                        @if(!empty($inbox->reply))
                            <div class="message-right">
                                <div class="message-receiver">
                                    <p>{{$inbox->reply}}</p>
                                    <span>{{ date('D h:ia',strtotime($inbox->updated_at))}}</span>
                                </div>
                            </div>
                        @endif
                            @if(!empty($inbox->message))
                                <div class="message-left">
                                    <div class="message-sender">
                                        <p>{{$inbox->message}}</p>
                                        <span>{{ date('D h:ia',strtotime($inbox->created_at)) }}</span>
                                    </div>
                                </div>
                            @endif

                    @endforeach
                </div>
                <div class="message-reply">
                    <form method="post" action="/buy/{{auth()->id()}}/inbox">
                        @csrf
                        @method('put')
                        <input type="text" name="reply" placeholder="Type message" autocomplete="off">
                        <button type="submit">send</button>
                    </form>
                </div>
            </div>
        @endisset

        @if(!isset($inboxes))
            <div class="inbox-details-message">
                <img src="{{ Storage::url('/logo/inbox.png') }}">
                <div class="inbox-details-contents">
                    <p>Nothing to show here</p>
                    <p>You don't have any messages opened</p>
                    <p style="margin-top: 14px">Here you will be able to see all the messages that we send you. Stay tuned</p>
                </div>
                <a class="btn btn-warning fw-bold text-light" onclick="history.back()"> Go Back</a>
            </div>
        @endif

    </div>

    {{--    <div class="message">--}}

    {{--        <div class="inbox-mode">--}}
    {{--            @foreach($senders as $id => $message)--}}
    {{--                <div class="inbox-content">--}}
    {{--                    <button id="message" style="border: 0px; background: none; font-weight: {{ ($message->opened == 0) ? 'bolder' : 'light'  }}">--}}
    {{--                        <h5>{{ $message->sender }}</h5>--}}
    {{--                        <p>{{ $message->header }}</p>--}}
    {{--                    </button>--}}
    {{--                </div>--}}
    {{--            @endforeach--}}
    {{--        </div>--}}


    {{--        <div class="inbox-details">--}}
    {{--            @foreach($messages as $id => $message)--}}
    {{--                <div class="message-details" hidden>--}}
    {{--                    <p id="{{ $id }}">--}}
    {{--                        {{ $message->message }}--}}
    {{--                    </p>--}}
    {{--                    <i style="cursor: pointer; text-align: end; display: block; color: grey; font-size: 13px">{{  date('h:i a',strtotime($message->created_at)) }}</i>--}}
    {{--                </div>--}}
    {{--                <b class="open" hidden>{{ $message->id }}</b>--}}

    {{--                @if($message->reply !== null)--}}
    {{--                    <div class="reply-details" hidden>--}}
    {{--                        <p>--}}
    {{--                            {{ $message->reply}}--}}
    {{--                        </p>--}}
    {{--                        <i style="cursor: pointer; text-align: start; display: block; color: grey; font-size: 13px">{{  date('h:i a',strtotime($message->updated_at)) }}</i>--}}
    {{--                    </div>--}}
    {{--                @else--}}
    {{--                @endif--}}
    {{--            @endforeach--}}
    {{--            <div class="reply" hidden>--}}
    {{--                <form>--}}
    {{--                    @csrf--}}
    {{--                    <input type="text" name="reply" placeholder="Text a message....">--}}
    {{--                    <button type="submit">Reply</button>--}}
    {{--                </form>--}}
    {{--            </div>--}}
    {{--                <div class="inbox-details-message">--}}
    {{--                    <img src="{{ Storage::url('/logo/inbox.png') }}">--}}
    {{--                    <div class="inbox-details-contents">--}}
    {{--                        <p>Nothing to show here</p>--}}
    {{--                        <p>You don't have any messages opened</p>--}}
    {{--                        <p style="margin-top: 14px">Here you will be able to see all the messages that we send you. Stay tuned</p>--}}
    {{--                    </div>--}}
    {{--                    <a class="btn btn-warning fw-bold text-light" onclick="history.back()"> Go Back</a>--}}
    {{--                </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

@endsection

