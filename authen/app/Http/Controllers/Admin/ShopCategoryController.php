<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\ShopCategoryModel;
use Illuminate\Support\Facades\DB;

class ShopCategoryController extends Controller
{
    //
    public function index(){
        $items = DB::table('shop_category')->paginate(5);
        $data = array();
        $data['cats'] = $items;
        return view('admin.content.shop.category.index',$data);
    }

    public function create(){
        $data = array();
        return view('admin.content.shop.category.submit',$data);
    }

    public function edit($id){
        $data = array();
        $item = ShopCategoryModel::find($id);
        $data['cat'] = $item;
        return view('admin.content.shop.category.edit',$data);
    }

    public function delete($id){
        $data = array();
        $item = ShopCategoryModel::find($id);
        $data['cat'] = $item;
        return view('admin.content.shop.category.delete',$data);
    }

    public function store(Request $request){
        $input = $request->all();
        $item = new ShopCategoryModel();

        $item->name = $input['name'];
        $item->slug = $input['slug'];
        $item->images = $input['images'];
        $item->intro = $input['intro'];
        $item->desc = $input['desc'];

        $item->save();
        return redirect('/admin/shop/category');

    }

    public function update(Request $request, $id){
        $input = $request->all();
        $item  = ShopCategoryModel::find($id);

        $item->name = $input['name'];
        $item->slug = $input['slug'];
        $item->images = $input['images'];
        $item->intro = $input['intro'];
        $item->desc = $input['desc'];

        $item->save();
        return redirect('/admin/shop/category');
    }

    public function destroy($id){
        $item  = ShopCategoryModel::find($id);

        $item->delete();
        return redirect('/admin/shop/category');
    }
}
