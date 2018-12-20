@extends('layouts.app')
@section('title', '我的-bookname')

@section('content')
<h1>book name: {{$book->name}}</h1>
<h2>price: {{$book->price}}</h2>
<h2>owner id: {{$owner->owner_id}}</h2>
<h2>owner price: {{$owner->owner_price}}</h2>
<h2>owner discription: {{$owner->discription}}</h2>
<h2>writer: {{$book->writer}}</h2>

<div class="row">
<div class="col-lg-10 col-lg-offset-1">
<div class="panel panel-default">
  <div class="panel-body product-info">
    <div class="row">
      <div class="col-sm-5">
        <img class="cover" src="\img\{{$book->book_image}}" alt="">
      </div>
      <div class="col-sm-7">
        <div class="title">title</div>
        <div class="price"><label>价格</label><em>￥</em><span>price</span></div>
        <div class="sales_and_reviews">
          <div class="review_count">累计评价 <span class="count">review_count</span></div>
        </div>
      </div>
    </div>
    <div class="product-detail">
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#product-detail-tab" aria-controls="product-detail-tab" role="tab" data-toggle="tab">商品详情</a></li>
        <li role="presentation"><a href="#product-reviews-tab" aria-controls="product-reviews-tab" role="tab" data-toggle="tab">用户评价</a></li>
      </ul>
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="product-detail-tab">
          discription
        </div>
      </div>
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
