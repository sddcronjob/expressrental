@extends('Layouts.listlayout')
@section('content')

<h2 class="text-center">Relationships for blog posts</h2>
@if(isset($arrBlogPostInfo[0]) && isset($arrBlogPostInfo[0]['users']))
<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">Belongs to Relation</div>
    <div class="panel-body">
      <span class="col-sm-3">Created by</span> <span class="col-sm-3">{{ $arrBlogPostInfo[0]['users']['name'] }}</span>
    </div>
  </div>
</div>
@endif

@if(count($arrBlogPostInfo) > 0)
<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">Has many relationship</div>
    <div class="panel-body">
      @foreach($arrBlogPostInfo as $key => $val)
        @foreach($val['blog_images'] as $image)
          <span class="col-sm-6">Blog Post ID</span> <span class="col-sm-6">{{ $image['blog_post_id'] }}</span>
          <span class="col-sm-6">Image</span> <span class="col-sm-6">{!! HTML::image($image['image'], 'a picture', array('style' => 'width:100px;height:100px;')) !!}</span>
        @endforeach
      @endforeach  
    </div>
  </div>
</div>
@endif

@if(isset($arrBlogPostInfo[0]) && isset($arrBlogPostInfo[0]['blog_location']))
<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">Has one relation</div>
    <div class="panel-body">
      <span class="col-sm-3">blog post location</span> <span class="col-sm-3">{{ $arrBlogPostInfo[0]['blog_location']['title'] }}</span>
    </div>
  </div>
</div>
@endif
@endsection