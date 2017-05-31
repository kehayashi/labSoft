@extends('template_principal')

@section('conteudo')

 <div class="content-wrapper" style="min-height: 243px; background-color: white;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-user"></i> Usuários <small>cadastrados</small>
      </h1>
    </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @if((old('nome')) && (count($errors) <= 0))
                <div class="alert alert-success">
                    <i class="fa fa-check"></i>  Usuário <b>{{ old('nome') }}</b> foi cadastrada com sucesso!
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
                @endif

                @if(isset($deletado))
                <div class="alert alert-success">
                    <i class="fa fa-check"></i> Usuário foi excluído com sucesso!
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
                @endif

                <div class="box box-primary" style="background-color: #f2f2f2;">
                    <div class="box-header with-border">
                        <h1 class="box-title"><i class="fa fa-user"></i> Usuários <small>informações</small>
                        </h1>
                        <div class="box-body">
                             <form action="/peca/crud" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="table-responsive-fluid">
                                    <table class="table table-striped table-condensed">
                                        <tr style="background-color: #333">
                                            <td style="color: white;">Nome</td>
                                            <td style="color: white;">Tipo de usuário</td>
                                            <td style="color: white;">Email</td>
                                            <td style="color: white;">Data do cadastro</td>
                                            <td class="text-center" style="color: white;">Excluir</td>
                                        </tr>
                                        <!-- end tr-->

                                        @foreach($usuarios as $u)
                                        <tr>
                                            <td>{{ $u->name }}</td>
                                            <td>{{ $u->tipo_usuario }}</td>
                                            <td>{{ $u->email }}</td>
                                            <td>{{ date('d/m/Y H:i:s', strtotime($u->created_at)) }}</td>
                                            <td class="text-center">
                                                <a href="#" data-toggle="modal" data-target="#myModal2" id="idModal">
                                                    <span class="label label-danger" style="font-size: 13px;">
                                                        <i class="fa fa-close" style="margin-top: 6px;"></i>
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                        <!-- end tr -->
                                        @endforeach
                                    </table>
                                    <!-- end table -->
                                </div>
                                <!-- end table responsive -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-success form-control" data-toggle="modal" data-target="#myModal">
                                            Cadastrar usuário
                                        </button>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->
                             </form>
                             <!-- end form -->
                        </div>
                        <!-- end box body -->
                    </div>
                    <!-- end box header -->
                </div>
                <!-- end box primary -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- container -->
</section>
<!-- end section -->
</div>
<!-- content wrapper -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #f2f2f2;">
          <div class="modal-header" style="background-color: #f2f2f2;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Cadastrar novo usuário</h4>
          </div>
          <form action="/usuarios/cadastrar" method="post">
            <div class="modal-body">
             @if (count($errors) > 0)
               <div class="alert alert-danger">
                    <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
                <div class="box box-primary" style="background-color: #f2f2f2;">
                    <div class="box-header with-border">
                        <h1 class="box-title">Usuário <small>informações</small></h1>
                        <div class="box-body">
                            <div class="row">
                                <div class="form-group-row">
                                    <div class="col-lg-12">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <b>Nome:</b><br>
                                        <input class="form-control" name="nome" placeholder="nome">
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end form group -->
                            </div>
                            <!-- end row -->
                            <div class="row">
                                <div class="form-group-row">
                                    <div class="col-lg-12">
                                        <b>Tipo de usuário:</b><br>
                                        <select class="form-control select2 select2-hidden-accessible" name="tipo_usuario" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                            <option value="null">Selecione</option>
                                            <option value="admin">Admin</option>
                                            <option value="usuario">Usuário</option>
                                        </select>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- form group -->
                            </div>
                            <!-- end row -->
                            <div class="row">
                                <div class="form-group-row">
                                    <div class="col-lg-12">
                                        <b>Email:</b><br>
                                        <input type="text" class="form-control" name="email" placeholder="email@email.com">
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- form group -->
                            </div>
                            <!-- end row -->
                            <div class="row">
                                <div class="form-group-row">
                                    <div class="col-lg-12">
                                        <b>Senha:</b><br>
                                          <input type="password" class="form-control" name="senha" value="">
                                      </div>
                                      <!-- end col -->
                                  </div>
                                  <!-- form group -->
                              </div>
                              <!-- end row -->
                        </div>
                        <!-- end box body -->
                    </div>
                    <!-- end box header -->
                </div>
                <!-- end box warning -->
            </div>
            <!-- end modal body-->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
            <!-- modal footer -->
        </form>
        <!-- end form -->
        </div>
        <!-- modal content -->
      </div>
      <!-- modal dialog -->
    </div>
    <!-- end modal -->

 <script>
    $(function () {
        $(".select2").select2();
    });
</script>

@stop
