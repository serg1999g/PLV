<?php
/**
 * @var App\Modules\Post\Http\Controllers\PostController $posts
 */
?>

@extends('app')

@section('content')
    <div class="container">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h3 class="mb-0">posts</h3>
            @can('create posts')
                <div class="d-flex justify-content-end">
                    <a class="btn btn-primary" href="{{route('web.posts.create')}}">create</a>
                </div>
            @endcan
        </div>
        <div class="d-flex justify-content-between align-items-center flex-column">
            @foreach($posts as $post)
                <div class="d-flex align-items-center w-100 mb-4">
                    <div class="block-with-posts d-flex mr-2 w-100">
                        <div class="col-2 id">{{$post->id}}</div>
                        <div class="col-4 title">{{$post->title}}</div>
                        <div class="col-6 description">{{{$post->description}}}</div>
                    </div>
                    <div class="d-flex">
                        <div>
                            <a class="btn btn-primary" href="{{route('web.posts.show', $post->id)}}">show</a>
                        </div>
                        @can('update', $post)
                            <div class="ml-2">
                                <a class="btn btn-primary" href="{{route('web.posts.edit', $post->id)}}">edit</a>
                            </div>
                        @endcan
                        @can('delete', $post)
                            <form method="POST" action="{{route('web.posts.destroy',$post->id)}}">
                                @method('DELETE')
                                @csrf
                                <button onclick="return confirm('Are you sure?');" class="btn btn-danger ml-2">
                                    delete
                                </button>
                            </form>
                        @endcan
                    </div>
                </div>

            @endforeach
            {{ $posts->links() }}
        </div>
    </div>
@endsection
