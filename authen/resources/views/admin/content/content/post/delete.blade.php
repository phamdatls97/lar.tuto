@extends('admin.layouts.glance')

@section('title')
    Danh mục nội dung
@endsection
@section('content')
    <h1>Xóa bài viết {{$post->id.':'.$post->name}}</h1>

    <div class="row">
        <h3 class="title1">General Form :</h3>
        <div class="form-three widget-shadow">
            <form name="post" action="{{url('admin/content/post/'.$post->id).'/delete'}}" method="post" class="form-horizontal">
                @csrf
                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </div>
            </form>
        </div>
    </div>
@endsection
