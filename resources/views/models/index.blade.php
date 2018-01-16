@extends('layouts.panel')

@section('content')

    <div class="row" ng-app="App">

        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newModal">
                        Novo
                    </button>
                </div>
            </div>
            <table class="table table-responsive hover">
                <thead>
                <th>Nome</th>
                <th>Marca</th>
                <th>Descrição</th>
                <th>Ações</th>
                </thead>
                <tbody>
                @forelse($models as $model)
                    <tr>
                        <td>{{$model->name}}</td>
                        <td>{{$model->mark->name}}</td>
                        <td>{{$model->description}}</td>
                        <td>
                            <span class="data_model" style="display: none">
                                {{$model}}
                            </span>
                            <button class="btn btn-default btn-xs editModel">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </button>
                            <button class="btn btn-danger btn-xs deleteModel">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td rowspan="3">
                            Não existem marcas cadastradas.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        {{--Novo modelo--}}
        <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             ng-controller="modelNewController">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Nova marca</h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control" ng-model="model.name" required>
                            </div>
                            <div class="form-group">
                                <label for="mark">Marcas</label>
                                <select id="mark" class="form-control" ng-model="model.mark_id" required>
                                    @forelse($marks as $mark)
                                        <option value="{{$mark->id}}">{{$mark->name}}</option>
                                    @empty
                                        <option value="">Nenhuma marca cadastrada</option>
                                    @endforelse
                                </select>

                            </div>

                            <div class="form-group">
                                <label for="description">Descrição</label>
                                <textarea rows="5" cols="5" id="description" class="form-control"
                                          ng-model="model.description"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" ng-click="newModel(model)">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
        {{--Editar marca--}}
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Nova marca</h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="nameEdit">Name</label>
                                <input type="text" id="nameEdit" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="markEdit">Marcas</label>
                                <select id="markEdit" class="form-control" required>
                                    @forelse($marks as $mark)
                                        <option value="{{$mark->id}}">{{$mark->name}}</option>
                                    @empty
                                        <option value="">Nenhuma marca cadastrada</option>
                                    @endforelse
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="descriptionEdit">Descrição</label>
                                <textarea rows="5" cols="5" id="descriptionEdit" class="form-control"></textarea>
                            </div>
                            <input type="hidden" id="idEdit">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary saveModelEdit">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });

            $(document).on('click', '.editModel', function () {
                var model = JSON.parse($(this).parent().find('.data_model').text());
                $('#idEdit').val(model.id);
                $('#nameEdit').val(model.name);
                $('#markEdit').val(model.mark_id);
                $('#descriptionEdit').val(model.description);
                $('#editModal ').modal('show');
            });
            $(document).on('click', '.deleteModel', function () {
                var model = JSON.parse($(this).parent().find('.data_model').text());
                swal(
                        {
                            title: "Exclusão de modelos",
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
                                url: '{{url('/cadastro/modelos')}}/' + model.id,
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


            $('.saveModelEdit').click(function () {
                var model = {
                    name: $('#nameEdit').val(),
                    mark_id: $('#markEdit').val(),
                    description: $('#descriptionEdit').val()
                };

                $.ajax({
                    url: '{{url('/cadastro/modelos')}}/' + $('#idEdit').val(),
                    type: 'put',
                    data: model,
                    dataType: 'json'
                }).done(function (response) {

                    $('#editModal ').modal('hide');
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
                }).fail(function (response) {
                    sweetAlert("Oops!", 'Alguma saiu errado, tente novamente', "error");
                });
            });
            var app = angular.module("App", ['ngMessages']);
            app.controller('modelNewController', function ($scope, $http) {
                $scope.newModel = function (mark) {
                    console.log(mark);
                    $http({
                        method: 'post',
                        url: '{{url('/cadastro/modelos')}}',
                        data: mark
                    }).then(function successCallback(response) {
                        sweetAlert({
                            title: "Bom trabalho!",
                            text: response.data.msg,
                            type: "success",
                            closeOnConfirm: true
                        }, function (inputValue) {
                            if (inputValue) {
                                window.location.reload();
                            }
                        });
                    }, function errorCallback(response) {
                        sweetAlert("Oops!", 'Alguma saiu errado, tente novamente', "error");
                    });
                }
            });


        </script>

@endsection