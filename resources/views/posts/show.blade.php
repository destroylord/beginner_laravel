@extends('layouts.app')

@section('title', $post->title)
@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
            <div class="text-secondary">
                {{ $post->category->name }} &middot; {{ $post->created_at->format('d F, Y') }}
            </div>
            <hr>

        <p>{{ $post->body }}</p>
        <div>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-link text-danger btn-sm p-0" data-toggle="modal" data-target="#exampleModal">
        Delete
        </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Anda yakin menghapusnya?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <div>{{$post->title}}</div>
                            <div class="text-secondary">
                                <small>Published : {{$post->created_at->format("d F, Y")}}</small>    
                            </div>
                        </div>
                        <form action="/posts/{{ $post->slug}}/delete" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="d-flex mt-5">
                                <button class="btn btn-danger mr-2" type="submit">Ya</button>
                                <button class="btn btn-success" type="submit" data-dismiss="modal">Tidak</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection