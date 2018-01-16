<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {

        return view('users/index',
            [
                'page' => 'Usuários',
                'breadcrumbs' => ['Dashboard/' => '/home', 'usuários' => ''],
                'users' => User::all()
            ]);
    }

    public function show($id)
    {

        return view('users/edit',
            [
                'page' => 'Editar usuários',
                'breadcrumbs' => ['Dashboard/' => '/home', 'usuários' => 'users','edição'=>''],
                'user' => User::find($id)
            ]);


    }

    public function update(Request $request,User $user)
    {
        $user->fill($request->all());
        $user->password = bcrypt($request->get('password'));
        $user->save();
        return response()->json(['msg'=>'Usuário atualizado','data'=>$user],200);
    }

    public function destroy($id){
        $user = User::find($id);
        if(!$user)
            return response()->json(['msg'=>'Usuário não encontrado','data'=>""],400);
        $user->delete();
        return response()->json(['msg'=>'Usuário removido','data'=>""],200);
    }
}
