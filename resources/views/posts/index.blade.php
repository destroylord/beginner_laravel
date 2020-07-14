@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between">

        <div>
            <h4>All Post</h4>
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
                    <div class="card-footer">
                        Publish on {{ $post->created_at->diffForHumans() }}
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