@extends('template_principal')

@section('conteudo')

 <div class="content-wrapper" style="min-height: 243px; background-color: white;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-file-text-o"></i> Relatórios <small></small>
      </h1>
    </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="well well-lg">
        <div class="row">
            <div class="col-lg-12">
                <h4>Seção destinada a geração de relatórios <i class="fa fa-file-excel-o pull-right" style="font-size: 65px; opacity: 0.1;"></i></h4>
                <span>Aqui você pode solicitar o download do arquivo no formato <b>.xls</b> (Excel/Numbers) contendo dados referentes as propriedades cadastradas.<br></span>
                <span>Neste arquivo serão encontradas informações como:</span>
                <ul>
                  <br>
                  <li>
                    Código da propriedade.
                  </li>
                  <li>
                    Data do formulário e da última alteração.
                  </li>
                  <li>
                    Telefone da propriedade.
                  </li>
                  <li>
                    Nome do resposável pela coleta das informações.
                  </li>
                  <li>
                    Condição de posse da área da propriedade bem como sua área total (ha).
                  </li>
                  <li>
                    Identificação da mão-de-obra utilizada.
                  </li>
                  <li>
                    Percentual de renda com o tipo de produção.
                  </li>
                  <li>
                    Grau de produção (convencional/orgânica).
                  </li>
                  <li>
                    Meses em que possui mão de obra terceirizada.
                  </li>
                  <li>
                    Entre outros.
                  </li>
                </ul>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
        <div class="row">
          <div class="col-md-4">

          </div>
          <div class="col-md-5">

          </div>
          <div class="col-md-3">
            <a href="/relatorio/donwloadRelatorio"><button type="button" class="btn btn-success pull-right form-control">Download <i class="fa fa-download"></i></button></a>
          </div>
        </div>
        </div>
    </div>
    <!-- container -->
</section>
<!-- end section -->
</div>
<!-- content wrapper -->


@stop
