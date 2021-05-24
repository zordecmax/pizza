@extends('layouts.app')

@section('metaTitle')
    All articles
@endsection

@section('metaDescription')
    All articles
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="/tag/{{$tag->id}}"><h1>All articles with tag {{ $tag->name }}</h1></a>
        </div>
    </div>
    <div class="row">


        @foreach($articles as $article)
{{--            {{ dd($article->image->path) }}--}}
        <div class="col-lg-4 col-md-6 col-12 pb-2">
            <div class="card">
                <div class="card-image">
                    <a href="/article/{{$article->id}}">
                    @isset($article->image->path)
                        <img class="card-img-top" src="{{ asset("images/articles/".$article->image->path) }}" alt="Card image cap">
                    @else
                        <img class="card-img-top" src="{{ asset("images/noimg.jpg")  }}" style="height: -webkit-fill-available;">
                    @endisset
                    </a>
                </div>


                <div class="card-body">
                    <h5 class="card-title">{{ $article->name }}</h5>
                    <div class="card_text">
                        <p class="card-text">{{ $article->short_description }}</p>
                    </div>
                    <div class="card_footer d-flex justify-content-between">
                    <a href="/article/{{$article->id}}" class="btn btn-primary">Reed more</a>
                        <span>
                            <small>{{$article->created_at->format('Y-m-d')}}</small>
                            <small>{{$article->user->name}}</small>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-12 pt-5 d-flex justify-content-center">
{{--            {{ $articles->links() }}--}}
        </div>
    </div>
</div>

@endsection
