@extends('layouts.app')
@component('components.header',['transparent'=>false])
   @endcomponent
@section('content')
<!-- Page Content -->
<div class="container" id="contato" style="padding: 25px">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{url('produtos')}}" class="list-group-item">Todas</a>
                @foreach($marks as $mark)
                    <a href="{{url('produtos')}}/{{$mark->id}}" class="list-group-item">{{$mark->name}}</a>
                @endforeach
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                @forelse($products as $product)
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail" id="containerProduto">
                            <img src="{{url('img/produtos/'.(empty($product->image)?'indexProdutos/padrao.png':$product->image))}}"

                                 alt="{{$product->category->name}}">
                            <div class="caption">
                                <h4 class="pull-right">R$ {{$product->price}}</h4>
                                <h4><a href="#">{{$product->category->name}}</a>
                                </h4>
                                <p>
                                    {{$product->model->mark->name}}<br>
                                    {{$product->model->name}}
                                </p>
                                <p>
                                    @foreach( json_decode($product->custom_input) as $propriety)
                                        {{$propriety->name}} : {{$propriety->value}}<br>
                                    @endforeach
                                </p>
                                <span class="product_data" style="display:none">
                                    {{$product}}
                                </span>
                                <a href="" class="btn btn-success detail-product" data-toggle="modal"><span
                                            class="glyphicon glyphicon-search"></span> Mais detalhes</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div>
                        <em class="h1 center">Nenhum produto cadastrado...</em>

                    </div>
                @endforelse
                <div class="col-sm-4">
                    {{ $products->links() }}
                </div>
            </div>

        </div>

    </div>

</div>
<!-- /.container -->

<!--Modal aviso de acesso ao painel adimin-->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Painel Administrativo!</h4>
            </div>
            <div class="modal-body">
                Área de uso restrito, o uso deve ocorrer perante autenticação!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
                <button type="button" class="btn btn-primary">Continuar</button>
            </div>
        </div>
    </div>
</div>

<!-- Detail product -->
<div class="modal fade" id="detail-product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="title-detail-product"></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-7">
                        <p>
                            <b>Marca:</b><span id="mark-detail-product"></span><br>
                            <b>Modelo:</b><span id="model-detail-product"></span><br>
                            <b>Características:</b><br>
                            <span id="proprieties-detail-product">
                    </span>
                        </p>

                        <p><b>Aplicações:</b></p>
                        <p id="applications-detail-product">


                        </p>
                        <p><b>Descrição:</b></p>
                        <p id="description-detail-product">


                        </p>

                        <p>
                            <b>Valor:</b>
                            <span id="price-detail-product"></span>

                        </p>
                    </div>
                    <div class="col-sm-5">
                        <img src="" alt="" id="image-detail-product">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>


<!-- Plugin JavaScript -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>-->
<script src="{{ asset('js/jquery.easing.min.js')}}"></script>

<!-- Contact Form JavaScript -->
<script src="{{ asset('js/jqBootstrapValidation.js')}}"></script>
<script src="{{ asset('js/contact_me.js')}}"></script>
<!-- Theme JavaScript -->
<script src="{{ asset('js/freelancer.min.js')}}"></script>

<script>
    $(document).ready(function () {
        $('.detail-product').click(function () {
            var product = JSON.parse($(this).parent().find('.product_data').text());
            console.log(product);
            $('#title-detail-product').text(product.category.description);
            $('#mark-detail-product').text(product.model.mark.name);
            $('#model-detail-product').text(product.model.name);
            $('#applications-detail-product').text(product.applications);
            $('#description-detail-product').text(product.description);
            $('#price-detail-product').text("R$" + product.price);
            image = product.image != null ? '{{asset('img/produtos/')}}/'+product.image : '{{asset('img/produtos/indexProdutos/padrao.png')}}';
            console.log(image);
            $('#image-detail-product').prop('src',image);
            $.each(JSON.parse(product.custom_input), function (index, value) {
                $('#proprieties-detail-product').append(
                    value.name + ":" + value.value + "<br>"
                );
            });
            $('#detail-product').modal('show');
        });
    });
</script>
@endsection

