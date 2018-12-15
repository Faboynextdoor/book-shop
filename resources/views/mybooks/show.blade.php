@extends('layouts.app')
@section('title', '我的-bookname')

@section('content')
<h1>book name: {{$book->name}}</h1>
<h2>price: {{$book->price}}</h2>
<h2>owner id: {{$owner->owner_id}}</h2>
<h2>owner price: {{$owner->owner_price}}</h2>
<h2>owner discription: {{$owner->discription}}</h2>
<h2>writer: {{$book->writer}}</h2>

@endsection

@section('scriptsAfterJs')
  <script>
  </script>
@endsection
