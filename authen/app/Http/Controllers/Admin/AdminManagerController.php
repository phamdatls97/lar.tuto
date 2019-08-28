<?php

namespace App\Http\Controllers\Admin;

use App\Model\AdminModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminManagerController extends Controller
{
    //
    public function index(){
        $items = DB::table('admins')->paginate(5);
        $data = array();
        $data['admins'] = $items;
        return view('admin.content.users.index',$data);
    }
    public function create(){
        $data = array();
        return view('admin.content.users.submit',$data);
    }
    public function edit($id){
        $data = array();
        $item = AdminModel::find($id);
        $data['admins'] = $item;
        return view('admin.content.users.edit',$data);
    }
    public function delete($id){
        $data = array();
        $item = AdminModel::find($id);
        $data['admins'] = $item;
        return view('admin.content.users.delete',$data);
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required',
            'images' => 'required',
            'intro' => 'required',
        ]);
        $input = $request->all();
        $item = new AdminModel();
        $item->name = $input['name'];
        $item->slug = $input['slug'];
        $item->images = $input['images'];
        $item->author_id = isset($input['author_id']) ? $input['author_id'] : 0;
        $item->view = isset($input['view']) ? $input['view'] : 0;
        $item->intro = $input['intro'];
        $item->save();
        return redirect('/admin/users');

    }
    public function update(Request $request, $id){
        /*$validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required',
            'images' => 'required',
            'intro' => 'required',
        ]);
        $input = $request->all();
        $item  = ContentTagModel::find($id);

        $item->name = $input['name'];
        $item->slug = $input['slug'];
        $item->images = $input['images'];
        $item->author_id = isset($input['author_id']) ? $input['author_id'] : 0;
        $item->view = isset($input['view']) ? $input['view'] : 0;
        $item->intro = $input['intro'];
        $item->save();
        return redirect('/admin/content/tag');*/
    }
    public function destroy($id){
        /*$item  = ContentTagModel::find($id);

        $item->delete();
        return redirect('/admin/content/tag');*/
    }
}
