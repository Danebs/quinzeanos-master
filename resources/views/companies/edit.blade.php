@extends('layouts.panel')

@section('content')

    <div class="row" ng-app="App" ng-init="empresa = {{ $empresa }}">
        <div class="col-md-12">
            <div class="alert alert-info">* Campos obrigatórios</div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form ng-controller="formController">
                        <section id="information">
                            <div class="col-sm-12">
                                <h3 class="page-header" style="margin: 0px 0px 5px">Informações gerais</h3>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">Nome *</label>
                                    <input type="text" name="name" id="name" class="form-control" required
                                           ng-model="empresa.name" >
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">CNPJ</label>
                                    <input type="text" name="cnpj" id="name" class="form-control"
                                           ng-model="empresa.cnpj">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="resume">Resumo empresa *</label>
                                    <textarea rows="3" class="form-control" name="resume" required
                                              ng-model="empresa.resume"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="who_are_us">Quem somos nós *</label>
                                    <textarea rows="5" class="form-control" name="who_are_us" required
                                              ng-model="empresa.who_are_us"></textarea>
                                </div>
                            </div>
                        </section>
                        <section id="social">
                            <div class="col-sm-12">
                                <h3 class="page-header" style="margin: 0px 0px 5px">Rede Sociais</h3>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" name="facebook" id="facebook" class="form-control"
                                           ng-model="empresa.facebook">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="google_plus">Google +</label>
                                    <input type="text" name="google_plus" id="google_plus" class="form-control"
                                           ng-model="empresa.google_plus">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="Twitter">Twitter</label>
                                    <input type="text" name="Twitter" id="Twitter" class="form-control"
                                           ng-model="empresa.twitter">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="linkedin">Linkedin</label>
                                    <input type="text" name="linkedin" id="linkedin" class="form-control"
                                           ng-model="empresa.linkedin">
                                </div>
                            </div>
                        </section>
                        <div class="col-sm-12" style="margin: 10px 0px">
                            <button class="btn btn-primary" ng-click="addEmpresa(empresa)">Salvar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script>

        $(document).ready(function(){

        });
        var app = angular.module("App", ['ngMessages']);
        app.controller('formController', function ($scope, $http) {
            $scope.addEmpresa = function (empresa) {
                $http({
                    method: 'put',
                    url: '{{url('empresa')}}/'+$scope.empresa.id,
                    data:$scope.empresa
                }).then(function successCallback(response) {
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

                }, function errorCallback(response) {
                    sweetAlert("Oops!",'Alguma saiu errado, tente novamente', "error");
                });
            }
        });
    </script>

@endsection