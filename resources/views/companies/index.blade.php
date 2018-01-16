@extends('layouts.panel')

@section('content')

    <div class="row" ng-app="App" ng-init="company = {{$empresa}}">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-warning">
                    {{ session('status') }}
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    Informações gerais
                    <a href="{{url('empresa/'.$empresa->id.'/edit')}}" class="btn" title="Editar">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                </div>
                <div class="panel-body">
                    @if(count($empresa)==0)
                        Nenhuma informação ainda, <a href="empresa/create">click aqui.</a>
                    @endif

                    <p><b>Nome:</b>{{$empresa->name}}</p>
                    <p><b>CNPJ:</b>{{$empresa->cnpj}}</p>
                    <p><b>Quem Somos:</b>{{$empresa->who_are_us}}</p>
                    <p><b>Resumo:</b>{{$empresa->resume}}</p>
                    <p><b>Facebook:</b>{{$empresa->facebook}}</p>
                    <p><b>Google Plus:</b>{{$empresa->google_plus}}</p>
                    <p><b>Twitter:</b>{{$empresa->twitter}}</p>
                    <p><b>Linkedin:</b>{{$empresa->linkedin}}</p>
                </div>
                <div class="panel-heading">
                    Endereços <a href="" class="btn callModalNewAddress" title="Novo endereço">
                        <span class="glyphicon glyphicon-new-window "></span>
                    </a>
                </div>
                <div class="panel-body">
                    @foreach($address as $addr)
                        <div class="col-sm-3">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a href="" class="btn editAddress" title="Editar">
                                        <span class="glyphicon glyphicon-pencil "></span>
                                    </a>
                                    <a href="" class="btn deleteAddres" title="Editar">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                    <span style="display:none" class="addressData">{{$addr}}</span>
                                </div>
                                <div class="panel-body">
                                    <address>
                                        <p>{{$addr->name}}<br>
                                            {{$addr->city}} <br/>
                                            {{$addr->neighborhood}}<br/>
                                            {{$addr->address}}<br>
                                            {{$addr->zip}}<br>
                                        </p>
                                    </address>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
                <div class="panel-heading">
                    Contatos<a href="#" class="btn" title="Novo contato" data-toggle="modal" data-target="#newContact">
                        <span class="glyphicon glyphicon-new-window"></span>
                    </a>
                </div>
                <div class="panel-body">
                    @foreach($contacts as $contact)
                        @if($contact->type_contact_id==1 || $contact->type_contact_id==2 )
                            <p>
                                <span class="glyphicon glyphicon-phone-alt"></span>
                                <span class="contact_contact">{{$contact->contact}}</span>

                        @endif
                        @if($contact->type_contact_id==3)
                            <p>
                                <span class="glyphicon glyphicon-send"></span>
                                <span class="contact_contact">{{$contact->contact}}</span>
                        @endif
                            @if($contact->type_contact_id==4)
                                <p>
                                    <span class="glyphicon"><img src="img/1491522779_skype-logo.ico" width="15" height="15"></span>
                                    <span class="contact_contact">{{$contact->contact}}</span>
                                    @endif
                            @if($contact->type_contact_id==5)
                                <p>
                                    <span class="glyphicon"><img src="img/1491522482_whatsapp-logo.ico" width="15" height="15"></span>
                                    <span class="contact_contact">{{$contact->contact}}</span>
                                    @endif
                                <a href="" class="btn updateContact" title="Editar">
                                    <span class="glyphicon glyphicon-pencil "></span>
                                </a>
                                <a href="" class="btn deleteContact" title="Excluir">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                                <span style="display: none" class="id_contact">{{$contact->id}}</span>
                                <span style="display: none" class="id_type_contact">{{$contact->type_contact_id}}</span>
                            </p>
                            @endforeach
                </div>
            </div>
        </div>
        {{--Modal novo contato--}}
        <div class="modal fade" id="newContact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             ng-controller="contactNewController">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Novo contato</h4>
                    </div>
                    <div class="modal-body">
                        <form id="formNewContact">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Tipo</label>
                                        <select id="type_contatct" class="form-control"
                                                ng-model="contact.type_contact_id">
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
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" ng-click="addContact(contact)">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
        {{--Modal edição contato--}}
        <div class="modal fade" id="editContact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             ng-controller="contactNewController">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Novo contato</h4>
                    </div>
                    <div class="modal-body">
                        <form id="formNewContact">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Tipo</label>
                                        <select id="type_contatct_edit" class="form-control"
                                                ng-model="contact.type_contact_id">
                                            @foreach($type_contacts as $type_contact)
                                                <option value="{{$type_contact->id}}">{{$type_contact->type}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="contact">contato</label>
                                        <input type="text" id="contact_edit" class="form-control"
                                               ng-model="contact.contact">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" value="" name="id_contact_edit" id="id_contact_edit">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary saveEditContact">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
        {{--Modal novo endereço--}}
        <div class="modal fade" id="newAddress" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             ng-controller="addressNewController">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Novo endereço</h4>
                    </div>
                    <div class="modal-body">
                        <form id="formNewAddress">
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label for="name">Nome</label>
                                        <input type="text" id="name_address" class="form-control"
                                               ng-model="address.name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label for="name">Endereço</label>
                                        <input type="text" id="address" class="form-control" ng-model="address.address">
                                    </div>
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
                                        <input type="text" id="state" class="form-control"
                                               ng-model="address.states">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" ng-click="addAddress(address,company)">Salvar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        {{--Model edição endereço--}}
        <div class="modal fade" id="editAddress" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Edição de endereço</h4>
                    </div>
                    <div class="modal-body">
                        <form id="formNewAddress">
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label for="address_address_edit">Nome</label>
                                        <input type="text" id="address_name_edit" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label for="address_address_edit">Endereço</label>
                                        <input type="text" id="address_address_edit" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label for="address_neighborhood_id">Bairro</label>
                                        <input type="text" id="address_neighborhood_id" class="form-control">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="address_zip_edit">CEP</label>
                                        <input type="text" id="address_zip_edit" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label for="address_city_edit">Cidade</label>
                                        <input type="text" id="address_city_edit" class="form-control">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="address_state_edit">Estado</label>
                                        <input type="text" id="address_state_edit" class="form-control">
                                    </div>
                                    <input type="hidden" value="" id="address_id_edit">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" id="addressSalveEdit">Salvar
                        </button>
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
            $('.editAddress').click(function(){
                address = JSON.parse($(this).parent().find('.addressData').text());
                $('#address_name_edit').val(address.name);
                $('#address_address_edit').val(address.address);
                $('#address_neighborhood_id').val(address.neighborhood);
                $('#address_zip_edit').val(address.zip);
                $('#address_city_edit').val(address.city);
                $('#address_state_edit').val(address.state);
                $('#address_id_edit').val(address.id);
                $('#editAddress').modal('show');
            });
            $('#addressSalveEdit').click(function(){
                $('#editAddress').modal('hide');
                $.ajax({
                    url: '{{url('address')}}/' + $('#address_id_edit').val(),
                    type: 'put',
                    data: {
                        'name':$('#address_name_edit').val(),
                        'address':$('#address_address_edit').val(),
                        'neighborhood':$('#address_neighborhood_id').val(),
                        'zip':$('#address_zip_edit').val(),
                        'city':$('#address_city_edit').val(),
                        'state':$('#address_state_edit').val(),
                    },
                   dataType: 'json'
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
                    sweetAlert("Oops!", 'Alguma saiu errado, tente novamente', "error");
                });

            });
            $(document).on('click', '.deleteAddres', function () {
                address = JSON.parse($(this).parent().find('.addressData').text());
                $.ajax({
                    url: '{{url('address')}}/' + address.id,
                    type: 'delete',
                    data: {
                        'contact': $('#contact_edit').val(),
                        'type_contact_id': $('#type_contatct_edit').val(),
                    },
                    //dataType: 'json'
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
                    sweetAlert("Oops!", 'Alguma saiu errado, tente novamente', "error");
                });
            });
            $(document).on('click', '.updateContact', function () {
                contact = $(this).parent();
                //select
                $('#contact_edit').val($(contact).find('.contact_contact').text());
                $('#type_contatct_edit').val($(contact).find('.id_type_contact').text());
                $('#id_contact_edit').val($(contact).find('.id_contact').text());
                $('#editContact').modal('show');
            });
            $('.saveEditContact').click(function () {
                $('#editContact').modal('hide');
                $.ajax({
                    url: '{{url('contacts')}}/' + $('#id_contact_edit').val(),
                    type: 'put',
                    data: {
                        'contact': $('#contact_edit').val(),
                        'type_contact_id': $('#type_contatct_edit').val(),
                    },
                    dataType: 'json'
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
                }).fail(function (response) {
                    sweetAlert("Oops!", 'Alguma saiu errado, tente novamente', "error");
                });

            });
            $('.callModalNewAddress').click(function () {
                $('#newAddress').modal('show');
            });
            $(document).on('click', '.deleteContact', function () {
                $.ajax({
                    url: '{{url('contacts')}}/' + $(this).parent().find('.id_contact').text(),
                    type: 'delete',
                    dataType: 'json',
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
                }).fail(function (response) {
                    sweetAlert("Oops!", 'Alguma saiu errado, tente novamente', "error");
                });
            });
        });
        var app = angular.module("App", ['ngMessages']);
        app.controller('contactNewController', function ($scope, $http) {
            $scope.addContact = function (contact) {
                contact.company_id = $scope.company.id;
                $http({
                    method: 'post',
                    url: '{{url('contacts')}}',
                    data: contact
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
            $scope.deleteContact = function (id) {
                console.log(id);
            }
        });
        app.controller('addressNewController', function ($scope, $http) {
            $scope.addAddress = function (address, company) {
                address.company_id = company.id
                $http({
                    method: 'post',
                    url: '{{url('address')}}',
                    data: address
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