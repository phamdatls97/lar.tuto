@extends('admin.layouts.glance')

@section('title')
    Xóa sản phẩm
@endsection
@section('content')
    <h1>Xóa sản phẩm {{$product->id.':'.$product->name}}</h1>

    <div class="row">
        <h3 class="title1">General Form :</h3>
        <div class="form-three widget-shadow">
            <form name="product" action="{{url('admin/shop/product/'.$product->id).'/delete'}}" method="post" class="form-horizontal">
                @csrf
                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </div>
            </form>
        </div>
    </div>

@endsection
