<?php

namespace App\Http\Controllers;

use App\Address;
use App\Companies;
use App\Contacts;
use App\TypeContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompaniesController extends Controller
{
    public function index()
    {
        return view('companies.index', [
            'page' => 'Informações da empresa',
            'breadcrumbs' => ['Empresa' => ''],
            'empresa' => Companies::first(),
            'contacts'=>\App\Companies::first()->contacts()->get(),
            'address'=>\App\Companies::first()->address()->get(),
            'type_contacts' => TypeContact::all()
        ]);
    }

    public function create()
    {
        $companies = \App\Companies::first();
        if(!$companies){
            return view('companies.create', [
                'page' => 'Cadastro empresa',
                'breadcrumbs' => ['Empresa' => 'empresa', 'cadastro' => ''],
                'type_contacts' => TypeContact::all()
            ]);
        }
        return redirect('empresa')->with('status','Já existe um empresa cadastrada');

    }

    public function edit($id){
        $companies = \App\Companies::first();
        if(!$companies){
            return redirect('empresa')->with('status','Não foi encontrado a empresa.');
        }
        return view('companies.edit', [
            'page' => 'Edição dados empresa',
            'breadcrumbs' => ['Empresa' => 'empresa', 'edição' => ''],
            'empresa'=>$companies,
            'type_contacts' => TypeContact::all()
        ]);

    }

    public function store(Request $request, Companies $companies)
    {
        $empresa = $request->get('empresa');
        $contacts = $request->get('listContacts');
        $address = $request->get('listAddress');
        $companies->fill($empresa);
        $companies->save();
        foreach ($contacts as $contact) {
            $companies->contacts()->save(new Contacts($contact));
        }
        foreach($address as $addr){
            $companies->address()->save(new Address($addr));
        }

    }
    public function update(Request $request){
        $companies = Companies::find($request->get('id'));
        $companies->fill($request->all());
        $companies->save();
        return response()->json(['erro'=>0,'msg'=>'Registro atualizado','data'=>$companies],200);
    }
}
