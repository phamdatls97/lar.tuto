<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\MenuItemModel;
use App\Model\Admin\MenuModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MenuItemController extends Controller
{
    //
    public function index(){
        $items = DB::table('menu_items')->paginate(5);
        $data = array();
        $data['menuitems'] = $items;
        return view('admin.content.menuitem.index',$data);
    }
    public function create(){
        $data = array();
        $data['types'] = MenuItemModel::getTypeOfMenuItem();
        $data['menus'] = MenuModel::all();
        return view('admin.content.menuitem.submit',$data);
    }
    public function edit($id){
        $data = array();
        $item = MenuItemModel::find($id);
        $data['menu'] = $item;
        return view('admin.content.menuitem.edit',$data);
    }
    public function delete($id){
        $data = array();
        $item = MenuItemModel::find($id);
        $data['menu'] = $item;
        return view('admin.content.menuitem.delete',$data);
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'type' => 'required',
            'desc' => 'required',
            'menu_id' => 'required',
        ]);
        $input = $request->all();
        $item = new MenuItemModel();
        $item->name = $input['name'];
        $item->type = isset($input['type']) ? $input['type'] : '';
        $item->params = isset($input['params']) ? $input['params'] : '';
        $item->link = isset($input['link']) ? $input['link'] : '';
        $item->desc = $input['desc'];
        $item->icon = isset($input['icon']) ? $input['icon'] : '';
        $item->menu_id = isset($input['menu_id']) ? $input['menu_id'] : 0;
        $item->parent_id = isset($input['parent_id']) ? $input['parent_id'] : 0;
        $item->save();
        return redirect('/admin/menu');

    }
    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'type' => 'required',
            'desc' => 'required',
            'menu_id' => 'required',
        ]);
        $input = $request->all();
        $item  = MenuItemModel::find($id);

        $item->name = $input['name'];
        $item->type = isset($input['type']) ? $input['type'] : '';
        $item->params = isset($input['params']) ? $input['params'] : '';
        $item->link = isset($input['link']) ? $input['link'] : '';
        $item->desc = $input['desc'];
        $item->icon = isset($input['icon']) ? $input['icon'] : '';
        $item->menu_id = isset($input['menu_id']) ? $input['menu_id'] : 0;
        $item->parent_id = isset($input['parent_id']) ? $input['parent_id'] : 0;
        $item->save();
        return redirect('/admin/menu');
    }
    public function destroy($id){
        $item  = MenuItemModel::find($id);

        $item->delete();
        return redirect('/admin/menu');
    }
}
