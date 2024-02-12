@foreach($comments as $comment)
    <div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
        <br>
        <strong></strong>
        <div class="row">
            <div>
                <div class="d-flex justify-content-between align-items-center">
                  <p class="mb-1 mx-2">
                    {{ $comment->user->name }}
                    <span class="small">- {{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</span>
                  </p>
                </div>
                <p class="small mb-0 mx-2">
                    {{ $comment->body }}
                </p>
            </div>

        </div>
        @if( Auth::guard('webuser')->check())
        <form method="post" action="{{ route('nestedcomments.store') }}">
            @csrf
            <div class="row">
            <div class="col-12 col-sm-9 col-md-9 col-lg-10 form-group">
                <input type="text" name="body" class="form-control" required/>
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            </div>
            <div class="col-12 col-sm-3 col-md-3 col-lg-2 form-group">
                <button type="submit" class="btn btn-outline-success">
                    <i class="fas fa-reply fa-xs"></i> Reply
                </button>
            </div>
            </div>
        </form>
        @endif
        @include('frontend.partials.commentDisplay', ['comments' => $comment->replies])
    </div>
@endforeach
