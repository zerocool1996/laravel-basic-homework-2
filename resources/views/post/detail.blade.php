@extends('layouts.master')
@section('content')
<style>
    .form-edit-comment{
        display: none;
    }
    .btn_edit_chat, .btn_delete_chat{
        cursor: pointer;
    }
</style>
<div class="container-fluid">
    <div class="row p-3">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <ul class="list-unstyled">
                <li class="media">
                    <div class="media-body">
                        <h5 class="mt-0 mb-1">{{ $post->title }} -- Người viết: <strong>{{ $post->postUser->firstname }}</strong>
                        @if(Auth::check() && Auth::user()->id == $post->user_id)
                            <a class="btn btn-warning btn-edit-post"  data-toggle="modal" data-target="#editpost">Chỉnh sửa</a>
                            <a href="{{ route('post.delete', ['id' => $post->id]) }}" class="btn btn-danger">Xóa bài</a>
                        @endif
                        </h5>
                        Nội dung:<br>
                        {{ $post->content }}
                    </div>
                </li>
            </ul>
            <h4>Bình luận</h4>
            <div class="list_comment">
                @foreach ($post->postComment as $comment)
                    <div class="media">
                        <div class="media-body">

                            <h4>{{ $comment->commentUser->firstname }}<small><i>&nbsp&nbsp&nbsp{{ $comment->created_at->diffForHumans() }}</i></small>
                                @if (Auth::check() && Auth::user()->id == $comment->user_id)
                                <span class="btn_edit_chat" data-id="{{ $comment->id }}"><i class="fa fa-edit" aria-hidden="true"></i></span>
                                <span class="btn_delete_chat" data-id="{{ $comment->id }}" data-url="{{ route('comment.delete') }}"><i class="fa fa-trash" aria-hidden="true"></i></span>
                                @endif
                            </h4>

                            <p class="content_comment_{{ $comment->id }}">{{ $comment->content }}</p>
                        </div>
                    </div>
                    <div class="post_message message_comment_edit">
                    </div>
                    <div id="form-edit_{{ $comment->id }}" class="form-group form-edit-comment">
                        <textarea class="form-control form-group" rows="3" name="content">{{ $comment->content }}</textarea>
                        <input type="submit" class="ajax_comment_edit btn btn-primary" data-id="{{ $comment->id }}" data-url="{{ route('comment.update') }}" value="Edit comment">
                    </div>
                @endforeach
            </div>
            <div id="message_comment" class="post_message">
            </div>
            <div id="form_comment" class="post_message">
                <span class="number">Add your comment</span>
                <div class="form-group">
                    <textarea id="comment_content" class="form-control" name="content" data-url="{{ route('comment.create') }}" data-postid="{{ $post->id }}"></textarea>
                </div>
                <div class="form_sent">
                    @if (Auth::check())
                        <input id="sent_comment" type="submit" class="sent_btn ajax_comment" value="Post comment">
                    @else
                        <a href="#" id="login_form" class="sent_btn" data-toggle="modal" data-target="#signin">
                            Đăng binh luận
                        </a>
                    @endif
                </div>
            </div>

        </div>
        <div class="col-lg-2"></div>
    </div>
</div>
<!-- modal sua bai viet -->
<div class="modal fade" id="editpost">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Sửa bài viết</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{ route('post.update', ['id' => $post->id]) }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Title<span> *</span></label>
                        <input type="text" name="edittitle" class="form-control" value="{{ $post->title }}" required>
                        @if( $errors->has('edittitle') )
                            <div class="alert alert-primary">{{ $errors->first('edittitle') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label >Content<span> *</span></label>
                        <div class="box-pass">
                            <textarea name="editcontent" class="form-control" rows="7" required>{{ $post->content }}</textarea>
                        </div>
                        @if( $errors->has('editcontent') )
                            <div class="alert alert-primary">{{ $errors->first('editcontent') }}</div>
                        @endif
                    </div>
                    <div class="box-btn">
                        <button type="submit">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.ajax_comment').on('click', function() {
            var url     = $('#comment_content').data('url');
            var post_id  = $('#comment_content').data('postid');
            var content = $('#comment_content').val();
            $.ajax({
                url : url,
                type: "post",
                data:{
                    content : content,
                    post_id  : post_id,
                    _token     : "{{ csrf_token() }}"
                },
                success : function(res) {
                    $('#comment_content').val('');
                    $('.list_comment').prepend(res.view);
                }
            });
        });

        $('.btn_edit_chat').on('click', function (){
            var id = $(this).data('id');
            $('.form-edit-comment').fadeOut();
            $('#form-edit_' + id).fadeIn();
        });

        $('.ajax_comment_edit').on('click', function () {
            var content = $(this).prev('textarea').val();
            if(content == ""){
                alert("Bình luận không hợp lệ !");
            }else{
                var id      = $(this).data('id');
                var url     = $(this).data('url');
                var self = $(this);
                $.ajax({
                    url : url,
                    type: "post",
                    data:{
                        id : id,
                        content : content,
                        _token     : "{{ csrf_token() }}"
                    },
                    success: function(res) {
                        self.parent().css("display", "none");
                        self.prev('textarea').val(res);
                        self.parent().prevAll().find('.content_comment_' + id).html(res);
                        //alert('Sửa bình luận thành công');
                    }
                });
            }
        });

        $('.btn_delete_chat').on('click', function (){
            var id  = $(this).data('id');
            var url = $(this).data('url');
            var self= $(this);
            $.ajax({
                url : url,
                type: "post",
                data:{
                    id : id,
                    _token     : "{{ csrf_token() }}"
                },
                success: function(res) {
                    $('.form-edit_' + id).remove();
                    self.closest('.media').remove();
                }
            });
        })
    });
</script>
@endsection
