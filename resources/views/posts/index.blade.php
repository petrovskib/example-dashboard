@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <table style="border: 1px solid black;" class="table table-sm">
        <thead>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Short Body</th>
            <th>Meta Title</th>
            <th>Slug</th>
            <th>Created At</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
         @foreach($posts as $post)
             <tr>
                 <td> {{ $post->title }} </td>
                 <td> {{ $post->content }} </td>
                 <td> {{ $post->short_body }} </td>
                 <td> {{ $post->meta_title }} </td>
                 <td> {{ $post->slug }} </td>
                 <td> {{ $post->created_at }} </td>
                 <td><a class="btn btn-info" href="{{ url('/posts/'.$post->id.'/edit') }}">Edit</a></td>
                 <td>
                     <form method="POST" action="{{ route('posts.destroy', $post->id) }}" >
                         @csrf
                         <input type="hidden" name="_method" value="DELETE" />
                         <button class="btn btn-danger" type="submit">Delete</button>
                     </form>
             </tr>
         @endforeach
        </tbody>
        </table>
        <hr>
        <a href="{{ url('/posts/create') }}">Add New Post</a>
        </div>
    </div>
</div>

@endsection
