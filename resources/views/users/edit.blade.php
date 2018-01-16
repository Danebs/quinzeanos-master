@extends('layouts.panel')

@section('content')
<div class="container" ng-app="App" ng-controller="UserController" ng-init="user = {{$user}}">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nome</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="" ng-model="user.name" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-mail</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="" ng-model="user.email" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Senha</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" ng-model="user.password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirme a senha</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" ng-model="user.password_confirmation" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button ng-click='salveEditUser(user)' class="btn btn-primary">
                                    Salvar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
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
    var app = angular.module("App", ['ngMessages']);
    app.controller('UserController',function($scope,$http){
        $scope.validationPass = false
        $scope.salveEditUser = function(user){
            var error = 0;
            if(user.password != user.password_confirmation){
                swal('Oops...','A senhas devem ser iguais','error');
                error++
            }else if(user.password.length < 6){
                swal('Oops...','A senhas devem ter no minímo 6 caracteres','error');
                error++
            }
            if(error==0){
                $http({
                    method: 'put',
                    url: '{{url('users')}}/'+user.id,
                    data:user
                }).then(function successCallback(response) {

                    sweetAlert({
                        title: "Bom trabalho!",
                        text: response.msg,
                        type: "success",
                        closeOnConfirm: true
                    }, function (inputValue) {
                        if (inputValue) {
                            window.location.href = '{{url('users')}}';
                        }
                    });
                }, function errorCallback() {
                    sweetAlert("Oops!",'Algumo saiu errado, tente novamente', "error");
                });
            }

        }
    });
</script>
@endsection
