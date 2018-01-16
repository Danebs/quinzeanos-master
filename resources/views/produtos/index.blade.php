@extends('layouts.panel')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="{{url('cadastro/produtos/create')}}" class="btn btn-success">Novo</a>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                <th>Categoria</th>
                <th>Marca/Modelo</th>
                <th>Valor</th>
                <th>Garantia</th>
                <th>Publicado</th>
                <th>Ações</th>
                </thead>
                <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>{{$product->category->name}}</td>
                        <td>{{$product->model->mark->name}}/{{$product->model->name}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->warranty}}</td>
                        <td>{{$product->publish ? 'Sim' : 'Não'}}</td>
                        <td>
                            <a href="{{url('cadastro/produtos/'.$product->id)}}" class="btn btn-default btn-xs">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                            <button class="btn btn-primary btn-xs">
                                <span class="glyphicon glyphicon glyphicon-eye-open"></span>
                            </button>
                            <button class="btn btn-danger btn-xs deleteProduct">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                            <span class="data_product" style="display: none">
                                {{$product->id}}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Nenhum produto cadastrado</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {{ $products->links() }}
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.deleteProduct').click(function () {
                var id = $(this).parent().find('.data_product').text().trim();
                swal(
                        {
                            title: "Exclusão de produtos",
                            text: "Podemos continuar a exclusão ?",
                            type: "warning",
                            confirmButtonColor: '#DD6B55',
                            confirmButtonText: 'Sim, vamos lá!',
                            showCancelButton: true,
                            closeOnConfirm: false,
                            showLoaderOnConfirm: true,

                        },
                        function () {
                            $.ajax({
                                url: '{{url('/cadastro/produtos')}}/' + id,
                                type: 'delete'
                            }).done(function (response) {
                                sweetAlert({
                                    title: "Bom trabalho!",
                                    text: response.msg,
                                    type: "success",
                                    closeOnConfirm: true
                                }, function (inputValue) {
                                    if (inputValue) {
                                        window.location.reload();
                                    }
                                });
                            }).fail(function () {
                                swal("Oops!", 'Alguma saiu errado, tente novamente', "error");
                            });
                        }
                );
                
            });
        });
    </script>
@endsection
