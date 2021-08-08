<answer :answer="{{ $answer }}" inline-template>
    <div class="media post">
        @include('shared._vote', [
        'model' => $answer
        ])


        <div class="media-body">

            <form v-if="editing" id="form-1" @submit.prevent="">
                <div class="form-group">
                    <textarea v-model="body" class="form-control" rows="10" required></textarea>
                </div>
                <button @click="update" class="btn btn-primary" :disabled="isInvalid">Update</button>
                <button @click="cancel" class="btn btn-danger" type="button">Cancel</button>
            </form>

            <div v-else="editing">
                <div v-html="bodyHtml"></div>
                <div class="row mt-3">

                    <div class=" col-lg-4 ml-auto">
                        @if(Auth::user()->can("update", $answer))
                        <!-- <a @click.prevent="editing = true" class="btn btn-sm btn-outline-info">Edit</a> -->
                        <button @click.prevent="edit" class="btn btn-sm btn-outline-info">Edit</button>
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
    </div>
</answer>