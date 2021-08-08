<div class="media post">
    @include('shared._vote', [
    'model' => $answer
    ])


    <div class="media-body">
        {{ $answer->body }}
        <div class="row mt-3">

            <div class=" col-lg-4 ml-auto">
                @if(Auth::user()->can("update", $answer))
                <a href="{{ route('questions.answers.edit', [$question->id, $answer->id]) }}" class="btn btn-sm btn-outline-info">Edit</a>
                @endif

                @if(Auth::user()->can("delete", $answer))
                <form class="form-delete" method="POST" action="{{ route('questions.answers.destroy', [$question->id, $answer->id]) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?');">Delete</button>
                </form>
                @endif
            </div>
            <div class="col-lg-4">

            </div>
            <div class="col-lg-4">
                <user-info :model="{{ $answer }}" label="Answered"></user-info>
            </div>

        </div>

    </div>
</div>