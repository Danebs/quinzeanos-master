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
                <th>Descrição</th>
                <th>Ações</th>
                </thead>
                <tbody>
                @forelse($marks as $mark)
                    <tr>
                        <td>{{$mark->name}}</td>
                        <td>{{$mark->description}}</td>
                        <td>
                            <span class="data_mark" style="display: none">
                                {{$mark}}
                            </span>
                            <button class="btn btn-default btn-xs editMark">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </button>
                            <button class="btn btn-danger btn-xs deleteMark">
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
        {{--Nova marca--}}
        <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             ng-controller="markNewController">
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
                                <input type="text" id="name" class="form-control" ng-model="mark.name" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Descrição</label>
                                <textarea rows="5" cols="5" id="description" class="form-control"
                                          ng-model="mark.description"></textarea>
                                QTD:@{{ mark.description.length }}
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" ng-click="newMark(mark)">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
        {{--Editar marca--}}
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             ng-controller="markNewController">
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
                                <label for="descriptionEdit">Descrição</label>
                                <textarea rows="5" cols="5" id="descriptionEdit" class="form-control"></textarea>
                            </div>
                            <input type="hidden" id="idEdit">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary saveMarkEdit">Salvar</button>
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

            $(document).on('click', '.editMark', function () {
                var mark = JSON.parse($(this).parent().find('.data_mark').text());
                $('#idEdit').val(mark.id);
                $('#nameEdit').val(mark.name);
                $('#descriptionEdit').val(mark.name);
                $('#editModal ').modal('show');
            });
            $(document).on('click', '.deleteMark', function () {
                var mark = JSON.parse($(this).parent().find('.data_mark').text());

                swal(
                        {
                            title: "Exclusão marcas",
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
                                url: '{{url('/cadastro/marcas')}}/' + mark.id,
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


            $('.saveMarkEdit').click(function () {
                var mark = {
                    name: $('#descriptionEdit').val(),
                    description: $('#descriptionEdit').val()
                };
                $.ajax({
                    url: '{{url('/cadastro/marcas')}}/' + $('#idEdit').val(),
                    type: 'put',
                    data: mark,
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
            app.controller('markNewController', function ($scope, $http) {
                $scope.newMark = function (mark) {
                    $http({
                        method: 'post',
                        url: '{{url('/cadastro/marcas')}}',
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