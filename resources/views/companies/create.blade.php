@extends('layouts.panel')

@section('content')

    <div class="row" ng-app="App">
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
                                           ng-model="empresa.name">
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

                        <section id="address" ng-controller="addressController">

                            <div class="col-sm-12">
                                <h3 class="page-header" style="margin: 0px 0px 5px">Endereços</h3>
                                <div class="alert alert-info">É necessário ao menos um endereço</div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">Nome</label>
                                    <input type="text" id="name_address" class="form-control" ng-model="address.name">
                                </div>
                                <div class="form-group">
                                    <label for="name">Endereço</label>
                                    <input type="text" id="address" class="form-control" ng-model="address.address">
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label for="neighborhood">Bairro</label>
                                        <input type="text" id="neighborhood" class="form-control"
                                               ng-model="address.neighborhood">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="zip">CEP</label>
                                        <input type="text" id="zip" class="form-control" ng-model="address.zip">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label for="city">Cidade</label>
                                        <input type="text" id="city" class="form-control" ng-model="address.city">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="state">Estado</label>
                                        <input type="text" id="state" class="form-control" ng-model="address.states">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <table class="table table-responsive " id="list_address">
                                    <thead>
                                    <th>Nome</th>
                                    <th>Endereço</th>
                                    <th>Bairro</th>
                                    <th>Cep</th>
                                    <th>Cidade</th>
                                    <th>UF</th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-12" style="margin: 10px 0px">
                                <button class="btn btn-success" ng-click="addAddress(address)"><span
                                            class="glyphicon glyphicon-plus"></span></button>
                            </div>
                        </section>
                        <section id="contacts" ng-controller="contactController">
                            <div class="col-sm-12">
                                <h3 class="page-header" style="margin: 0px 0px 5px">Contatos</h3>
                                <div class="alert alert-info">É necessário ao menos um contato</div>
                            </div>
                            <div class="col-sm-6">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Tipo</label>
                                        <select id="type_contatct" class="form-control" ng-model="contact.type">
                                            @foreach($type_contacts as $type_contact)
                                                <option value="{{$type_contact->id}}">{{$type_contact->type}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="contact">contato</label>
                                        <input type="text" id="contact" class="form-control" ng-model="contact.contact">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <table class="table table-responsive" id="contacts_list">
                                    <thead>
                                    <th>Tipo</th>
                                    <th>Contato</th>
                                    <th>Ação</th>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                            <div class="col-sm-12" style="margin: 10px 0px">
                                <button class="btn btn-success" ng-click="addContact(contact)"><span
                                            class="glyphicon glyphicon-plus"></span></button>
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

        $(document).ready(function () {
            $(document).on('click', '.delete_list_contact', function () {
                $(this).parent().parent().remove();
            });
            $(document).on('click', '.delete_list_address', function () {
                $(this).parent().parent().remove();
            });

        });
        var app = angular.module("App", ['ngMessages']);
        var contact;
        app.controller('addressController', function ($scope, $http) {
            $scope.addAddress = function (address) {

                $('#list_address tbody').append(
                        '<tr>' +
                        '<td class="address_name">' + address.name + '</td>' +
                        '<td class="address_address">' + address.address + '</td>' +
                        '<td class="address_neighborhood">' + address.neighborhood + '</td>' +
                        '<td class="address_zip">' + address.zip + '</td>' +
                        '<td class="address_city">' + address.city + '</td>' +
                        '<td class="address_state">' + address.states + '</td>' +
                        '<td>' +
                        '<button class="delete_list_address btn btn-xs btn-danger">' +
                        '<span class="glyphicon glyphicon-trash"></span>' +
                        '</button> ' +
                        '</td>' +
                        '</tr>'
                );


            }
        });
        app.controller('contactController', function ($scope, $http) {
            $scope.contact = {};
            $scope.addContact = function (contact) {
                console.log(contact);
                $http.get('type/contacts/' + contact.type).then(function (response) {
                    $('#contacts_list tbody').append(
                            '<tr>' +
                            '<td class="contact_type">' + response.data.type + '</td>' +
                            '<td class="contact_contact">' + contact.contact + '</td>' +
                            '<td>' +
                            '<button class="delete_list_contact btn btn-xs btn-danger">' +
                            '<span class="glyphicon glyphicon-trash"></span>' +
                            '</button> ' +
                            '<span class="id_type_contact">' + contact.type + '</span> ' +
                            '</td>' +
                            '</tr>'
                    );
                }, function (response) {
                    console.log(response);
                });
            }
        });
        app.controller('formController', function ($scope, $http) {
            $scope.addEmpresa = function (empresa) {
                $scope.contactList = [];
                $scope.addresstList = [];
                $('#contacts_list tbody').find('tr').each(function (index, item) {
                    console.log($(item).find('.contact_type').text());
                    $scope.contactList.push(
                            {
                                type_contact_id: $(item).find('.id_type_contact').text(),
                                contact: $(item).find('.contact_contact').text(),

                            }
                    );

                });
                $('#list_address tbody').find('tr').each(function (index, item) {
                    $scope.addresstList.push(
                            {
                                name: $(item).find('.address_name').text(),
                                address: $(item).find('.address_address').text(),
                                neighborhood: $(item).find('.address_neighborhood').text(),
                                zip: $(item).find('.address_zip').text(),
                                city: $(item).find('.address_city').text(),
                                state: $(item).find('.address_state').text(),


                            }
                    );

                });
                $http({
                    method: 'post',
                    url: '{{url('empresa')}}',
                    data:{
                        'empresa':$scope.empresa,
                        'listContacts':$scope.contactList,
                        'listAddress':$scope.addresstList,
                    }
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