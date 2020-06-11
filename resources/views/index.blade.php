@extends('layouts.master')
@section('content')
<div class="container-fluid">
    {{-- @if (session()->has('success_msg'))
    <div class="alert alert-success">
        {{ session('success_msg') }}
    </div>
    @endif --}}
    <div class="row p-3">
        <div class="col-lg-2">
            @if ( Auth::check() )
                <a class="form-control btn btn-success" data-toggle="modal" data-target="#post"><strong>Đăng bài</strong></a>
            @else
                <a class="form-control btn btn-success" data-toggle="modal" data-target="#signin"><strong>Đăng bài</strong></a>
            @endif
        </div>
    </div>
    <div class="row p-3">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <ul class="list-unstyled">
                @foreach ($posts as $post)
                <li class="media">
                    <div class="media-body">
                    <h5 class="mt-0 mb-1"><a href="{{ route('post.detail', ['id' => $post->id]) }}">{{ $post->title }}</a></h5>
                    {{ $post->content }}
                    </div>
                </li>
                <li> -- Created by <strong>{{ $post->postUser->firstname }}</strong></li>
                @endforeach
            </ul>
            <div class="pagination">
                {{ $posts->links() }}
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>
@endsection
