@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Questions
                        <a class="btn btn-primary float-right" href="{{ route('questions.create') }}">
                            Create a Question
                        </a>

                        <div class="card-body">

                            <div class="card-deck">
                                @forelse($questions as $question)
                                    <div class="col-sm-4 d-flex align-items-stretch">
                                        <div class="card mb-3 ">
                                            <div class="card-header">
                                                <small class="text-muted">
                                                    Updated: {{ $question->created_at->diffForHumans() }}
                                                    Answers: {{ $question->answers()->count() }}

                                                </small>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">{{$question->body}}</p>
                                            </div>
                                            <div class="card-footer">
                                                <p class="card-text">

                                                    <a class="btn btn-primary float-right"
                                                       href="{{ route('questions.show', ['id' => $question->id]) }}">
                                                        View
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @empty

                                    There are no Questions . You can Create a Question

                                @endforelse
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="float-right">
                                {{ $questions->links() }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script src="https://js.pusher.com/4.3/pusher.min.js"></script>
    <script>

        // Enable pusher logging - don't include this in production

        var pusher = new Pusher('8e495aaada51de4dab46', {
            cluster: 'us2',
            forceTLS: true
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function (data) {
            console.log(data.message);
            var parsed = data.message;

            var html = '<div class="col-sm-4 d-flex align-items-stretch">\n' +
                '                                        <div class="card mb-3 ">\n' +
                '                                            <div class="card-header">\n' +
                '                                                <small class="text-muted">\n' +
                '                                                    Updated: ' + parsed.updated_at +
                '                                                    Answers: 0' +
                '                                                </small>' +
                '                                            </div>' +
                '                                            <div class="card-body">' +
                '                                                <p class="card-text">' + parsed.body + '</p>\n' +
                '                                            </div>' +
                '                                            <div class="card-footer">' +
                '                                                <p class="card-text">' +
                '                                                    <a class="btn btn-primary float-right"\n' +
                '                                                       href=/questions.show/"' + parsed.id + '">' +
                '                                                        View' +
                '                                                    </a>' +
                '                                                </p>' +
                '                                            </div>' +
                '                                        </div>' +
                '                                    </div>';

            $('.card-dock').append(html);
        });
    </script>
@endpush