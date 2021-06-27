<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h2>
                        {{ $answersCount . " " . Str::plural('Answer', $answersCount) }}
                    </h2>
                </div>
                <hr />
                @include('layouts._messages')
                @foreach($answers as $answer)
                <div class="media">
                    <div class="d-flex flex-column vote-controls">
                        <a href="#" title="This answer is useful" class="vote-up">
                            <i class="fas fa-caret-up fa-3x"></i>
                        </a>
                        <span class="votes-count">1230</span>
                        <a href="#" title="This answer is not useful" class="vote-down off">
                            <i class="fas fa-caret-down fa-3x"></i>
                        </a>
                        <a href="#" title="Mrak this answer as best answer." class="vote-accepted mt-2">
                            <i class="fas fa-check fa-lg"></i>
                        </a>
                    </div>
                    <div class="media-body">
                        {{ $answer->body }}
                        <div class="float-right mt-2">
                            <span class="text-muted">
                                Answered {{ $answer->created_date }}
                            </span>
                            <div class="media mt-2">
                                <a href="{{ $answer->user->url }}" class="pr-2">
                                    <img src="{{ $answer->user->avatar }}" />
                                </a>
                                <div class="media-body mt-2">
                                    <a href="{{ $answer->user->url }}">{{ $answer->user->name }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                @endforeach
            </div>
        </div>
    </div>
</div>