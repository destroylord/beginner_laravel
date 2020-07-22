@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between">

        <div>
            @isset($category)
                <h4>Category : {{$category->name}}</h4>
            @endisset
            @isset($tag)
                <h4>Tag : {{$tag->name}}</h4>
            @endisset

            @if(!isset($tag) && !isset($category))
                <h4>All Post</h4>
            @endif
            <hr>
        </div>
        <div>
            <a href="/posts/create" class="btn btn-primary">Add Post</a>
        </div>
    </div>
    <div class="row">
        @forelse($posts as $post)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        {{$post->title}}
                    </div>
                    <div class="card-body">
                        <div>
                            {{ Str::limit( $post->body, 100, '.' )}}
                        </div>
                        <a href="/posts/{{ $post->slug }}">Read More</a>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        Publish on {{ $post->created_at->diffForHumans() }}
                        <a href="/posts/{{$post->slug}}/edit" class="btn btn-small btn-success">Edit</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-12">
                <div class="alert alert-info">
                    Tidak ada post
                </div>
            </div>
        @endforelse
    </div>
    {{ $posts->links() }}
</div>

@stop