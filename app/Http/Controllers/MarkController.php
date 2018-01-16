<?php

namespace App\Http\Controllers;

use App\Mark;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    public function index()
    {
        return view('marks.index',
            [
                'page' => 'Lista de marcas',
                'breadcrumbs' => ['dashboard/' => '/home','listagem marcas'=>''],
                'marks'=>Mark::all()

            ]);
    }

    public function store(Request $request, Mark $mark){
        $mark->fill($request->all());
        $mark->save();
        return response()->json(['msg'=>'Marca inserida com sucesso','data'=>$mark],201);
    }

    public function update(Request $request,$id){
        $mark = Mark::find($id);
        if(!$mark)
            return response()->json(['msg'=>'Não foi encontrado a marca'],400);
        $mark->fill($request->all());
        $mark->save();
        return response()->json(['msg'=>'A marca foi atualizada'],200);
    }

    public function destroy($id){
        $mark = Mark::find($id);
        if(!$mark)
            return response()->json(['msg'=>'Não foi encontrado a marca'],400);
        $mark->delete();
        return response()->json(['msg'=>'A marca foi apagada'],200);
    }
}
