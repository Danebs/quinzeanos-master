<?php

namespace App\Http\Controllers;

use App\Contacts;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function store(Request $request, Contacts $contacts){
        $contacts->fill($request->all());
        $contacts->save();
        return response()->json(['msg'=>'Contato inserido com sucesso.','data'=>$contacts],201);
    }

    public function destroy($id){
        $contacts = Contacts::find($id);
        if(!$contacts)
            return response()->json(['msg'=>'Contato não encontrado.'],400);
        $contacts->delete();
        return response()->json(['msg'=>'Contato removido'],200);
    }

    public function update(Request $request,$id){
        $contact = Contacts::find($id);
        if(!$contact)
            return response()->json(['msg'=>'Contato não encontrado.'],400);
        $contact->contact = $request->get('contact');
        $contact->type_contact_id = $request->get('type_contact_id');
        $contact->save();
        return response()->json(['msg'=>'Contato atualizado'],200);
    }
}
