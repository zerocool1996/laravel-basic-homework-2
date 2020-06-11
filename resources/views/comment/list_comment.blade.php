<div class="media">
    <div class="media-body">

        <h4>{{ $comment->commentUser->firstname }}<small><i>&nbsp&nbsp&nbsp{{ $comment->created_at->diffForHumans() }}</i></small>
            @if (Auth::check() && Auth::user()->id == $comment->user_id)
            <span class="btn_edit_chat" data-id="{{ $comment->id }}"><i class="fa fa-edit" aria-hidden="true"></i></span>
            <span class="btn_delete_chat" data-id="{{ $comment->id }}"><i class="fa fa-trash" aria-hidden="true"></i></span>
            @endif
        </h4>

        <p class="content_comment_{{ $comment->id }}">{{ $comment->content }}</p>
    </div>
</div>
<div class="post_message message_comment_edit">
</div>
<div id="form-edit_{{ $comment->id }}" class="form-group form-edit-comment">
    <textarea class="form-control form-group" rows="3" name="content">{{ $comment->content }}</textarea>
    <input type="submit" class="ajax_comment_edit btn btn-primary" data-id="{{ $comment->id }}" value="Edit comment">
</div>
