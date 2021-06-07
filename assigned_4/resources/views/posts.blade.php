@extends('layout.layout')
@section('content')
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>TITLE</th>
            <th>TEXT</th>
        </tr>
        </thead>

        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->text}}</td>
                <td>
                    <form action="{{route('post.delete', $post->id)}}" method="POST">
                        @csrf{{method_field('delete')}}
                        <button type="submit" class="btn btn-sm btn-danger" >Delete</button>
                    </form>
                </td>
                <td>
                    <form action="{{route('post.edit', $post->id)}}" method="GET">
                        @csrf{{method_field('update')}}
                        <button type="submit">EDIT</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
        {{$posts->links()}}
    </table>

@endsection
