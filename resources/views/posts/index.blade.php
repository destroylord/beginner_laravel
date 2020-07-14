@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4>All Post</h4>
        
            @foreach($posts as $post)
            <div class="card mb-3">
                <div class="card-header">
                    {{$post->title}}
                </div>
                <div class="card-body">
                    <div>
                        {{ Str::limit( $post->body, 100, '.' )}}
                    </div>
                    <a href="/posts/{{ $post->slug }}">Read More</a>
                </div>
                <div class="card-footer">
                    Publish on {{ $post->created_at->diffForHumans() }}
                </div>
              
            </div>
            @endforeach

            {{ $posts->links() }}
        </div>
    </div>
</div>

@stop