<?php
/**
 * @var App\Modules\Post\Http\Controllers\PostController $post
 */
?>

@extends('app')

@section('content')
    <div class="container">
        <h3>Show post</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <h4>
                        {{$post->title}}
                    </h4>
                    <p>
                        {{$post->description}}
                    </p>
                    <p>
                        {{$post->content}}
                    </p>
                    <br>
                    <a href="{{url()->previous()}}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
