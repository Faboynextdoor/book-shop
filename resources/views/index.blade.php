@extends('layouts.app')
@section('title', '商品列表')

@section('content')
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
  <div class="panel-body">
    <div class="row">
      <form action="/" class="form-inline search-form" method="post">
        {{ csrf_field() }}
        <input type="text" class="form-control input-sm" name="search" placeholder="搜索" style="margin-left:10px">
        <button class="btn btn-primary btn-sm" >搜索</button>
        <select name="order" class="form-control input-sm pull-right" style="margin-right:10px">
          <option value="arbitary">排序方式</option>
          <option value="price_asc">价格从低到高</option>
          <option value="price_desc">价格从高到低</option>
          <option value="current_school">只看校友发布的书</option>
        </select>
      </form>
    </div>
    <div class="row products-list">
        
    </div>
  </div>
</div>
</div>
</div>

<div class="row">
@if(count($boo)===0)
<div class="col-sm-6 col-md-3">
    <h2 style="margin-left:10px">没有找到结果!</h2>
</div>
@else
@foreach ($boo as $book)
    <div class="col-sm-6 col-md-3">
         <div class="thumbnail">
           <img src="\img\{{ $book->book_image }}" />
            <div class="caption">
                <a href="\book\{{$book->id}}">
                <h4 >{{$book->name}}</h4>
                </a>
                <p>
                  <span style="color:red;font-size:18px">￥{{$book->price}}</span>
                  <span class="text-muted" style="text-decoration:line-through;margin-left:5px">￥{{$book->price}}</span>
                </p>
            </div>
         </div>
    </div>
@endforeach
@endif
</div>


@endsection



@section('scriptsAfterJs')
  <script>
  </script>
@endsection
