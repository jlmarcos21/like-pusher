@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($posts as $post)
            <div class="col-md-12 py-2">
                <div class="card">
                    <div class="card-header">
                        <h4>#{{ $post->id." ".$post->title }}</h4>
                    </div>
                    <div class="card-body">
                        {{ $post->body }}
                    </div>
                    <div class="card-footer">
                        <Like :post="{{ $post }}" :user="{{ auth()->user() }}"></Like>           
                    </div>
                </div>
            </div>
            @endforeach    
            <div class="col-md-12">
                {{ $posts->render() }}
            </div>
        </div>
    </div>
@endsection