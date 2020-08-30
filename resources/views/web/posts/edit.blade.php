<?php
/**
 * @var App\Modules\Post\Http\Controllers\PostController $post
 */
?>

@extends('app')

@section('content')
    <div class="container">
        <h3>Create post</h3>
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{route('web.posts.update', $post->id)}}" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group">
                        @include('components.base-input',['label'=>'title', 'type'=>'text', 'name'=>'title', 'id'=>'title', 'placeholder'=>'title', 'value'=> $post->title ])
                        <textarea placeholder="description..." name="description" id="" cols="30" rows="10" class="form-control">{{$post->description}}</textarea>
                        <br>
                        <textarea placeholder="content..." name="content" id="" cols="30" rows="10" class="form-control">{{$post->content}}</textarea>
                        <br>
                        <button class="btn btn-primary">Submit</button>
                        <a href="{{url()->previous()}}" class="btn btn-primary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
