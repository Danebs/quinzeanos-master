<?php

namespace App\Http\Controllers;

use App\Mark;
use App\Models;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    public function index()
    {
        return view('models.index',
            [
                'page'=>'Modelos',
                'breadcrumbs'=>[
                    'dashboard'=>'/home','modelos'=>''
                ],
                'models'=>Models::all(),
                'marks'=>Mark::all()
            ]);
    }

    public function store(Request $request, Models $models){
        $models->fill($request->all());
        $models->save();
        return response()->json(['msg'=>'Modelo inserido.','data'=>'',201]);
    }

    public function update(Request $request, $id){
        $models = Models::find($id);
        if(!$models)
            return response()->json(['msg'=>'Modelo não encontrado','data'=>''],400);
        $models->fill($request->all());
        $models->save();
        return response()->json(['msg'=>'Modelo atualizado.','data'=>'',201]);
    }

    public function destroy($id){
        $models = Models::find($id);
        if(!$models)
            return response()->json(['msg'=>'Modelo não encontrado','data'=>''],400);
        $models->delete();
        return response()->json(['msg'=>'Modelo removido','data'=>''],200);
    }
    public function get($id){
        return response()->json(['msg'=>'','data'=>Models::where('mark_id','=',$id)->get()],200);
    }


}
