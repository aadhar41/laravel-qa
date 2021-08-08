<div class="media questions ">
    <div class="d-flex flex-column counters">
        <div class="vote">
            <strong>
                {{ $question->votes_count }}
            </strong>
            {{ $plural = Str::plural('vote', $question->votes_count); }}
        </div>
        <div class="status {{ $question->status }}">
            <strong>
                {{ $question->answers_count }}
            </strong>
            {{ $plural = Str::plural('answer', $question->answers_count); }}
        </div>
        <div class="view">
            {{ $question->views }}
            {{ $plural = Str::plural('view', $question->views); }}
        </div>
    </div>
    <div class="media-body">
        <div class="d-flex align-items-center">
            <h3 class="mt-0"><a href="{{ $question->url }}">{{ $question->title }}</a></h3>
            <div class="ml-auto">
                @if(Auth::user()->can("update", $question))
                <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-sm btn-outline-info">Edit</a>
                @endif

                @if(Auth::user()->can("delete", $question))
                <form class="form-delete" method="POST" action="{{ route('questions.destroy', $question->id) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?');">Delete</button>
                </form>
                @endif
            </div>
        </div>
        <p class="lead">
            Asked by
            <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
            <small class="text-muted">{{ $question->created_date }}</small>
        </p>
        <div class="excerpt">
            {{ $question->excerpt(250) }}
        </div>
    </div>
</div>