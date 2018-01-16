<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function listForDepartment($id){
        $categories = Category::where('department_id','=',$id)->get();
        return $categories;
    }

    public function index(){
        return view('categories.index', [
            'page' => 'Lista de categorias',
            'breadcrumbs' => ['Dashboard' => '/home', 'categorias' => ''],
            'categories'=>Category::all()
        ]);
    }

    public function store(Request $request, Category $category){
        $category->fill($request->all());
        $category->publish = true;
        $category->department_id = 1;
        $category->save();
        $request->all();
        return response()->json(['msg'=>'Categoria inserida','data'=>''],201);
    }

    public function update(Request $request,$id){
        $category = Category::find($id);
        if(!$category)
            return response()->json(['msg'=>'Categoria não encontrada','data'=>''],400);
        $category->fill($request->all());
        $category->save();
        return response()->json(['msg'=>'Categoria atualizada','data'=>''],200);
    }

    public function destroy($id){
        $category = Category::find($id);
        if(!$category)
            return response()->json(['msg'=>'Categoria não encontrada','data'=>''],400);
        $category->delete();
        return response()->json(['msg'=>'Categoria removida','data'=>''],200);

    }

}
