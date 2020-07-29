@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @foreach ($posts as $post)
            <div class="card mb-4">
                @if($post->thumbnail)
                <a href="{{ route('posts.show', $post->slug) }}">
                     <img src="{{ $post->takeImage }}" style="height:400px;object-fit:cover;object-position:center;" class="card-img-top">
                </a>
                @endif
                <div class="card-body">
                    <div>
                        <a href="{{ route('categories.show', $post->category->slug) }}" class="text-secondary">
                            <small> {{ $post->category->name }} - </small>
                        </a>
                        
                        @foreach ($post->tags as $tag)
                        <a href="{{ route('tags.show', $tag->slug) }}" class="text-secondary">
                            <small> {{ $tag->name }} </small>
                        </a>
                        @endforeach
                    </div>
                    <h5>
                        <a class="text-dark" href="{{ route('posts.show', $post->slug) }}" class="card-title">
                            {{$post->title}}
                        </a>
                    </h5>
                    <div class="text-secondary my-3">
                        {{ Str::limit( $post->body, 120, '.' )}}
                    </div>
                    <div class="d-flex justify-content-between align-items-center my-3">
                        <div class="media align-items-center">
                            <img width="40" class="roundede-circle mr-3" src="{{ $post->author->gravatar() }}" alt="">
                            <div class="media-body">
                                <div>
                                    {{ $post->author->name}}
                                </div>
                            </div>
                        </div>

                        <div class="text-secondary">
                            <small>
                                Publish on {{ $post->created_at->diffForHumans() }}
                            </small>
                        </div>
                    </div>

                </div>
                
            </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
