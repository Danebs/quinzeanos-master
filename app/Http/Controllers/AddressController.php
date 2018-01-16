<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function store(Request $request,Address $address){

        $address->address = $request->get('address');
        $address->name = $request->get('name');
        $address->neighborhood = $request->get('neighborhood');
        $address->city = $request->get('city');
        $address->state = $request->get('states');
        $address->zip = $request->get('zip');
        $address->company_id = $request->get('company_id');
        $address->save();
        return response()->json(['msg'=>'Endereço inserido.','data'=>""],201);

    }

    public function destroy($id){
        $address = Address::find($id);
        if(!$address)
            return response()->json(['msg'=>'Endereço não encontrado.','data'=>""],400);
        $address->delete();
        return response()->json(['msg'=>'Endereço removido.','data'=>""],200);
    }

    public function update(Request $request,$id){
        $address = Address::find($id);
        if(!$address)
            return response()->json(['msg'=>'Endereço não encontrado.','data'=>""],400);
        $address->address = $request->get('address');
        $address->name = $request->get('name');
        $address->neighborhood = $request->get('neighborhood');
        $address->city = $request->get('city');
        $address->state = $request->get('state');
        $address->zip = $request->get('zip');
        $address->save();
        return response()->json(['msg'=>'Endereço atualizado.','data'=>""],200);

    }
}
