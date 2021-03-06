@extends('layouts.panel')
@section('content')
    <div class="row" ng-app="App">
        <form id="updateProduct" enctype="multipart/form-data">
            <input type="hidden" name="id" value="{{$product->id}}">
            <div class="col-md-12">
                <div class="panel panel-default" ng-controller="formProduct">
                    <div class="panel-body">
                        <div class="col-md-6">
                            <div class='form-group'>
                                <label for="mark">Marcas</label>
                                <select class="form-control" name="mark" ng-change="listModels(product.mark_id)"
                                        ng-model="product.mark_id" required value="" id="mark_id">
                                    <option value="{{$product->mark_id}}"></option>
                                    @foreach($marks as $mark)
                                        <option value="{{$mark->id}}">{{ucfirst($mark->name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class='form-group'>
                                <label form="model">Modelos</label>
                                <select class="form-control" name="model" id="model_id" ng-model="product.model_id"
                                        required>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label form="price">Preço</label>
                                <input type="text" name="price" id="price" class="form-control"
                                       ng-control="product.price" value="{{$product->value}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label form="category_id">Categoria</label>
                                <select class="form-control" name="category_id" id="category_id"
                                        value="{{$product->category_id}}">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class='form-group'>
                                <label form="application">Aplicações</label>
                            <textarea class="form-control" name="applications"
                                      rows="5" required
                                      id="application"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class='form-group'>
                                <label form="description">Descrição</label>
                            <textarea class="form-control" name="description"
                                      rows="5" required ng-model="product.description"
                                      id="description"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label form="custom_input">Características</label>
                                    <input type="text" class="form-control" aria-label="..." id="custom_input">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class='form-group'>
                                    <label form="custom_input_value">Valor</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" aria-label="..."
                                               id="custom_input_value">
                                        <div class="input-group-btn">
                                            <button class="btn btn-defaul addCustonInput">
                                                <span class="glyphicon glyphicon-plus "></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <table class="table table-responsive hover listProprieties">
                                    <thead>
                                    <th>Características</th>
                                    <th>Valor</th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    @foreach( json_decode($product->custom_input) as $propriety)
                                        <tr>
                                            <td>{{$propriety->name}}</td>
                                            <td>{{$propriety->value}}</td>
                                            <td>
                                                <span class="data_propriety"
                                                      style="display: none">{{ json_encode($propriety) }}</span>
                                                <button class="btn btn-danger btn-xs removeListProprieties">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class='form-group'>
                                <label form="warranty">Garantia</label>
                                <input type="number" class="form-control" min="0" max="180" name="warranty"
                                       id="warranty" ng-model="product.warranty" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class='form-group'>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="month_or_days" id="month_or_days_zero" value="0">
                                        Meses
                                    </label>
                                </div>
                                <div class="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                    <label>
                                        <input type="radio" name="month_or_days" id="month_or_days_one" value="1"
                                               ng-model="propriety.month_or_days">
                                        Dias
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Imagem do produto</label>
                                <input type="file" id="image" name="image">
                                <p class="help-block">Escolha uma imagem com resolução até 125x150</p>
                            </div>
                        </div>
                    </div>

                    <div class="panel-footer">
                        <button class="btn btn-default " type="submit">Salvar</button>
                        <div class="form-group">
                            <input type="checkbox" name="publish" id="publish"
                                   ng-model="publish">
                            Publicar produto
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        $(document).on('click', '.removeListProprieties', function () {
            $(this).parent().parent().remove();
        });
        $(document).ready(function () {
            @if($product->publish)
                $('#publish').prop('checked', true);
            @endif
            $('#mark_id').val('{{$product->model->mark->id}}');
            $('#price').val('{{$product->price}}');
            $('#description').text('{{$product->description}}');
            $('#application').text('{{$product->applications}}');
            $('#warranty').val('{{$product->warranty}}');
            if (parseInt('{{$product->month_or_days}}') == 1) {
                $('input[id=month_or_days_one]').prop("checked", true);
            } else {
                $('input[id=month_or_days_zero]').prop("checked", true);

            }

            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });

            $.ajax({
                url: '/modelos/de/marcas/{{$product->model->mark->id}}',
                type: 'get',
                dataType: 'json'
            }).then(function (response) {
                for (i = 0; i < response.data.length; i++) {
                    $('#model_id').append(new Option(response.data[0].name, response.data[0].id));
                }
                $('#model_id').val('{{$product->model_id}}');
            }).fail(function () {
                sweetAlert("Oops!", 'Falha ao carregar os modelos', "error");
            });
            $('.addCustonInput').click(function (e) {
                e.preventDefault();
                propriety = {
                    'name': $('#custom_input').val(),
                    'value': $('#custom_input_value').val()
                }
                $('.listProprieties tbody').append('<tr>' +
                        '<td>' + propriety.name + '</td>' +
                        '<td>' + propriety.value + '</td>' +
                        '<td>' +
                        '<span class="data_propriety" style="display: none">' + JSON.stringify(propriety) + '</span>' +
                        '<button class="btn btn-danger btn-xs removeListProprieties">' +
                        '<span class="glyphicon glyphicon-trash"></span>' +
                        '</button> </td>' +
                        '</tr>');


            });
            $('#updateProduct').submit(function (e) {

                e.preventDefault();
                var mark_id = $('#mark_id').val();
                var price = $('#price').val();
                var description = $('#description').text();
                var application = $('#application').text();
                var warranty = $('#warranty').val();

                var formData = new FormData(document.getElementById('updateProduct'));
                var proprieties = [];


                $('.listProprieties tbody tr').each(function (index, value) {
                    proprieties.push($(value).find('.data_propriety').text());
                });
                formData.append('custom_input', proprieties);


                $.ajax({
                    url: '{{url('cadastro/produtos/update')}}',
                    type: 'post',
                    data: formData,
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                }).fail(function (response) {
                    var msg = "";
                    console.log(response);
                    /*$.each(response.responseJSON.data, function (index, value) {
                     msg += value + '\n';
                     });
                     sweetAlert("Oops!", msg, "error");*/

                }).then(function (response) {
                    console.log(response);
                    sweetAlert({
                        title: "Bom trabalho!",
                        text: response.msg,
                        type: "success",
                        closeOnConfirm: true
                    }, function (inputValue) {
                        if (inputValue) {
                            window.location.href = '{{ url('/cadastro/produtos') }}';
                        }
                    });
                });
            })
        });


        var app = angular.module("App", ['ngMessages']);
        app.controller("formProduct", function ($scope, $http) {
            $scope.listModels = function (product) {
                $('#model_id').empty();
                $http.get('/modelos/de/marcas/' + product).then(function (response) {
                    for (i = 0; i < response.data.data.length; i++) {
                        $('#model_id').append(new Option(response.data.data[0].name, response.data.data[0].id));
                    }
                }, function (response) {

                });

            }
            $scope.newProduct = function (product) {
                console.log(product);
            }
        });
    </script>

@endsection
