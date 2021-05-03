@extends('layouts.app')

@section('metaTitle')
    {{ $article->meta_title }}
@endsection

@section('metaDescription')
    {{ $article->meta_description }}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1> {{ $article->name }}</h1>
        </div>
        <div class="col-12 d-flex justify-content-between">
            <p>Category <a href="/category/{{$category->id}}">{{ $category->name }}</a></p>
            <p>Author <a href="#">{{ $user->name }}</a></p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @isset($image->path)
              <img src="{{ asset("images/articles/".$image->path) }}" style="width: 100%" alt="{{$image->name}}">
            @else
                <img src="{{ asset("images/noimg.jpg")  }}" style="width: 100%">
            @endisset
        </div>
    </div>

    <div class="row">
        <div class="col-12 py-3">
            <p> {!! $article->content !!}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h3>Tags</h3>
        </div>
        <div class="col-12">
            @isset($tags)
            @foreach($tags as $tag)
            <div class="chip">
                <a href="/tag/{{$tag->id}}">{{ $tag->name }}</a>
                <i class="close fas fa-times"></i>
            </div>
            @endforeach
            @endisset
        </div>
    </div>

    <div class="row py-3">
        <div class="col-12">
            <div class="page-header d-flex justify-content-between">
                <h3>Comments</h3>
            </div>
        </div>
        <div class="col-12">
            <div class="comments-list">
                @isset($comments)
                @foreach($comments as $comment)
                    <div class="media d-flex">
                        <div class="media-body">
                            <h4 class="media-heading user_name">User: {{ $comment->user->name }}</h4>
                            <p>{{ $comment->message }}</p>
                        </div>
                        <p class="pull-right"><small>{{ $comment->created_at->format('Y-m-d') }}</small></p>
                    </div>
                @endforeach
                @else
                <p>No comments</p>
                @endisset
            </div>
        </div>
    </div>

</div>

@endsection
