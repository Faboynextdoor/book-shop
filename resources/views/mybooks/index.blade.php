@extends('layouts.app')
@section('title', '我的发布的书籍')

@section('content')
<div class="list-group">
@foreach ($books as $book)
  <a href="/mybooks/{{$book->id}}" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">{{$book->name}}</h5>
      <small>{{$book->created_at}}</small>
    </div>
    <p class="mb-1">{{$book->discription}}</p>
    <small>定价:{{$book->owner_price}}</small>
    <span class="badge badge-primary badge-pill">32</span>
  </a>
@endforeach
</div>
@endsection

@section('scriptsAfterJs')
  <script>
  </script>
@endsection
