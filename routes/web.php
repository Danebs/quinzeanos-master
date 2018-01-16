<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produtos/{id?}', function ($id = 0 ) {
    $products = [];
    if($id){
        $mark = \App\Mark::find($id);
        $products = \App\Product::where('publish','=',true)
            ->whereIn('model_id',$mark->models)
            ->paginate(15);
    }else{
        $products =  \App\Product::where('publish','=',true)->paginate(15);
    }
    return view('products',[
        'products'=>$products,
        'marks'=>\App\Mark::all()
    ]);
});


Auth::routes();

//Routes of site
Route::get('/sobrenós',function (){
    return view('sobre');
});
Route::get('register','Auth\RegisterController@showRegistrationForm')->middleware('auth')->name('register');
Route::post('register','Auth\RegisterController@register')->middleware('auth');
Route::get('/home', 'HomeController@index')->middleware('auth');
Route::get('empresa/type/contacts/{id}', 'TypeContactController@get')->middleware('auth');
Route::get('/produtos/por/departamento/{id}','CategoryController@listForDepartment');
Route::get('/modelos/de/marcas/{id}','ModelController@get');
Route::resource('/empresa','CompaniesController',['middleware' => 'auth']);
Route::resource('/contacts','ContactsController',['middleware' => 'auth']);
Route::resource('/address','AddressController',['middleware' => 'auth']);
Route::resource('/cadastro/categorias','CategoryController',['middleware' => 'auth']);
Route::resource('/cadastro/produtos','ProdutosController',['middleware' => 'auth']);
Route::post('/cadastro/produtos/update','ProdutosController@update',['middleware' => 'auth']);
Route::resource('/cadastro/modelos','ModelController',['middleware' => 'auth']);
Route::resource('/cadastro/marcas','MarkController',['middleware' => 'auth']);
Route::resource('/users','UsersController',['middleware' => 'auth']);



