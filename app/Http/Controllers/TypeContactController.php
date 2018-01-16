<?php

namespace App\Http\Controllers;

use App\TypeContact;
use Illuminate\Http\Request;

class TypeContactController extends Controller
{
    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id){
        $typeContact = TypeContact::find($id);
        if(!$typeContact)
            return response()->json('Tipo de contato não encontrado',400);
        return response()->json($typeContact,200);
    }
}
