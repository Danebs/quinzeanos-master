<?php

namespace App\Http\Controllers;

use App\Category;
use App\Department;
use App\Mark;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Psy\Util\Json;

class ProdutosController extends Controller
{
    /**
     * Show the application produtos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('produtos.index', [
            'page' => 'Produtos',
            'breadcrumbs' => [
                'dashboard' => '/home',
                'produtos' => ''
            ],
            'products'=>Product::paginate(15)
        ]);
    }

    public function create()
    {
        return view('produtos.create', [
            'page' => 'Novo produto',
            'breadcrumbs' => ['dashboard' => '/home', 'produtos' => '/cadastro/produtos', 'novo' => ""],
            'marks' => Mark::all(),
            'categories'=>Category::all()
        ]);
    }

    public function store(Request $request, Product $product)
    {
        $rules = [
            'applications' => 'required',
            'custom_input' => 'required|min:1',
            'description' => 'required',
            'model' => 'required|exists:models,id',
            'category_id'=>'required|exists:categories,id',
            'month_or_days' => 'required',
            'price' => 'required',
            'warranty' => 'required|max:180',
            'image' => 'mimes:jpeg,bmp,png,jpg'
        ];
        $messages = [
            'applications.required' => 'O campo aplicação é requerido',
            'custom_input.required' => 'É necessário uma característica',
            'custom_input.min' => 'Insira ao menos uma característica',
            'description.required' => 'A descrição é obrigatória.',
            'model.required' => 'O modelo é requerido',
            'model.exists' => 'O modelo informado não existe',
            'category_id.required' => 'A categoria é requerido',
            'category_id.exists' => 'A categoria informado não existe',
            'month_or_days.required' => 'Meses ou dias é requerido',
            'price.required' => 'O preço é requerido.',
            'warranty.max' => 'O máximo para garantia é 180 dias ou meses',
            'warranty.required' => 'A garantia é requerida.',
            'image.mimes' => 'A imagem deve ter as extensões:jpeg,bmp,png e jpg.'
        ];
        $validator = \Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json(["msg" => "", "data" => $validator->errors()], 400);
        }

        $product->applications = $request->get('applications');
        $product->custom_input = '['.$request->get('custom_input').']';
        $product->description = $request->get('description');
        $product->model_id = $request->get('model');
        $product->month_or_days = $request->get('month_or_days');
        $product->price = $request->get('price');
        $product->publish = $request->has('publish');
        $product->warranty = $request->get('warranty');
        $product->category_id = $request->get('category_id');
        $product->save();
        $file = $request->file('image');
        if (!empty($file)) {
            Storage::put(md5($product->id) . '.' . $file->extension(), file_get_contents($file));
            $product->image = md5($product->id) . '.' . $file->extension();
            $product->save();

        }
        return response()->json(['msg' => 'Produto inserido.', 'data' => ''], 201);
    }

    public function show($id){
        $product = Product::find($id);

        return view('produtos.update', [
            'page' => 'Edição de produto',
            'breadcrumbs' => ['dashboard' => '/home', 'produtos' => '/cadastro/produtos', 'editar' => ""],
            'marks' => Mark::all(),
            'categories'=>Category::all(),
            'product'=>$product,
        ]);
    }

    public function update(Request $request){

        $product = Product::find($request->get('id'));
        if(!$product){
            return response(['msg'=>'Produto não encontrado','data'=>''],400);
        }


        $rules = [
            'applications' => 'required',
            'custom_input' => 'required|min:1',
            'description' => 'required',
            'model' => 'required|exists:models,id',
            'category_id'=>'required|exists:categories,id',
            'month_or_days' => 'required',
            'price' => 'required',
            'warranty' => 'required|max:180',
            'image' => 'mimes:jpeg,bmp,png,jpg'
        ];
        $messages = [
            'applications.required' => 'O campo aplicação é requerido',
            'custom_input.required' => 'É necessário uma característica',
            'custom_input.min' => 'Insira ao menos uma característica',
            'description.required' => 'A descrição é obrigatória.',
            'model.required' => 'O modelo é requerido',
            'model.exists' => 'O modelo informado não existe',
            'category_id.required' => 'A categoria é requerido',
            'category_id.exists' => 'A categoria informado não existe',
            'month_or_days.required' => 'Meses ou dias é requerido',
            'price.required' => 'O preço é requerido.',
            'warranty.max' => 'O máximo para garantia é 180 dias ou meses',
            'warranty.required' => 'A garantia é requerida.',
            'image.mimes' => 'A imagem deve ter as extensões:jpeg,bmp,png e jpg.'
        ];
        $validator = \Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json(["msg" => "", "data" => $validator->errors()], 400);
        }

        $product->fill($request->all());
        $product->publish = $request->has('publish');
        $product->custom_input = '['.$request->get('custom_input').']';
        $file = $request->file('image');
        if (!empty($file)) {
            Storage::put(md5($product->id) . '.' . $file->extension(), file_get_contents($file));
            $product->image = md5($product->id) . '.' . $file->extension();
            $product->save();

        }
        $product->save();

        return response(['msg'=>'Produto atualizado.','data'=>''],201);

    }

    public function destroy($id){
        $product = Product::find($id);
        if(!$product){
            return response(['msg'=>'Produto não encontrado','data'=>''],400);
        }
        $product->delete();
        return response(['msg'=>'Produto deletado','data'=>''],200);

    }


}
