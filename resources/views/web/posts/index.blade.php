<?php
/**
 * @var App\Modules\Post\Http\Controllers\PostController $posts
 */
?>

@extends('app')

@section('content')
    <div class="container">
        <div>
            <h3>posts</h3>
            @can('create posts')
                <div class="d-flex justify-content-end mb-4">
                    <a class="btn btn-primary" href="{{route('web.posts.create')}}">create</a>
                </div>
            @endcan
        </div>
        <div class="d-flex justify-content-between align-items-center">
            @foreach($posts as $post)
                <div class="block-with-posts d-flex mr-2 w-100">
                    <div class="col-2 id">{{$post->id}}</div>
                    <div class="col-4 title">{{$post->title}}</div>
                    <div class="col-6 description">{{{$post->description}}}</div>
                </div>
                <div class="d-flex">
                    <div>
                        <a class="btn btn-primary" href="{{route('web.posts.show', $post->id)}}">show</a>
                    </div>
                    @can('edit own posts')
                        <div class="ml-2">
                            <a class="btn btn-primary" href="{{route('web.posts.edit', $post->id)}}">edit</a>
                        </div>
                    @endcan
                </div>
            @endforeach
        </div>
    </div>
@endsection
