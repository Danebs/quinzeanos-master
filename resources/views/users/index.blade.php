@extends('layouts.panel')


@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="{{url('register')}}" class="btn btn-primary">Novo</a>
                </div>
            </div>
            <div class="col-sm-12">
                <table class="table  table-hover">
                    <thead>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Ações</th>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                {{$user->name}}
                            </td>
                            <td>
                                {{$user->email}}
                            </td>
                            <td>
                                <span class="data_user" style="display: none">{{$user}}</span>
                                <a href="{{'users/'.$user->id}}" class="btn btn-default btn-xs">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                <button class="btn btn-danger btn-xs deleteUser">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
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
        $(document).on('click', '.deleteUser', function () {
            var user = JSON.parse($(this).parent().find('.data_user').text());
            swal(
                    {
                        title: "Exclusão usuários",
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
                            url:'{{url('users')}}/'+user.id,
                            type:'delete'
                        }).done(function(response){
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
                        }).fail(function(){
                            swal("Oops!", 'Alguma saiu errado, tente novamente', "error");
                        });
                    });
        });
    </script>

@endsection
