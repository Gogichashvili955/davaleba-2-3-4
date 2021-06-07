@extends('layout.layout')
@section('content')
    <div class="box box-primary">
        <div class="cox-header with-border">
            <h3 class="box-title">edit post</h3>
        </div>
        <form method="post" enctype="multipart/form-data" action="{{route('post.update', $post->id)}}">
           @method('PUT')
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Post title</label>
                    <input type="text" class="form-control" placeholder="title" name="title" value="{{old('title', $post->title)}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Post text</label>
                    <input type="text" class="form-control" placeholder="text" name="text" value="{{old('text', $post->text)}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Post Tags</label>
                    <select name="tags[]" id="" multiple>
                        @foreach($tags as $tag)
                            <option selected="{{$post->tags}}" value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <input type="hidden" name="_token" id="csrf_token" value="{{csrf_token()}}">
            <div class="box-footer">title
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
