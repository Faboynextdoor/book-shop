@extends('layouts.app')
@section('title', '商品列表')

@section('content')
<div class="row">
<div class="col-lg-10 col-lg-offset-1">
<div class="panel panel-default">
  <div class="panel-body">
    <div class="row">
      <form action="" class="form-inline search-form">
        <input type="text" class="form-control input-sm" name="search" placeholder="搜索">
        <button class="btn btn-primary btn-sm">搜索</button>
        <select name="order" class="form-control input-sm pull-right">
          <option value="">排序方式</option>
          <option value="price_asc">价格从低到高</option>
          <option value="price_desc">价格从高到低</option>
          <option value="sold_count_desc">销量从高到低</option>
          <option value="sold_count_asc">销量从低到高</option>
          <option value="rating_desc">评价从高到低</option>
          <option value="rating_asc">评价从低到高</option>
        </select>
      </form>
    </div>
    <div class="row products-list">

    </div>
  </div>
</div>
</div>
</div>
@endsection

@section('scriptsAfterJs')
  <script>
  </script>
@endsection
