@extends('template_principal')

@section('conteudo')

<style>
  #map {
    width: 100%;
    height: 40%;
    background-color: grey;
  }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 243px; background-color: white;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit"></i> Cadastro
      <small>propriedades</small>
    </h1>
    <ol class="breadcrumb">
      <li id="li"><i class="fa fa-spinner"></i> Progresso do cadastro</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">

        @if(isset($error))
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h4><i class="icon fa fa-close"></i> Erro ao cadastrar propriedade!</h4>
                  </div>
                  <!-- end alert -->
                </div>
                <!-- end col -->
              </div>
              <!-- end row -->
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->
        @endif

        @if(count($errors) > 0)
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                  </div>
                  <!-- end alert -->
                </div>
                <!-- end col -->
              </div>
              <!-- end row -->
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->
        @endif

        <div class="nav-tabs-custom">
          <div class="progress">
            <div class="progress-bar progress-bar-success progress-bar-striped" id="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
            </div>
          </div>
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Identificação</a></li>
            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Núcleo familiar</a></li>
            <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Em relação a propriedade I</a></li>
            <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Em relação a propriedade II</a></li>
            <li class=""><a href="#tab_5" data-toggle="tab" aria-expanded="false">Técnicas/Tecnologia</a></li>
            <li class=""><a href="#tab_6" data-toggle="tab" aria-expanded="false">Produção</a></li>
            <li class=""><a href="#tab_7" data-toggle="tab" aria-expanded="false">Mercados</a></li>
          </ul>
          <!-- end nav tabs-->

            <form action="/cadastrar/cadastrarFormulario" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="tab-content">

                <!-- inicio da tab_1 -->
                <div class="tab-pane active" id="tab_1">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="box box-primary" style="background-color: #f2f2f2;">
                       <div class="box-header with-border">
                       </div>
                         <div class="box-body">
                           <div class="row">
                            <div class="form-group-row">
                              <div class="col-lg-5">
                                <b>Latitude:</b><br>
                                  <input type="text" class="form-control" id="latitude" name="latitude" placeholder="ex: -29.38473984712" value="{{ old('latitude') }}">
                              </div>
                              <!-- end col -->
                              <div class="col-lg-5">
                                <b>Longitude:</b><br>
                                  <input type="text" class="form-control" id="longitude" name="longitude" placeholder="ex: 59.92874983472" value="{{ old('longitude') }}">
                              </div>
                              <!-- end col -->
                              <div class="col-lg-2">
                                <br>
                                  <button type="button" class="form-control btn btn-info" id="idModal" onclick="teste2();">Ver localização <i class="fa fa-map-marker"></i></button>
                              </div>
                              <!-- end col -->
                            </div>
                            <!-- end form-group -->
                          </div>
                          <!-- end row -->

                          <br>
                          <div class="row">
                            <div class="col-lg-4">
                              <div class="form-group">
                                <label>Municipio:</label>
                                <select class="form-control select2 select2-hidden-accessible" name="cod_municipio" id="municipios" style="width: 100%;" tabindex="-1" aria-hidden="true" value="{{ old('cod_municipio') }}">
                                </select>
                              </div>
                              <!-- end form-group -->
                            </div>
                            <!-- end col -->
                            <div class="col-lg-4">
                              <div class="form-group">
                                <label>Distrito:</label>
                                <select class="form-control select2 select2-hidden-accessible" name="cod_distrito" id="distritos" style="width: 100%;" tabindex="-1" aria-hidden="true" value="{{ old('cod_distrito') }}">
                                </select>
                              </div>
                              <!-- end form-group -->
                            </div>
                            <!-- end col -->
                            <div class="col-lg-4">
                              <div class="form-group">
                                <label>Localidade:</label>
                                <select class="form-control select2 select2-hidden-accessible" name="cod_local" id="localidades" style="width: 100%;" tabindex="-1" aria-hidden="true" value="{{ old('cod_local') }}">
                                </select>
                              </div>
                              <!-- end form-group -->
                            </div>
                            <!-- end col -->
                          </div>
                          <!-- end row-->

                          <br>
                          <div class="row">
                            <div class="form-group-row">
                              <div class="col-lg-4">
                                <b>Nome do cadastrador:</b><br>
                                <input type="text" class="form-control" name="nome_cadastrador" placeholder="ex: nome" value="{{ old('nome_cadastrador') }}">
                              </div>
                              <!-- end col -->
                              <div class="col-lg-4">
                                <b>Data do formulário:</b><br>
                                <input type="text" class="form-control" name="datas" placeholder="dd/mm/aaaa" maxlength = "10" onkeyup = "barra(this)" value="{{ old('datas') }}">
                              </div>
                              <!-- end col -->
                              <div class="col-lg-4">
                                <b>Telefone:</b><br>
                                <input type="text" class="form-control" name="telefone" placeholder="(55) 9 99999999" maxlength="15" onkeyup = "somentenumero(this, numero)" value="{{ old('telefone') }}">
                              </div>
                              <!-- end col -->
                            </div>
                            <!-- end form-group -->
                          </div>
                          <!-- end row-->

                          <div class="row">
                            <div class="col-md-10">
                            </div>
                            <!-- end col -->
                            <div class="col-md-2">
                              <br>
                              <br>
                              <br>
                            </div>
                            <!-- end col -->
                          </div>
                          <!-- end row -->
                         </div>
                        <!-- end box-body -->
                       </div>
                      <!-- end box-primary -->
                    </div>
                    <!-- end col-->
                  </div>
                  <!-- end row -->
                </div>
                <!-- end tab_1 -->

                <!-- inicio tab_2  -->
                <div class="tab-pane" id="tab_2">
                  <div class="box box-primary" style="background-color: #f2f2f2;">
                   <div class="box-header with-border">
                   </div>
                     <div class="box-body">
                       <div class="row">
                        <div class="form-group-row">
                          <div class="col-lg-12">
                            <div class="box-body table">
                              <table class="table table-hover" id="minhaTabela">
                                <thead>
                                  <tr style="background-color: #333">
                                    <th style="color: white;" class="text-center">Nome</th>
                                    <th style="color: white;" class="text-center">Parentesco</th>
                                    <th style="color: white;" class="text-center">Sexo</th>
                                    <th style="color: white;" class="text-center">Data nascimento</th>
                                    <th style="color: white;" class="text-center">Escolaridade</th>
                                    <th style="color: white;" class="text-center">Ocupação</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <td style="width: 260px;">
                                    <input type="text" class="form-control" placeholder="ex: nome" id="primeiroNome" name="nome[]">
                                  </td>
                                  <td>
                                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="cod_parentesco[]">
                                      <option value="null">Selecione</option>
                                      @foreach($parentescos as $p)
                                        <option value="{{ $p->cod_parentesco }}">{{ $p->parentesco }}</option>
                                      @endforeach
                                    </select>
                                  </td>
                                  <td>
                                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="sexo[]">
                                      <option value="null">Selecione</option>
                                      <option value="M">Masculino</option>
                                      <option value="F">Feminino</option>
                                    </select>
                                  </td>
                                  <td>
                                    <input type="text" class="form-control" name="dt_nasc[]" maxlength = "10" onkeyup = "barra(this)" placeholder="dd/mm/aaaa"/>
                                  </td>
                                  <td>
                                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="cod_escolaridade[]">'+
                                      <option value="null">Selecione</option>
                                      @foreach($escolaridades as $e)
                                        <option value="{{ $e->cod_escolaridade }}">{{ $e->escolaridade }}</option>
                                      @endforeach
                                    </select>
                                  </td>
                                  <td style="width: 380px;">
                                    <select class="form-control select2 select2-hidden-accessible" multiple="multiple" data-placeholder="Selecione" style="width: 95%;" tabindex="-1" aria-hidden="true" name="cod_ocupacao1[]">'+
                                       @foreach($ocupacoes as $o)
                                         <option value="{{ $o->cod_ocupacao }}">{{ $o->ocupacao }}</option>
                                       @endforeach
                                   </select>
                                  </td>
                                </table>
                              <input type="hidden" id ="cont" value="1">
                              <br>
                             <button type="button" class="form-control btn btn-info" onclick="inserirLinhaTabela()">Adicionar +1 membro familiar</button>
                              <div class="row">
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4">
                                </div>
                              </div>
                            </div>
                            <!-- end box-body-table -->
                          </div>
                          <!-- end col -->
                        </div>
                        <!-- end form-group -->
                      </div>
                      <!-- end row -->
                    </div>
                    <!-- end box-body -->
                  </div>
                  <!-- end box-primary -->
                </div>
                <!-- end tab_2 -->

                <!-- inicio tab_3 -->
                <div class="tab-pane" id="tab_3">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="box box-primary" style="background-color: #f2f2f2;">
                       <div class="box-header with-border">
                       </div>
                         <div class="box-body">
                           <div class="row">
                             <div class="col-md-12">
                               <label>1. Condição de posse</label><br>
                             </div>
                             <!-- end col -->
                           </div>
                          <!-- end row -->
                           <div class="row">
                             <div class="col-md-4">
                               <span>Própria (ha)</span>
                               <div class="input-group">
                                  <span class="input-group-addon">
                                    <input type="checkbox" aria-label="" id="checkPropria" name="tem_area_propria" value="sim" >
                                  </span>
                                  <input type="text" class="form-control" id="areaPropria" maxlength="7" placeholder="hectare" name="area_propria_ha" disabled onkeyup="numPonto(this, num2)">
                               </div>
                              <!-- end input-group -->
                             </div>
                            <!-- end col -->
                             <div class="col-md-4">
                               <span>Arrendada (ha)</span>
                               <div class="input-group">
                                  <span class="input-group-addon">
                                    <input type="checkbox" aria-label="" id="checkArrendada" name="tem_area_arrendada" value="sim" onclick="verificaArea2()">
                                  </span>
                                  <input type="text" class="form-control" id="areaArrendada" maxlength="7" placeholder="hectare" name="area_arrendada_ha" disabled onkeyup="numPonto(this, num2)">
                                </div>
                                <!-- end input-group -->
                             </div>
                             <!-- end col-->
                             <div class="col-md-4">
                               <span>Parceria (ha)</span>
                               <div class="input-group">
                                  <span class="input-group-addon">
                                    <input type="checkbox" aria-label="" id="checkParceria" name="tem_area_parceria" value="sim" onclick="verificaArea3()">
                                  </span>
                                  <input type="text" class="form-control" id="areaParceria" maxlength="7" placeholder="hectare" name="area_parceria_ha" disabled onkeyup="numPonto(this, num2)">
                                </div>
                                <!-- end input-group -->
                             </div>
                             <!-- end col -->
                           </div>
                           <!-- end row -->
                           <br>
                         </div>
                         <!-- end box-body-->
                      </div>
                      <!-- end box -->
                    </div>
                    <!-- end col -->
                  </div>
                  <!-- end row -->

                  <div class="row">
                    <div class="col-md-12">
                      <div class="box box-primary" style="background-color: #f2f2f2;">
                       <div class="box-header with-border">
                       </div>
                         <div class="box-body">
                           <div class="row">
                             <div class="col-md-12">
                               <label>2. Mão de obra</label><br>
                             </div>
                             <!-- end col -->
                           </div>
                           <!-- end row -->
                           <div class="row">
                             <div class="col-md-4">
                               <span>Somente Familiar</span>
                               <div class="input-group">
                                  <span class="input-group-addon">
                                    <input type="checkbox" aria-label="" id="maoFamiliar" name="tem_mao_familiar" value="sim">
                                  </span>
                                  <input type="text" class="form-control" id="numFamiliar" maxlength="2" placeholder="Quantidade" name="num_mao_familiar" disabled onkeyup="num(this, num3)">
                                </div>
                                <!-- end input-group -->
                             </div>
                             <!-- end col -->
                             <div class="col-md-4">
                               <span>Contratada</span>
                               <div class="input-group">
                                  <span class="input-group-addon">
                                    <input type="checkbox" aria-label="" id="maoContratada" name="tem_mao_contratada" value="sim">
                                  </span>
                                  <input type="text" class="form-control" id="numContratada" maxlength="2" placeholder="Quantidade" name="num_mao_contratada" disabled onkeyup="num(this, num3)">
                                </div>
                                <!-- end input-group -->
                             </div>
                             <!-- end col -->
                             <div class="col-md-4">
                               <span>Diarista</span>
                               <div class="input-group">
                                  <span class="input-group-addon">
                                    <input type="checkbox" aria-label="" id="maoDiarista" name="tem_mao_diarista" value="sim">
                                  </span>
                                  <input type="text" class="form-control" id="numDiarista" maxlength="2" placeholder="Quantidade" name="num_mao_diarista" disabled onkeyup="num(this, num3)">
                               </div>
                               <!-- end input-group -->
                             </div>
                             <!-- end col -->
                           </div>
                           <!-- end row -->
                           <div class="row">
                             <div class="col-md-4">
                             </div>
                             <!-- end col -->
                             <div class="col-md-4">
                               <div class="form-group">
                                 <select class="form-control select2 select2-hidden-accessible" id="mesContratada" name="mesesContratada[]" multiple="multiple" data-placeholder="Meses" style="width: 100%;" tabindex="-1" aria-hidden="true" disabled>
                                    <option value="jancontratada">Janeiro</option>
                                    <option value="fevcontratada">Fevereiro</option>
                                    <option value="marcontratada">Março</option>
                                    <option value="abrcontratada">Abril</option>
                                    <option value="maiocontratada">Maio</option>
                                    <option value="juncontratada">Junho</option>
                                    <option value="julcontratada">Julho</option>
                                    <option value="agocontratada">Agosto</option>
                                    <option value="setcontratada">Setembro</option>
                                    <option value="outcontratada">Outubro</option>
                                    <option value="novcontratada">Novembro</option>
                                    <option value="dezcontratada">Dezembro</option>
                                </select>
                               </div>
                               <!-- end input-group -->
                             </div>
                             <!-- end col -->
                             <div class="col-md-4">
                               <div class="form-group">
                                 <select class="form-control select2 select2-hidden-accessible" id="mesDiarista" name="mesesDiarista[]" multiple="multiple" data-placeholder="Meses" style="width: 100%;" tabindex="-1" aria-hidden="true" disabled="">
                                   <option value="jandiarista">Janeiro</option>
                                   <option value="fevdiarista">Fevereiro</option>
                                   <option value="mardiarista">Março</option>
                                   <option value="abrdiarista">Abril</option>
                                   <option value="maiodiarista">Maio</option>
                                   <option value="jundiarista">Junho</option>
                                   <option value="juldiarista">Julho</option>
                                   <option value="agodiarista">Agosto</option>
                                   <option value="setdiarista">Setembro</option>
                                   <option value="outdiarista">Outubro</option>
                                   <option value="novdiarista">Novembro</option>
                                   <option value="dezdiarista">Dezembro</option>
                                </select>
                               </div>
                               <!-- end form-group -->
                             </div>
                             <!-- end col -->
                           </div>
                           <!-- end row -->
                           <br>
                         </div>
                         <!-- end box-body-->
                      </div>
                      <!-- end box -->
                    </div>
                    <!-- end col -->
                  </div>
                  <!-- end row -->

                  <div class="row">
                    <div class="col-md-12">
                      <div class="box box-primary" style="background-color: #f2f2f2;">
                       <div class="box-header with-border">
                       </div>
                         <div class="box-body">
                           <div class="row">
                             <div class="col-md-9">
                               <label>3. Quais as principais atividades da propriedade rural em ordem de importância?</label>
                             </div>
                             <!-- end col -->
                             <div class="col-md-3">
                               <span class="pull-right"><i class="fa fa-chevron-up" style="color: #3c8dbc;"></i> Maior importancia</span>
                             </div>
                             <!-- end col -->
                           </div>
                           <!-- end row -->
                           <div class="row">
                             <div class="col-md-12">
                               <select class="form-control select2 select2-hidden-accessible" id="atividade1" style="width: 100%;" tabindex="-1" aria-hidden="true" name="importancia[]" onChange="mostraativ2()">
                                 <option value="null">Selecione as atividades da propriedade</option>
                                 @foreach($atividades as $a)
                                   <option value="{{ $a->cod_ativ }}">{{ $a->descricao }}</option>
                                 @endforeach
                               </select>
                             </div>
                             <!-- end col -->
                           </div>
                           <!-- end row -->

                           <div id="ativimport2" name="ativimport2" style="display: none;">
                             <br><br>
                             <div class="row">
                               <div class="col-md-12">
                                 <select class="form-control select2 select2-hidden-accessible" id="atividade2" style="width: 100%;" tabindex="-1" aria-hidden="true" name="importancia[]" onChange="mostraativ3()">
                                   <option value="null">Selecione as atividades da propriedade</option>
                                   @foreach($atividades as $a)
                                     <option value="{{ $a->cod_ativ }}">{{ $a->descricao }}</option>
                                   @endforeach
                                 </select>
                               </div>
                               <!-- end col -->
                             </div>
                             <!-- end row -->
                           </div>
                           <!-- end  -->

                           <div id="ativimport3" name="ativimport3" style="display: none;">
                             <br><br>
                             <div class="row">
                               <div class="col-md-12">
                                 <select class="form-control select2 select2-hidden-accessible" id="atividade3" style="width: 100%;" tabindex="-1" aria-hidden="true" name="importancia[]" onChange="mostraativ4()">
                                   <option value="null">Selecione as atividades da propriedade</option>
                                   @foreach($atividades as $a)
                                     <option value="{{ $a->cod_ativ }}">{{ $a->descricao }}</option>
                                   @endforeach
                                 </select>
                               </div>
                               <!-- end col -->
                             </div>
                             <!-- end row -->
                           </div>
                           <!-- end  -->

                           <div id="ativimport4" name="ativimport4" style="display: none;">
                             <br><br>
                             <div class="row">
                               <div class="col-md-12">
                                 <select class="form-control select2 select2-hidden-accessible" id="atividade4" style="width: 100%;" tabindex="-1" aria-hidden="true" name="importancia[]" onChange="mostraativ5()">
                                   <option value="null">Selecione as atividades da propriedade</option>
                                   @foreach($atividades as $a)
                                     <option value="{{ $a->cod_ativ }}">{{ $a->descricao }}</option>
                                   @endforeach
                                 </select>
                               </div>
                               <!-- end col -->
                             </div>
                             <!-- end row -->
                           </div>
                           <!-- end  -->

                           <div id="ativimport5" name="ativimport5" style="display: none;">
                             <br><br>
                             <div class="row">
                               <div class="col-md-12">
                                 <select class="form-control select2 select2-hidden-accessible" id="atividade5" style="width: 100%;" tabindex="-1" aria-hidden="true" name="importancia[]" onChange="mostraativ6()">
                                   <option value="null">Selecione as atividades da propriedade</option>
                                   @foreach($atividades as $a)
                                     <option value="{{ $a->cod_ativ }}">{{ $a->descricao }}</option>
                                   @endforeach
                                 </select>
                               </div>
                               <!-- end col -->
                             </div>
                             <!-- end row -->
                           </div>
                           <!-- end  -->

                           <div class="row">
                             <div class="col-md-6">
                             </div>
                             <!-- end col -->
                             <div class="col-md-6">
                               <span class="pull-right"><i class="fa fa-chevron-down" style="color: #3c8dbc;"></i> Menor importancia</span>
                             </div>
                             <!-- end col -->
                           </div>
                           <!-- end row -->
                           <br>
                         </div>
                         <!-- end box-body-->
                      </div>
                      <!-- end box -->
                    </div>
                  </div>
                  <!-- end row -->
                </div>
                <!-- end tab_3  -->

                <!-- inicio tab_4  -->
                <div class="tab-pane" id="tab_4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="box box-primary" style="background-color: #f2f2f2;">
                       <div class="box-header with-border">
                       </div>
                         <div class="box-body">
                           <label>4. Ano em que iniciou</label>
                           <div class="row">
                             <div class="col-md-6">
                               <span>Na Olericultura</span>
                               <input type="text" class="form-control" name="ano_iniciou_oleri" value="" placeholder="ex: 2001" onkeyup="num(this, num3)" maxlength="4"/>
                             </div>
                             <!-- end col -->
                             <div class="col-md-6">
                               <span>Na fruticultura</span>
                               <input type="text" class="form-control" name="ano_iniciou_fruti" value="" placeholder="ex: 2002" onkeyup="num(this, num3)" maxlength="4" />
                             </div>
                             <!-- end col -->
                           </div>
                           <!-- end row -->
                         </div>
                         <!-- end box-body -->
                         <br>
                      </div>
                      <!-- end box-primary -->
                    </div>
                    <!-- end col -->
                  </div>
                  <!-- end row-->

                  <div class="row">
                    <div class="col-md-12">
                      <div class="box box-primary" style="background-color: #f2f2f2;">
                       <div class="box-header with-border">
                       </div>
                         <div class="box-body">
                           <div class="row">
                             <div class="col-md-6">
                               <label>5. Quanto a fruticultura altera a renda total da propriedade (0 a 100%)?</label>
                               <select class="form-control select2 select2-hidden-accessible" name="percent_fruti_renda" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                 <option value="null">Selecione o percentual</option>
                                 <option value="0">Nenhum</option>
                                 <option value="11">Até 20%</option>
                                 <option value="21">De 20 a 40%</option>
                                 <option value="41">De 40 a 60%</option>
                                 <option value="61">De 60 a 80%</option>
                                 <option value="81">Mais de 80%</option>
                               </select>
                             </div>
                             <!-- end col -->
                             <div class="col-md-6">
                               <label>6. Quanto a olericultura altera a renda total da propriedade (0 a 100%)?</label>
                               <select class="form-control select2 select2-hidden-accessible" name="percent_oleri_renda" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                 <option value="null">Selecione o percentual</option>
                                 <option value="0">Nenhum</option>
                                 <option value="11">Até 20%</option>
                                 <option value="21">De 20 a 40%</option>
                                 <option value="41">De 40 a 60%</option>
                                 <option value="61">De 60 a 80%</option>
                                 <option value="81">Mais de 80%</option>
                               </select>
                             </div>
                             <!-- end col -->
                           </div>
                           <!-- end row -->
                         </div>
                         <!-- end box-body -->
                         <br>
                      </div>
                      <!-- end box-primary -->
                    </div>
                    <!-- end col -->
                  </div>
                  <!-- end row-->

                  <div class="row">
                    <div class="col-md-12">
                      <div class="box box-primary" style="background-color: #f2f2f2;">
                       <div class="box-header with-border">
                       </div>
                         <div class="box-body">
                           <div class="row">
                             <div class="col-md-12">
                               <label>7. Quais foram as motivações iniciais para atuar na Fruticultura e/ou Olericultura?</label>
                               <select class="form-control select2 select2-hidden-accessible" name="motivacoes[]" multiple="multiple" data-placeholder="Selecione" style="width: 100%;" tabindex="-1" aria-hidden="true" id="teste" onchange="mostraOutros()">
                                 <<option value="null">Selecione as motivações</option>
                                 @foreach($motivacoes as $m)
                                   <option value="{{ $m->cod_motiv }}">{{ $m->nome_motivacao }}</option>
                                 @endforeach
                               </select>
                              <br><br>
                              <span>Outros quais?</span>
                              <input type="text" class="form-control" name="obs7" value="" />
                             </div>
                             <!-- end col -->
                           </div>
                           <!-- end row -->
                         </div>
                         <!-- end box-body -->
                         <br>
                      </div>
                      <!-- end box-primary -->
                    </div>
                    <!-- end col -->
                  </div>
                  <!-- end row-->

                  <div class="row">
                    <div class="col-md-12">
                      <div class="box box-primary" style="background-color: #f2f2f2;">
                       <div class="box-header with-border">
                       </div>
                         <div class="box-body">
                           <div class="row">
                             <div class="col-md-9">
                               <label>8. Qual é a principal referencia no incentivo e apoio para exercer a atividade(numerar em ordem de importancia)?</label>
                             </div>
                             <!-- end col -->
                             <div class="col-md-3">
                               <span class="pull-right"><i class="fa fa-chevron-up" style="color: #3c8dbc;"></i> Maior importancia</span>
                             </div>
                             <!-- end col -->
                           </div>
                           <!-- end row -->

                           <div class="row">
                             <div class="col-md-12">
                               <select class="form-control select2 select2-hidden-accessible" id="motivacao1" style="width: 100%;" tabindex="-1" aria-hidden="true" name="incentivo[]" onChange="mostramotiv2()">
                                 <option value="null">Selecione o incentivo</option>
                                 @foreach($apoios as $ap)
                                   <option value="{{ $ap->cod_apoio }}">{{ $ap->tipo_apoio }}</option>
                                 @endforeach
                               </select>
                             </div>
                             <!-- end col -->
                           </div>
                           <!-- end row -->

                           <div id="motiv2" style="display: none;">
                             <br><br>
                             <div class="row">
                               <div class="col-md-12">
                                 <select class="form-control select2 select2-hidden-accessible" id="motivacao2" style="width: 100%;" tabindex="-1" aria-hidden="true" name="incentivo[]" onChange="mostramotiv3()">
                                   <option value="null">Selecione o incentivo</option>
                                   @foreach($apoios as $ap)
                                     <option value="{{ $ap->cod_apoio }}">{{ $ap->tipo_apoio }}</option>
                                   @endforeach
                                 </select>
                               </div>
                               <!-- end col -->
                             </div>
                             <!-- end row -->
                           </div>
                           <!-- end  -->

                           <div id="motiv3" style="display: none;">
                             <br><br>
                             <div class="row">
                               <div class="col-md-12">
                                 <select class="form-control select2 select2-hidden-accessible" id="motivacao3" style="width: 100%;" tabindex="-1" aria-hidden="true" name="incentivo[]" onChange="mostramotiv4()">
                                   <option value="null">Selecione o incentivo</option>
                                   @foreach($apoios as $ap)
                                     <option value="{{ $ap->cod_apoio }}">{{ $ap->tipo_apoio }}</option>
                                   @endforeach
                                 </select>
                               </div>
                               <!-- end col -->
                             </div>
                             <!-- end row -->
                           </div>
                           <!-- end  -->

                           <div id="motiv4" style="display: none;">
                             <br><br>
                             <div class="row">
                               <div class="col-md-12">
                                 <select class="form-control select2 select2-hidden-accessible" id="motivacao4" style="width: 100%;" tabindex="-1" aria-hidden="true" name="incentivo[]" onChange="mostramotiv5()">
                                   <option value="null">Selecione o incentivo</option>
                                   @foreach($apoios as $ap)
                                     <option value="{{ $ap->cod_apoio }}">{{ $ap->tipo_apoio }}</option>
                                   @endforeach
                                 </select>
                               </div>
                               <!-- end col -->
                             </div>
                             <!-- end row -->
                           </div>
                           <!-- end  -->

                           <div id="motiv5" style="display: none;">
                             <br><br>
                             <div class="row">
                               <div class="col-md-12">
                                 <select class="form-control select2 select2-hidden-accessible" id="motivacao5" style="width: 100%;" tabindex="-1" aria-hidden="true" name="incentivo[]" onChange="mostramotiv6()">
                                   <option value="null">Selecione o incentivo</option>
                                   @foreach($apoios as $ap)
                                     <option value="{{ $ap->cod_apoio }}">{{ $ap->tipo_apoio }}</option>
                                   @endforeach
                                 </select>
                               </div>
                               <!-- end col -->
                             </div>
                             <!-- end row -->
                           </div>
                           <!-- end  -->

                           <div id="motiv6" style="display: none;">
                             <br><br>
                             <div class="row">
                               <div class="col-md-12">
                                 <select class="form-control select2 select2-hidden-accessible" id="motivacao6" style="width: 100%;" tabindex="-1" aria-hidden="true" name="incentivo[]" onChange="mostramotiv7()">
                                   <option value="null">Selecione o incentivo</option>
                                   @foreach($apoios as $ap)
                                     <option value="{{ $ap->cod_apoio }}">{{ $ap->tipo_apoio }}</option>
                                   @endforeach
                                 </select>
                               </div>
                               <!-- end col -->
                             </div>
                             <!-- end row -->
                           </div>
                           <!-- end  -->

                           <div id="motiv7" style="display: none;">
                             <br><br>
                             <div class="row">
                               <div class="col-md-12">
                                 <select class="form-control select2 select2-hidden-accessible" id="motivacao7" style="width: 100%;" tabindex="-1" aria-hidden="true" name="incentivo[]" onChange="mostramotiv8()">
                                   <option value="null">Selecione o incentivo</option>
                                   @foreach($apoios as $ap)
                                     <option value="{{ $ap->cod_apoio }}">{{ $ap->tipo_apoio }}</option>
                                   @endforeach
                                 </select>
                               </div>
                               <!-- end col -->
                             </div>
                             <!-- end row -->
                           </div>
                           <!-- end  -->

                           <div id="motiv8" style="display: none;">
                             <br><br>
                             <div class="row">
                               <div class="col-md-12">
                                 <select class="form-control select2 select2-hidden-accessible" id="motivacao8" style="width: 100%;" tabindex="-1" aria-hidden="true" name="incentivo[]" onChange="mostramotiv9()">
                                   <option value="null">Selecione o incentivo</option>
                                   @foreach($apoios as $ap)
                                     <option value="{{ $ap->cod_apoio }}">{{ $ap->tipo_apoio }}</option>
                                   @endforeach
                                 </select>
                               </div>
                               <!-- end col -->
                             </div>
                             <!-- end row -->
                           </div>
                           <!-- end  -->

                           <div id="motiv9" style="display: none;">
                             <br><br>
                             <div class="row">
                               <div class="col-md-12">
                                 <select class="form-control select2 select2-hidden-accessible" id="motivacao9" style="width: 100%;" tabindex="-1" aria-hidden="true" name="incentivo[]" onChange="mostramotiv10()">
                                   <option value="null">Selecione o incentivo</option>
                                   @foreach($apoios as $ap)
                                     <option value="{{ $ap->cod_apoio }}">{{ $ap->tipo_apoio }}</option>
                                   @endforeach
                                 </select>
                               </div>
                               <!-- end col -->
                             </div>
                             <!-- end row -->
                           </div>
                           <!-- end  -->

                           <div class="row">
                             <div class="col-md-6">
                             </div>
                             <!-- end col -->
                             <div class="col-md-6">
                               <span class="pull-right">
                                 <i class="fa fa-chevron-down" style="color: #3c8dbc;"></i> Menor importancia
                               </span>
                             </div>
                             <!-- end col -->
                           </div>
                           <!-- end row -->
                           <div class="row">
                             <div class="col-md-12">
                               <span>Outros quais?</span>
                               <input type="text" class="form-control" name="obs8" value=""/>
                             </div>
                             <!-- end col -->
                           </div>
                           <!-- end row -->
                           <br>
                         </div>
                         <!-- end box-body -->
                         <br>
                      </div>
                      <!-- end box-primary -->
                    </div>
                    <!-- end col -->
                  </div>
                  <!-- end row-->
                </div>
                <!-- end tab_4  -->

                <!-- inicio tab_5  -->
                <div class="tab-pane" id="tab_5">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="box box-primary" style="background-color: #f2f2f2;">
                       <div class="box-header with-border">
                       </div>
                         <div class="box-body">
                           <div class="row">
                             <div class="col-md-3">
                               <label>9.A. Em relação ao cultivo:</label>
                               <select class="form-control select2 select2-hidden-accessible" name="cultivo[]" multiple="multiple" data-placeholder="Selecione" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <option value="null">Selecione</option>
                                  @foreach($cultivos as $c)
                                    <option value="{{ $c->cod_cultivo }}">{{ $c->nome_cult }}</option>
                                  @endforeach
                               </select>
                              <br>
                             </div>
                             <!-- end col -->
                             <div class="col-md-3">
                               <label>9.B. Tipo de pulverizador:</label>
                               <select class="form-control select2 select2-hidden-accessible" name="pulverizador[]" multiple="multiple" data-placeholder="Selecione" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <option value="null">Selecione</option>
                                  @foreach($pulverizadores as $p)
                                    <option value="{{ $p->cod_pulv }}">{{ $p->tipo_pulv }}</option>
                                  @endforeach
                               </select>
                               <br>
                             </div>
                             <!-- end col -->
                             <div class="col-md-3">
                               <label>9.C. Tração:</label>
                               <select class="form-control select2 select2-hidden-accessible" name="tracao[]" multiple="multiple" data-placeholder="Selecione" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <option value="null">Selecione</option>
                                  @foreach($tracoes as $t)
                                    <option value="{{ $t->cod_tracao }}">{{ $t->nome_tracao }}</option>
                                  @endforeach
                               </select>
                               <br>
                             </div>
                             <!-- end col -->
                             <div class="col-md-3">
                               <label>9.D. Irrigação:</label>
                               <select class="form-control select2 select2-hidden-accessible" name="irrigacao[]" multiple="multiple" data-placeholder="Selecione" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <option value="null">Selecione</option>
                                  @foreach($irrigacoes as $i)
                                    <option value="{{ $i->cod_irrigacao }}">{{ $i->tipo_irrigacao }}</option>
                                  @endforeach
                               </select>
                              <br>
                             </div>
                             <!-- end col -->
                           </div>
                           <!-- end row -->
                           <br><br>
                           <div class="row">
                             <div class="col-md-3">
                               <label>9.E. Adubação:</label>
                               <select class="form-control select2 select2-hidden-accessible" name="adubo[]" multiple="multiple" data-placeholder="Selecione" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <option value="null">Selecione</option>
                                  @foreach($adubos as $adu)
                                    <option value="{{ $adu->cod_adubo }}">{{ $adu->nome_adubo }}</option>
                                  @endforeach
                              </select>
                              <br>
                             </div>
                             <!-- end col -->
                             <div class="col-md-3">
                               <label>9.F. Plasticultura:</label>
                               <select class="form-control select2 select2-hidden-accessible" name="plasticultura[]" multiple="multiple" data-placeholder="Selecione" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <option value="null">Selecione</option>
                                  @foreach($plasticulturas as $pla)
                                    <option value="{{ $pla->cod_plastic }}">{{ $pla->tipo_plastic }}</option>
                                  @endforeach
                               </select>
                               <br>
                             </div>
                             <!-- end col -->
                             <div class="col-md-3">
                               <label>9.G. Fonte de água:</label>
                               <select class="form-control select2 select2-hidden-accessible" name="agua[]" multiple="multiple" data-placeholder="Selecione" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <option value="null">Selecione</option>
                                  @foreach($agua as $ag)
                                    <option value="{{ $ag->cod_agua }}">{{ $ag->tipo_agua }}</option>
                                  @endforeach
                               </select>
                               <br>
                             </div>
                             <!-- end col -->
                             <div class="col-md-3">
                               <label>9.H. Controle de pragas e doencas:</label>
                               <select class="form-control select2 select2-hidden-accessible" name="pragas_doencas[]" multiple="multiple" data-placeholder="Selecione" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <option value="null">Selecione</option>
                                  <option value="quimico">Químico</option>
                                  <option value="integrado">Integrado</option>
                                  <option value="organico">Orgânico</option>
                               </select>
                              <br>
                             </div>
                             <!-- end col -->
                           </div>
                          <!-- end row-->
                           <div class="row">
                             <div class="col-md-3">
                             </div>
                             <!-- end col -->
                             <div class="col-md-3">
                               <input type="text" class="form-control" name="OutrosPlasticultura" placeholder="Outras plasticulturas"/>
                             </div>
                             <!-- end col -->
                             <div class="col-md-3">
                             </div>
                             <!-- end col -->
                             <div class="col-md-3">
                             </div>
                             <!-- end col -->
                           </div>
                            <!-- end row-->
                           <br><br>
                           <div class="row">
                             <div class="col-md-6">
                               <label>9.I. Atribua de 1 a 10 para sua produção (1 + convencional, 10 + orgânica):</label>
                               <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="grau_conv_organica">
                                 <option value="null">Selecione</option>
                                 <option value="1">1</option>
                                 <option value="2">2</option>
                                 <option value="3">3</option>
                                 <option value="4">4</option>
                                 <option value="5">5</option>
                                 <option value="6">6</option>
                                 <option value="7">7</option>
                                 <option value="8">8</option>
                                 <option value="9">9</option>
                                 <option value="10">10</option>
                               </select>
                             </div>
                             <!-- end col -->
                             <div class="col-md-6">
                               <label>10. Quais os principais problemas com a atividade?</label>
                               <select class="form-control select2 select2-hidden-accessible" name="problemas[]" multiple="multiple" data-placeholder="Selecione" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                 <option value="null">Selecione</option>
                                 @foreach($problemas as $pro)
                                   <option value="{{ $pro->cod_problema }}">{{ $pro->tipo_problema }}</option>
                                 @endforeach
                               </select>
                              <br>
                             </div>
                             <!-- end col -->
                           </div>
                           <!-- end row-->
                           <div class="row">
                             <div class="col-md-6">
                             </div>
                             <!-- end col -->
                             <div class="col-md-6">
                               <input type="text" class="form-control" name="OutrosProblemas" placeholder="Outros problemas" />
                             </div>
                             <!-- end col -->
                           </div>
                           <!-- end row -->
                         </div>
                         <!-- end box-body -->
                         <br>
                      </div>
                      <!-- end box-primary -->
                    </div>
                    <!-- end col -->
                  </div>
                    <!-- end row-->
                </div>
                <!-- end tab_5  -->

                <!-- inicio tab_6  -->
                <div class="tab-pane" id="tab_6">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="box box-primary" style="background-color: #f2f2f2;">
                       <div class="box-header with-border">
                       </div>
                         <div class="box-body">
                           <label>Tabela dos tipos de mercados que se destinam as produções</label>
                              <div class="table table-responsive">
                               <table class="table table-hover-responsive" id="minhaTabela3" style="background-color: #f4f4f4">
                                 <thead>
                                   <tr style="background-color: #333">
                                     <th class="text-center" style="color: white">Tipo</th>
                                     <th class="text-center" style="color: white">Tipo de</br>fruta/</br>olerícola</th>
                                     <th class="text-center" style="color: white">Tipo de</br>cultivar</th>
                                     <th class="text-center" style="color: white">Ano de</br>implan-</br>tação</br>(p/ frutas)</th>
                                     <th class="text-center" style="color: white" colspan="3">Área plantada</font></th>
                                     <th class="text-center" style="color: white">Nº </br>safras</br>/ano</th>
                                     <th class="text-center" style="color: white">Quant.</br> produzida</br>/ano</th>
                                     <th class="text-center" style="color: white">Unidade</th>
                                     <th class="text-center" style="color: white">A</br>Produçao</br>é</br>suficiente</th>
                                     <th class="text-center" style="color: white">Intenção</br>de ampliar</br>área desse</br>cultivo</th>
                                     <th class="text-center" style="color: white"></th>
                                   </tr>
                                   <tr style="background-color: #333">
                                     <th></th>
                                     <th></th>
                                     <th></th>
                                     <th></th>
                                     <th class="text-center" style="color: white">nº</br>plantas</th>
                                     <th class="text-center" style="color: white">ha ou</br> m linear</th>
                                     <th class="text-center" style="color: white">unidade</th>
                                     <th></th>
                                     <th></th>
                                     <th></th>
                                     <th></th>
                                     <th></th>
                                     <th></th>
                                   </tr>
                                 </thead>
                                 <!-- end thead -->
                                 <tbody>
                                   <td>
                                     <select name="id_tipo[]" id="1" class="ajax select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                       <option value="null">Selecione</option>
                                       <option value="1">Fruticultura</option>
                                       <option value="2">Olericultura</option>
                                     </select>
                                 </td>
                                 <td>
                                   <select name="id_cultura[]" class="select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" id="selecionecultura1">
                                       <option value="null">Selecione</option>
                                   </select>
                                 </td>
                                 <td>
                                   <select name="id_cultivar[]" class="select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" id="selecionecultivar1">
                                       <option value="null">Selecione</option>
                                   </select>
                                 </td>
                                 <td>
                                   <input type="text" class="form-control" name="ano_implant[]" maxlength="4" placeholder="2017" style="width:55px;" onkeyup="num(this, num3)">
                                 </td>
                                 <td>
                                   <input type="text" class="form-control" name="num_plantas[]" maxlength="6" placeholder="0" style="width:55px;" onkeyup="num(this, num3)">
                                 </td>
                                 <td>
                                   <input type="text" class="form-control" name="area_ha_m[]"  maxlength="8" placeholder="0" style="width:55px;" onkeyup="numPonto(this, num2)">
                                 </td>
                                 <td>
                                   <select name="unidade[]" class="select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" >
                                       <option value="null">Selecione</option>
                                       <option value="ha">ha</option>
                                       <option value="m">m</option>
                                       <option value="m²">m²</option>
                                   </select>
                                 </td>
                                 <td>
                                   <input type="text" class="form-control" name="num_safras[]" maxlength="4" value="" placeholder="0" style="width:55px;" onkeyup="num(this, num3)">
                                 </td>
                                 <td>
                                   <input type="text" class="form-control" name="quant_prod[]" maxlength="6" value="" placeholder="0" style="width:55px;" onkeyup="numPonto(this, num2)">
                                 </td>
                                 <td>
                                   <select name="unidade_quant_prod[]" class="select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                       <option value="null">Selecione</option>
                                       <option value="kilos">kilos</option>
                                       <option value="toneladas">toneladas</option>
                                       <option value="maços">maços</option>
                                       <option value="pes">pés</option>
                                       <option value="litros">litros</option>
                                       <option value="unidades">unidades</option>
                                       <option value="caixas">caixas</option>
                                       <option value="barris">barris</option>
                                   </select>
                                 </td>
                                 <td>
                                   <select name="producao_suficiente[]" class="select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                       <option value="null">Selecione</option>
                                       <option value="sim">Sim</option>
                                       <option value="nao">Não</option>
                                   </select>
                                 </td>
                                 <td>
                                   <select name="intencao_ampliar[]" class="select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                       <option value = "NULL">Selecione</option>
                                       <option value = "sim">Sim</option>
                                       <option value = "nao">Não</option>
                                   </select>
                                 </td>
                                 <td>
                                   <input type="button" class="form-control btn btn-danger btn-sm" value="X">
                                 </td>
                               </tr>
                             </table>
                             <!-- end table -->
                           <input type="hidden" id ="cont" value="1">
                           <button type="button" class="btn btn-info form-control" onclick="inserirLinhaTabela2()">Adicionar + 1 produção</button>
                           </div>
                           <!-- end table-responsive -->
                          <input type="hidden" id ="cont2" value="1">
                          <br>
                         </div>
                         <!-- end box-body -->
                       </div>
                       <!-- end box-primary -->
                     </div>
                     <!-- end col -->
                   </div>
                   <!-- end row -->
                </div>
                <!-- end tab_6  -->


                <!-- inicio tab_7  -->
                <div class="tab-pane" id="tab_7">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="box box-primary" style="background-color: #f2f2f2;">
                       <div class="box-header with-border">
                       </div>
                         <div class="box-body">
                           <div class="row">
                             <div class="col-md-12">
                               <label>11. Possui intenção de ampliar a área com que tipo de cultivo que nao produz na atualidade?</label>
                               <select class="form-control select2 select2-hidden-accessible" name="ampliacao[]" multiple="multiple" data-placeholder="Selecione" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                 @foreach ($culturas as $c)
                                   <option value="{{ $c->cod_cultura }}">{{ $c->nome_cultura }}</option>
                                 @endforeach
                               </select>
                             </div>
                             <!-- end col -->
                           </div>
                           <!-- end row -->
                           <br>
                        </div>
                        <!-- end box-body -->
                      </div>
                      <!-- end box-primary -->
                    </div>
                    <!-- end col -->
                  </div>
                  <!-- end row -->

                      <div class="row">
                        <div class="col-md-12">
                          <div class="box box-primary" style="background-color: #f2f2f2;">
                           <div class="box-header with-border">
                           </div>
                             <div class="box-body">
                               <div class="row">
                                 <div class="col-md-12">
                                   <div class="table table-responsive">
                                     <table class="table table-bordered" style="background-color: #f4f4f4">
                                        <tbody>
                                          <tr style="background-color: #333;">
                                            <th class="text-center" style="color: white;">Tipo de mercado</th>
                                            <th colspan="2" class="text-center" style="color: white;">Percentual em cada tipo de mercado (%)</th>
                                          </tr>
                                          <tr style="background-color: #333;">
                                            <th></th>
                                            <th class="text-center" style="color: white;">Frutas</th>
                                            <th class="text-center" style="color: white;">Hortigranjeiros</th>
                                          </tr>
                                          <tr>
                                            <td>
                                                <span>1. Feira livre</span>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="ex: 50.00%" name="feira_livre_fruti" onkeyup="campopercent(this, valor)"/>
                                            </td>
                                            <td>
                                              <input type="text" class="form-control" placeholder="ex: 50.00%" name="feira_livre_horti" onkeyup="campopercent(this, valor)"/>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>
                                                <span>2. Cooperativa</span>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="ex: 50.00%" name="cooperativa_fruti" onkeyup="campopercent(this, valor)"/>
                                            </td>
                                            <td>
                                              <input type="text" class="form-control" placeholder="ex: 50.00%" name="cooperativa_horti" onkeyup="campopercent(this, valor)"/>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>
                                                <span>3. Mercado Institucional da Alimentação Escolar</span>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="ex: 50.00%" name="mercado_escolar_fruti" onkeyup="campopercent(this, valor)"/>
                                            </td>
                                            <td>
                                              <input type="text" class="form-control" placeholder="ex: 50.00%" name="mercado_escolar_horti" onkeyup="campopercent(this, valor)"/>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>
                                                <span>4. Mercado Institucional do PAA </span>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="ex: 50.00%" name="mercado_PAA_fruti" onkeyup="campopercent(this, valor)"/>
                                            </td>
                                            <td>
                                              <input type="text" class="form-control" placeholder="ex: 50.00%" name="mercado_PAA_horti" onkeyup="campopercent(this, valor)"/>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>
                                                <span>5. Comercialização na propriedade </span>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="ex: 50.00%" name="comercio_prop_fruti" onkeyup="campopercent(this, valor)"/>
                                            </td>
                                            <td>
                                              <input type="text" class="form-control" placeholder="ex: 50.00%" name="comercio_prop_horti" onkeyup="campopercent(this, valor)"/>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>
                                                <span>6. Vendas com entregas em domicílio</span>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="ex: 50.00%" name="vendas_domicilio_fruti" onkeyup="campopercent(this, valor)"/>
                                            </td>
                                            <td>
                                              <input type="text" class="form-control" placeholder="ex: 50.00%" name="vendas_domicilio_horti" onkeyup="campopercent(this, valor)"/>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>
                                                <span>7. Pequeno e médio comercio </span>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="ex: 50.00%" name="comercio_medio_fruti" onkeyup="campopercent(this, valor)"/>
                                            </td>
                                            <td>
                                              <input type="text" class="form-control" placeholder="ex: 50.00%" name="comercio_medio_horti" onkeyup="campopercent(this, valor)"/>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>
                                                <span>8. Redes de supermercados </span>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="ex: 50.00%" name="supermercados_fruti" onkeyup="campopercent(this, valor)"/>
                                            </td>
                                            <td>
                                              <input type="text" class="form-control" placeholder="ex: 50.00%" name="supermercados_horti" onkeyup="campopercent(this, valor)"/>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>
                                                <span>9. Restaurante </span>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="ex: 50.00%" name="restaurantes_fruti" onkeyup="campopercent(this, valor)"/>
                                            </td>
                                            <td>
                                              <input type="text" class="form-control" placeholder="ex: 50.00%" name="restaurantes_horti" onkeyup="campopercent(this, valor)"/>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>
                                                <span>10. Padaria e Sorveteria </span>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="ex: 50.00%" name="padaria_fruti" onkeyup="campopercent(this, valor)"/>
                                            </td>
                                            <td>
                                              <input type="text" class="form-control" placeholder="ex: 50.00%" name="padaria_horti" onkeyup="campopercent(this, valor)"/>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>
                                              <span>11. Agroindustrializa na própria propriedade </span>
                                            </td>
                                            <td>
                                              <input type="text" class="form-control" placeholder="ex: 50.00%" name="na_propriedade_fruti" onkeyup="campopercent(this, valor)"/>
                                            </td>
                                            <td>
                                              <input type="text" class="form-control" placeholder="ex: 50.00%" name="na_propriedade_horti" onkeyup="campopercent(this, valor)"/>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>
                                              <span>12. Comercializa para agroindústrias </span>
                                            </td>
                                            <td>
                                              <input type="text" class="form-control" placeholder="ex: 50.00%" name="agroindustrias_fruti" onkeyup="campopercent(this, valor)"/>
                                            </td>
                                            <td>
                                              <input type="text" class="form-control" placeholder="ex: 50.00%" name="agroindustrias_horti" onkeyup="campopercent(this, valor)"/>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>
                                              <span>13. Ponto de venda na estrada </span>
                                            </td>
                                            <td>
                                              <input type="text" class="form-control" placeholder="ex: 50.00%" name="na_estrada_fruti" onkeyup="campopercent(this, valor)"/>
                                            </td>
                                            <td>
                                              <input type="text" class="form-control" placeholder="ex: 50.00%" name="na_estrada_horti" onkeyup="campopercent(this, valor)"/>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>
                                                <span>14. Outros </span>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="ex: 50.00%" name="outros_fruti" onkeyup="campopercent(this, valor)"/>
                                            </td>
                                            <td>
                                              <input type="text" class="form-control" placeholder="ex: 50.00%" name="outros_horti" onkeyup="campopercent(this, valor)"/>
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                     <!-- end table -->
                                   </div>
                                   <!-- end table-responsive -->
                                 </div>
                                 <!-- end col -->
                               </div>
                               <!-- end row -->
                               <div class="row">
                                 <div class="col-md-12">
                                   <label>Observação outros</label>
                                    <input type="text" class="form-control" name="obs_mercados"/>
                                 </div>
                               </div>

                               <br/>
                                <div class="row">
                                 <div class="col-md-12">
                                   <button type="submit" class="btn btn-success form-control">Cadastrar Formulário
                                     <i class="fa fa-check"></i>
                                   </button>
                                 </div>
                               </div>
                               <!-- end row -->
                             </div>
                             <!-- end box-body -->
                          </div>
                        <!-- end box-primary -->
                      </div>
                      <!-- end col -->
                  </div>
                  <!-- end row -->
                </div>
                <!-- end tab 7 -->


              </form>
              <!-- end form -->

              </div>
              <!-- end tab-content -->
            </form>
            <!-- end form-->
            </div>
            <!-- end nav-tabs -->
        </div>
       <!-- end col -->
    </div>
    <!-- end row -->

    <!-- botoes voltar e continuar -->
    <div class="row">
      <div class="col-md-2">
        <div id="buttonPrev" style="display: none;">
          <a href="#tab_1" class="form-control btn btn-danger" id="prevTab">
            <i class="fa fa-arrow-left"></i> Voltar
          </a>
        </div>
      </div>
      <!-- end col -->
      <div class="col-md-2">
      </div>
      <!-- end col -->
      <div class="col-md-2">
      </div>
      <!-- end col -->
      <div class="col-md-2">
      </div>
      <!-- end col -->
      <div class="col-md-2">
      </div>
      <!-- end col -->
      <div class="col-md-2">
        <div id="buttonNext" style="display: block;">
          <a href="#tab_2" class="form-control btn btn-success" id="nextTab">Continuar
            <i class="fa fa-arrow-right"></i>
          </a>
        </div>
      </div>
      <!-- end col -->
    </div>
    <!-- end row botoes -->

    <!-- modal -->
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-map"></i> Propriedade no google maps</h4>
              </div>
              <!-- end modal-header -->
                <div class="modal-body">
                  <div class="box box-info">
                      <div class="box-header with-border">
                          <h1 class="box-title"><i class="fa fa-map-marker"></i> Localização <small>da propriedade</small></h1>
                          <br><br>
                          <div id="map"></div>
                      </div>
                      <!-- end box-header -->
                  </div>
                  <!-- end box-info -->
                </div>
                <!-- end modal-body -->
                <div class="modal-footer">
                    <button type="button" class="form-control btn btn-success" data-dismiss="modal">Fechar <i class="fa fa-check"></i></button>
                </div>
                <!-- end modal-footer -->
            </div>
            <!-- end modal-content -->
          </div>
          <!-- end modal-dialog -->
      </div>
      <!-- end modal -->


       <script src="{{ asset("/bower_components/adminLTE/plugins/jQuery/jquery-2.2.3.min.js") }}"></script>



        <!-- SELECT COM BUSCA -->
        <script>
          $(function () {
            $(".select2").select2();
          });
        </script>
        <!-- END SELECT COM BUSCA-->

        <!-- BOTAO AVANCAR ABA -->
        <script>
          $('#nextTab').click(function(e){
            e.preventDefault();
            $('.nav-tabs > .active').next('li').find('a').trigger('click');

            var barra = document.getElementById('progress-bar').style.width;
            var percentual = parseInt(barra) + parseInt(17);

            if(percentual >= 100){
              document.getElementById('buttonNext').style.display = "none";
              document.getElementById('buttonPrev').style.display = "block";
            }
            else{
              document.getElementById('buttonNext').style.display = "block";
            }

            document.getElementById('buttonPrev').style.display = "block";
            document.getElementById('progress-bar').style.width = percentual + '%';
            document.getElementById('li').style.color = "green";
          });
        </script>
        <!-- END BOTAO AVANCAR ABA -->

        <!-- BOTAO VOLTAR ABA -->
        <script>
          $('#prevTab').click(function(e){
            e.preventDefault();
            $('.nav-tabs > .active').prev('li').find('a').trigger('click');

            var barra = document.getElementById('progress-bar').style.width;
            var percentual = parseInt(barra) - parseInt(17);

            if(percentual == 0){
              document.getElementById('buttonPrev').style.display = "none";
              document.getElementById('buttonNext').style.display = "block";
            }
            else {
              document.getElementById('buttonNext').style.display = "block";
              document.getElementById('buttonPrev').style.display = "block";
            }

            document.getElementById('progress-bar').style.width = percentual + '%';
            document.getElementById('li').style.color = "green";
          });
        </script>
        <!-- END BOTAO AVANCAR ABA -->

        <script>
        $('a[data-toggle="tab"]')
           .on('click', function() {
           $href = $(this).attr('href')
           $active_tab = $href.replace('#tab-', '');

           if($href == '#tab_1'){
             document.getElementById('progress-bar').style.width = 0 + '%';
             document.getElementById('buttonNext').style.display = "block";
             document.getElementById('buttonPrev').style.display = "none";
           }

           if($href == '#tab_2'){
             document.getElementById('progress-bar').style.width = 17 + '%';
             document.getElementById('buttonNext').style.display = "block";
             document.getElementById('buttonPrev').style.display = "block";
           }

           if($href == '#tab_3'){
             document.getElementById('progress-bar').style.width = 34 + '%';
             document.getElementById('buttonNext').style.display = "block";
             document.getElementById('buttonPrev').style.display = "block";
           }

           if($href == '#tab_4'){
             document.getElementById('progress-bar').style.width = 51 + '%';
             document.getElementById('buttonNext').style.display = "block";
             document.getElementById('buttonPrev').style.display = "block";
           }

           if($href == '#tab_5'){
             document.getElementById('progress-bar').style.width = 68 + '%';
             document.getElementById('buttonNext').style.display = "block";
             document.getElementById('buttonPrev').style.display = "block";
           }

           if($href == '#tab_6'){
             document.getElementById('progress-bar').style.width = 85 + '%';
             document.getElementById('buttonNext').style.display = "block";
             document.getElementById('buttonPrev').style.display = "block";
           }

           if($href == '#tab_7'){
             document.getElementById('progress-bar').style.width = 102 + '%';
             document.getElementById('buttonNext').style.display = "none";
             document.getElementById('buttonPrev').style.display = "block";
           }

           $url_params.set('tab', $active_tab);
           updateURL($url_params.toString());
        });
        </script>

         <script type="text/javascript">
              $(document).ready(function(){
                  var input =  '<br><select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">'+
                                '<option>Selecione as atividades da propriedade</option>'+
                                '@foreach($atividades as $a)'+
                                  '<option value="{{ $a->cod_ativ }}">{{ $a->descricao }}</option>'+
                                '@endforeach'+
                              '</select><br>';
                  $("button[name='add']").click(function( e ){
                      $('#selects_adicionais').append( input );
                      $(".select2").select2();
                  });
              });
          </script>

          <script type="text/javascript">
                $(document).ready(function(){
                    var input =  '<br><select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" >'+
                                  '<option>Selecione as atividades da propriedade</option>'+
                                  '@foreach($atividades as $a)'+
                                    '<option value="{{ $a->cod_ativ }}">{{ $a->descricao }}</option>'+
                                  '@endforeach'+
                                '</select><br>';
                    $("button[name='add']").click(function( e ){
                        $('#selects_adicionais').append( input );
                        $(".select2").select2();
                    });
                });
          </script>

          <script type="text/javascript">
              $(document).ready(function(){
                  var input =  '<br><select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="">'+
                                '<option>Selecione atividades</option>'+
                              '</select><br>';
                  $("button[name='add3']").click(function( e ){
                      $('#selects_adicionais3').append( input );
                      $(".select2").select2();
                  });
              });
          </script>

          <!-- GOOGLE MAPS -->
          <script>
              var center = new google.maps.LatLng(-29.721194, -53.719274);

              function initMap() {
                 var mapDiv = document.getElementById('map');
                 var latitude = document.getElementById('latitude').value;
                 var longitude = document.getElementById('longitude').value;

                 var t1 = document.getElementById('latitude').value.length;
                 var t2 = document.getElementById('longitude').value.length;

                 if( (t1 > 0) && ( t2 > 0) ){
                   var LatLong = new google.maps.LatLng(latitude, longitude);

                   var map = new google.maps.Map(mapDiv, {
                       center: new google.maps.LatLng(latitude, longitude),
                       zoom: 9
                   });

                   var marker = new google.maps.Marker ({
                     position: LatLong,
                     map: map,
                     title: 'Propriedade'
                   });

                   marker.setMap(map);
                 }
                 else{
                   var LatLong = new google.maps.LatLng(-29.72119, -53.719274);

                   var map = new google.maps.Map(mapDiv, {
                       center: new google.maps.LatLng(-29.72119, -53.719274),
                       zoom: 4
                   });
                 }
             }
          </script>
          <!-- END GOOGLE MAPS -->

          <!-- GOOGLE MAPS NO MODAL -->
          <script type="text/javascript">
            function teste2(){
              $('#myModal1').modal({
                }).on('shown.bs.modal', function () {
                  google.maps.event.trigger(map, 'resize');
                  initMap();
                });
            }
          </script>
          <!-- END GOOGLE MAPS NO MODAL -->

          <!-- CHAVE GOOGLE API -->
          <script sync defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQalLzBKBjsXnHcP6ixo87rnHJOv2DaBI&callback=initMap">
          </script>
          <!-- END CHAVE GOOGLE API -->

          <!-- AJAX MUNICIPIO/DISTRITO/LOCALIDADE -->
          <script type="text/javascript">
            $(document).ready(function(){
              $.ajax({
                  url: "/municipio/lista",
                  type: "GET",
                  dataType: "json"
              }).done(function(municipios) {
                    $("#municipios").empty();
                    $("#municipios").append(new Option("Selecione municipio", "null"));
                    $("#distritos").append(new Option("Selecione distrito", "null"));
                    $("#localidades").append(new Option("Selecione localidade", "null"));
                    console.log(municipios);
                    for(x=0; x<municipios.length; x++){
                        $("#municipios").append(new Option(municipios[x].nome_municipio, municipios[x].cod_municipio));
                    }
                    $("#municipios").on("change", function(){
                        $("#distritos").empty();
                        $("#distritos").append(new Option("Selecione distrito", "null"));
                         $.getJSON("/distritos/lista", {cod_municipio:$("#municipios option:selected").val()}, function(distritos){
                            for(x=0; x<distritos.length; x++){
                                console.log(distritos);
                                $("#distritos").append(new Option(distritos[x].nome_distrito, distritos[x].cod_distrito));
                            }
                        })
                        $("#localidades").empty();
                        $("#localidades").append(new Option("Selecione localidade", "null"));
                        $.getJSON("/localidades/lista", {cod_municipio:$("#municipios option:selected").val()}, function(localidades){
                           for(x=0; x<localidades.length; x++){
                               console.log(localidades);
                               $("#localidades").append(new Option(localidades[x].nome_local, localidades[x].cod_local));
                           }
                       })
                    })
              }).fail(function(jqXHR, textStatus ) {
                  console.log("Request failed: " + textStatus);

              }).always(function() {

              });
            })
          </script>
          <!-- END AJAX MUNICIPIO/DISTRITO/LOCALIDADE -->


          <!-- TABELA NUCLEO FAMILIAR -->
          <script language="javascript">
                  // Função responsável por inserir linhas na tabela
                  function inserirLinhaTabela() {

                      var table = document.getElementById("minhaTabela");

                      // Captura a quantidade de linhas já existentes na tabela
                      var numOfRows = table.rows.length;

                      // Captura a quantidade de colunas da última linha da tabela
                      var numOfCols = table.rows[numOfRows-1].cells.length;

                      // Insere uma linha no fim da tabela.
                      var newRow = table.insertRow(numOfRows);

                      var cont = document.getElementById("cont").value;
                      var cont = parseInt(cont) + parseInt(1);
                      // Faz um loop para criar as colunas
                      for (var j = 0; j < numOfCols; j++) {
                          // Insere uma coluna na nova linha
                          newCell = newRow.insertCell(j);
                          // Insere um conteúdo na coluna
                          if(j == 0){
                            var td0 = '<td style="width: 260px;">'+
                                        '<input type="text" class="form-control" name="nome[]" placeholder="ex: nome">'+
                                      '</td>';
                            newCell.innerHTML = td0;
                          }
                          if(j == 1){
                            var td1 = '<td>'+
                                          '<select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="cod_parentesco[]">'+
                                            '<option value="null">Selecione</option>'+
                                            '@foreach($parentescos as $p)'+
                                              '<option value="{{ $p->cod_parentesco }}">{{ $p->parentesco }}</option>'+
                                            '@endforeach'+
                                          '</select>'+
                                        '</td>';
                            newCell.innerHTML = td1;
                          }
                          if(j == 2){
                            var td2 = '<td>'+
                                          '<select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="sexo[]">'+
                                            '<option value="null">Selecione</option>'+
                                            '<option value="M">Masculino</option>'+
                                            '<option value="F">Feminino</option>'+
                                          '</select>'+
                                        '</td>';
                            newCell.innerHTML = td2;
                          }
                          if(j == 3){
                            var td3 = '<td>'+
                                        '<input type="text" class="form-control" name="dt_nasc[]" maxlength = "10"  onkeyup = "barra(this)" placeholder="dd/mm/aaaa" />'+
                                      '</td>';
                            newCell.innerHTML = td3;
                          }
                          if(j == 4){
                            var td4 = '<td>'+
                                          '<select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="cod_escolaridade[]">'+
                                            '<option value="null">Selecione</option>'+
                                            '@foreach($escolaridades as $e)'+
                                              '<option value="{{ $e->cod_escolaridade }}">{{ $e->escolaridade }}</option>'+
                                            '@endforeach'+
                                          '</select>'+
                                        '</td>';
                            newCell.innerHTML = td4;

                          }
                          if(j == 5){
                            var td5 = '<td style="width: 380px;">'+
                                          '<select class="form-control select2 select2-hidden-accessible" multiple="multiple" data-placeholder="Selecione" style="width: 95%;" tabindex="-1" aria-hidden="true" name="cod_ocupacao'+ cont +'[]">'+
                                             '@foreach($ocupacoes as $o)'+
                                               '<option value="{{ $o->cod_ocupacao }}">{{ $o->ocupacao }}</option>'+
                                             '@endforeach'+
                                         '</select>';
                            newCell.innerHTML = td5;
                          }
                      }
                      $(".select2").select2();
                      document.getElementById("cont").value = cont;
                  }
          </script>
          <!-- END TABELA NUCLEO FAMILIAR -->

          <!-- MASCARA TELEFONE -->
          <script type="text/javascript">
           function somentenumero(o,f){
                 v_obj=o
                 v_fun=f
                 setTimeout("execmascara()",1)
             }
             function execmascara(){
                 v_obj.value=v_fun(v_obj.value)
             }
             function numero(v){
                  v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
                  v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos 3 primeiros dígitos
                  v=v.replace(/(\d)(\d{8})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
                  return v;
             }
           </script>
           <!-- END MASCARA TELEFONE -->

           <!-- MASCARA NUM PONTO -->
           <script type="text/javascript">
            function numPonto(o,f){
                  v_obj=o
                  v_fun=f
                  setTimeout("execmascara()",1)
              }
              function execmascara(){
                  v_obj.value=v_fun(v_obj.value)
              }
              function num2(v){
                   v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
                   v=v.replace(/(\d)(\d{2})$/,"$1.$2");    //Coloca hífen entre o quarto e o quinto dígitos
                   return v;
              }
            </script>
            <!-- END MASCARA NUM PONTO -->

            <!-- MASCARA NUM -->
            <script type="text/javascript">
             function num(o,f){
                   v_obj=o
                   v_fun=f
                   setTimeout("execmascara()",1)
               }
               function execmascara(){
                   v_obj.value=v_fun(v_obj.value)
               }
               function num3(v){
                    v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
                    return v;
               }
             </script>
             <!-- END MASCARA NUM-->

             <!-- MASCARA PERCENTUAL -->
             <script> // campo telefone
                function campopercent(o,f){
                      v_obj=o
                      v_fun=f
                      setTimeout("execmascara()",1)
                  }
                  function execmascara(){
                      v_obj.value=v_fun(v_obj.value)
                  }
                  function valor(v){
                        v=v.replace(/\D|,/g,"");             //Remove tudo o que não é dígito
                        //v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos 3 primeiros dígitos
                        v=v.replace(/(\d)(\d{2})$/,"$1.$2");    //Coloca hífen entre o quarto e o quinto dígitos
                        if(v > 100.00){
                        alert("informe um valor ate 100.00");
                        v="";
                        return v;
                        }else{
                          return v;
                        }
                  }
            </script>
            <!-- END MASCARA PERCENTUAL -->

           <!-- MASCARA DATA -->
           <script language="javascript"> ///colocar barra automatica na data
              function barra(objeto){
                if (objeto.value.length == 2 || objeto.value.length == 5 ){
                  objeto.value = objeto.value+"-";
                  }
                }
            </script>
            <!-- END MASCARA DATA -->

            <!-- CHECKBOX AREA PROPRIA -->
            <script>
              $(document).ready(function(){
                $("#checkPropria").on('click', function(){
                  if( $("#areaPropria").prop( "disabled") ) {
                    $("#areaPropria").prop( "disabled", false);
                  }else{
                    $("#areaPropria").prop( "disabled", true);
                  }
                });
              });
            </script>
            <!-- END CHECKBOX AREA PROPRIA -->

            <!-- CHECKBOX AREA ARRENDADA -->
            <script>
              $(document).ready(function(){
                $("#checkArrendada").on('click', function(){
                  if( $("#areaArrendada").prop( "disabled") ) {
                    $("#areaArrendada").prop( "disabled", false);
                  }else{
                    $("#areaArrendada").prop( "disabled", true);
                  }
                });
              });
            </script>
            <!-- END CHECKBOX AREA ARRENDADA -->

            <!-- CHECKBOX AREA PARCERIA -->
            <script>
              $(document).ready(function(){
                $("#checkParceria").on('click', function(){
                  if( $("#areaParceria").prop( "disabled") ) {
                    $("#areaParceria").prop( "disabled", false);
                  }else{
                    $("#areaParceria").prop( "disabled", true);
                  }
                });
              });
            </script>
            <!-- END CHECKBOX AREA PARCERIA -->

            <!-- CHECKBOX MAO FAMILIAR -->
            <script>
              $(document).ready(function(){
                $("#maoFamiliar").on('click', function(){
                  if( $("#numFamiliar").prop( "disabled") ) {
                    $("#numFamiliar").prop( "disabled", false);
                    $("#mesFamiliar").prop( "disabled", false);
                  }else{
                    $("#numFamiliar").prop( "disabled", true);
                    $("#mesFamiliar").prop( "disabled", true);
                  }
                });
              });
            </script>
            <!-- END CHECKBOX MAO FAMILIAR -->

            <!-- CHECKBOX MAO CONTRATADA -->
            <script>
              $(document).ready(function(){
                $("#maoContratada").on('click', function(){
                  if( $("#numContratada").prop( "disabled") ) {
                    $("#numContratada").prop( "disabled", false);
                    $("#mesContratada").prop( "disabled", false);
                  }else{
                    $("#numContratada").prop( "disabled", true);
                    $("#mesContratada").prop( "disabled", true);
                  }
                });
              });
            </script>
            <!-- END CHECKBOX MAO CONTRATADA -->

            <!-- CHECKBOX MAO DIARISTA -->
            <script>
              $(document).ready(function(){
                $("#maoDiarista").on('click', function(){
                  if( $("#numDiarista").prop( "disabled") ) {
                    $("#numDiarista").prop( "disabled", false);
                    $("#mesDiarista").prop( "disabled", false);
                  }else{
                    $("#numDiarista").prop( "disabled", true);
                    $("#mesDiarista").prop( "disabled", true);
                  }
                });
              });
            </script>
            <!-- END CHECKBOX MAO CONTRATADA -->

              <!-- VERIFICA ATIVIDADES ORDERM IMPORTANCIA -->
              <script type="text/javascript">
                   function mostraativ2(){
                     if(document.getElementById('ativimport2').style.display=='block'){
                           document.getElementById('ativimport2').style.display=='none';
                         }
                         else{
                           document.getElementById('ativimport2').style.display='block';
                         }
                   }
                   function mostraativ3(){
                     var ativ1 = document.getElementById('atividade1').value;
                     var ativ2 = document.getElementById('atividade2').value;
                     if(ativ1 == ativ2){
                       alert('ATIVIDADES IGUAIS! escolha outra!');
                       $("#atividade2").each(function () { //added a each loop here
                           $(this).select2('val', ['null']);
                       });
                     }
                     if((ativ1 != ativ2) && (ativ2 != 'null')){
                        document.getElementById("atividade2").style.border = "none";
                        if(document.getElementById('ativimport3').style.display=='block'){
                              document.getElementById('ativimport3').style.display=='none';
                         }
                         else{
                              document.getElementById('ativimport3').style.display='block';
                         }
                     }
                   }
                   function mostraativ4(){
                     var ativ1 = document.getElementById('atividade1').value;
                     var ativ2 = document.getElementById('atividade2').value;
                     var ativ3 = document.getElementById('atividade3').value;
                     if((ativ3 == ativ1) || (ativ3 == ativ2)){
                       alert('ATIVIDADES IGUAIS! escolha outra!');
                       $("#atividade3").each(function () { //added a each loop here
                           $(this).select2('val', ['null']);
                       });
                     }
                    if((ativ3 != ativ1) && (ativ3 != ativ2) && (ativ3 != 'null')) {
                           document.getElementById("atividade3").style.border = "none";
                           if(document.getElementById('ativimport4').style.display=='block'){
                           document.getElementById('ativimport4').style.display=='none';
                         }
                         else{
                           document.getElementById('ativimport4').style.display='block';
                         }
                     }
                   }
                   function mostraativ5(){
                     var ativ1 = document.getElementById('atividade1').value;
                     var ativ2 = document.getElementById('atividade2').value;
                     var ativ3 = document.getElementById('atividade3').value;
                     var ativ4 = document.getElementById('atividade4').value;
                     if((ativ4 == ativ1) || (ativ4 == ativ2) || (ativ4 == ativ3)){
                       alert('ATIVIDADES IGUAIS! escolha outra!');
                       $("#atividade4").each(function () { //added a each loop here
                           $(this).select2('val', ['null']);
                       });
                     }
                    if((ativ4 != ativ1) && (ativ4 != ativ2) && (ativ4 != ativ3) && (ativ4 != 'null')){
                       document.getElementById("atividade4").style.border = "none";
                     if(document.getElementById('ativimport5').style.display=='block'){
                           document.getElementById('ativimport5').style.display=='none';
                         }
                         else{
                           document.getElementById('ativimport5').style.display='block';
                         }
                       }
                   }
                   function mostraativ6(){
                     var ativ1 = document.getElementById('atividade1').value;
                     var ativ2 = document.getElementById('atividade2').value;
                     var ativ3 = document.getElementById('atividade3').value;
                     var ativ4 = document.getElementById('atividade4').value;
                     var ativ5 = document.getElementById('atividade5').value;
                     if((ativ5 == ativ1) || (ativ5 == ativ2) || (ativ5 == ativ3) || (ativ5 == ativ4)){
                       alert('ATIVIDADES IGUAIS! escolha outra!');
                       $("#atividade5").each(function () { //added a each loop here
                           $(this).select2('val', ['null']);
                       });
                     }
                     if((ativ5 != ativ1) && (ativ5 != ativ2) && (ativ5 != ativ3) && (ativ5 != ativ4) && (ativ5 != 'null')){
                       document.getElementById("atividade5").style.border = "none";
                     if(document.getElementById('ativimport6').style.display=='block'){
                           document.getElementById('ativimport6').style.display=='none';
                         }
                         else{
                           document.getElementById('ativimport6').style.display='block';
                         }
                       }
                   }
                   function mostraativ7(){
                     var ativ1 = document.getElementById('atividade1').value;
                     var ativ2 = document.getElementById('atividade2').value;
                     var ativ3 = document.getElementById('atividade3').value;
                     var ativ4 = document.getElementById('atividade4').value;
                     var ativ5 = document.getElementById('atividade5').value;
                     var ativ6 = document.getElementById('atividade6').value;
                     if((ativ6 == ativ1) || (ativ6 == ativ2) || (ativ6 == ativ3) || (ativ6 == ativ4) || (ativ6 == ativ5)){
                       alert('ATIVIDADES IGUAIS! escolha outra!');
                       $("#atividade6").each(function () { //added a each loop here
                           $(this).select2('val', ['null']);
                       });

                     }
                    if((ativ6 != ativ1) && (ativ6 != ativ2) && (ativ6 != ativ3) && (ativ6 != ativ4) && (ativ6 != ativ5) && (ativ6 != 'null')){
                       document.getElementById("atividade6").style.border = "none";
                     if(document.getElementById('ativimport6').style.display=='block'){
                           document.getElementById('ativimport6').style.display=='none';
                         }
                         else{
                           document.getElementById('ativimport6').style.display='block';
                         }
                       }
                   }
                </script>
                <!-- VERIFICA ATIVIDADES ORDERM IMPORTANCIA -->


                <!-- VERIFICA MOTIVACOES INCENTIVOS -->
                <script type="text/javascript">
                     function mostramotiv2(){
                       if(document.getElementById('motiv2').style.display=='block'){
                             document.getElementById('motiv2').style.display=='none';
                           }
                           else{
                             document.getElementById('motiv2').style.display='block';
                           }
                     }
                     function mostramotiv3(){
                       var motiv1 = document.getElementById('motivacao1').value;
                       var motiv2 = document.getElementById('motivacao2').value;
                       if(motiv1 == motiv2){
                         alert('ATIVIDADES IGUAIS! escolha outra!');
                         $("#motivacao2").each(function () { //added a each loop here
                             $(this).select2('val', ['null']);
                         });
                       }
                       if((motiv1 != motiv2) && (motiv2 != 'null')){
                          if(document.getElementById('motiv3').style.display=='block'){
                                document.getElementById('motiv3').style.display=='none';
                           }
                           else{
                                document.getElementById('motiv3').style.display='block';
                           }
                       }
                     }
                     function mostramotiv4(){
                       var motiv1 = document.getElementById('motivacao1').value;
                       var motiv2 = document.getElementById('motivacao2').value;
                       var motiv3 = document.getElementById('motivacao3').value;
                       if((motiv3 == motiv1) || (motiv3 == motiv2)){
                         alert('ATIVIDADES IGUAIS! escolha outra!');
                         $("#motivacao3").each(function () { //added a each loop here
                             $(this).select2('val', ['null']);
                         });
                       }
                      if((motiv3 != motiv1) && (motiv3 != motiv2) && (motiv3 != 'null')) {
                             if(document.getElementById('motiv4').style.display=='block'){
                             document.getElementById('motiv4').style.display=='none';
                           }
                           else{
                             document.getElementById('motiv4').style.display='block';
                           }
                       }
                     }
                     function mostramotiv5(){
                       var motiv1 = document.getElementById('motivacao1').value;
                       var motiv2 = document.getElementById('motivacao2').value;
                       var motiv3 = document.getElementById('motivacao3').value;
                       var motiv4 = document.getElementById('motivacao4').value;
                       if((motiv4 == motiv1) || (motiv4 == motiv2) || (motiv4 == motiv3)){
                         alert('ATIVIDADES IGUAIS! escolha outra!');
                         $("#motivacao4").each(function () { //added a each loop here
                             $(this).select2('val', ['null']);
                         });
                       }
                      if((motiv4 != motiv1) && (motiv4 != motiv2) && (motiv4 != motiv3) && (motiv4 != 'null')){
                       if(document.getElementById('motiv5').style.display=='block'){
                             document.getElementById('motiv5').style.display=='none';
                           }
                           else{
                             document.getElementById('motiv5').style.display='block';
                           }
                         }
                     }
                     function mostramotiv6(){
                       var motiv1 = document.getElementById('motivacao1').value;
                       var motiv2 = document.getElementById('motivacao2').value;
                       var motiv3 = document.getElementById('motivacao3').value;
                       var motiv4 = document.getElementById('motivacao4').value;
                       var motiv5 = document.getElementById('motivacao5').value;
                       if((motiv5 == motiv1) || (motiv5 == motiv2) || (motiv5 == motiv3) || (motiv5 == motiv4)){
                         alert('ATIVIDADES IGUAIS! escolha outra!');
                         $("#motivacao5").each(function () { //added a each loop here
                             $(this).select2('val', ['null']);
                         });
                       }
                       if((motiv5 != motiv1) && (motiv5 != motiv2) && (motiv5 != motiv3) && (motiv5 != motiv4) && (motiv5 != 'null')){
                         if(document.getElementById('motiv6').style.display=='block'){
                             document.getElementById('motiv6').style.display=='none';
                           }
                           else{
                             document.getElementById('motiv6').style.display='block';
                           }
                         }
                     }
                     function mostramotiv7(){
                       var motiv1 = document.getElementById('motivacao1').value;
                       var motiv2 = document.getElementById('motivacao2').value;
                       var motiv3 = document.getElementById('motivacao3').value;
                       var motiv4 = document.getElementById('motivacao4').value;
                       var motiv5 = document.getElementById('motivacao5').value;
                       var motiv6 = document.getElementById('motivacao6').value;
                       if((motiv6 == motiv1) || (motiv6 == motiv2) || (motiv6 == motiv3) || (motiv6 == motiv4) || (motiv6 == motiv5)){
                         alert('ATIVIDADES IGUAIS! escolha outra!');
                         $("#motivacao6").each(function () { //added a each loop here
                             $(this).select2('val', ['null']);
                         });

                       }
                      if((motiv6 != motiv1) && (motiv6 != motiv2) && (motiv6 != motiv3) && (motiv6 != motiv4) && (motiv6 != motiv5) && (motiv6 != 'null')){
                       if(document.getElementById('motiv7').style.display=='block'){
                             document.getElementById('motiv7').style.display=='none';
                           }
                           else{
                             document.getElementById('motiv7').style.display='block';
                           }
                         }
                     }
                     function mostramotiv8(){
                       var motiv1 = document.getElementById('motivacao1').value;
                       var motiv2 = document.getElementById('motivacao2').value;
                       var motiv3 = document.getElementById('motivacao3').value;
                       var motiv4 = document.getElementById('motivacao4').value;
                       var motiv5 = document.getElementById('motivacao5').value;
                       var motiv6 = document.getElementById('motivacao6').value;
                       var motiv7 = document.getElementById('motivacao7').value;
                       if((motiv7 == motiv1) || (motiv7 == motiv2) || (motiv7 == motiv3) || (motiv7 == motiv4) || (motiv7 == motiv5) || (motiv7 == motiv6)){
                         alert('ATIVIDADES IGUAIS! escolha outra!');
                         $("#motivacao7").each(function () { //added a each loop here
                             $(this).select2('val', ['null']);
                         });

                       }
                      if((motiv7 != motiv1) && (motiv7 != motiv2) && (motiv7 != motiv3) && (motiv7 != motiv4) && (motiv7 != motiv5) && (motiv7 != motiv6) && (motiv7 != 'null')){
                       if(document.getElementById('motiv8').style.display=='block'){
                             document.getElementById('motiv8').style.display=='none';
                           }
                           else{
                             document.getElementById('motiv8').style.display='block';
                           }
                         }
                     }
                     function mostramotiv9(){
                       var motiv1 = document.getElementById('motivacao1').value;
                       var motiv2 = document.getElementById('motivacao2').value;
                       var motiv3 = document.getElementById('motivacao3').value;
                       var motiv4 = document.getElementById('motivacao4').value;
                       var motiv5 = document.getElementById('motivacao5').value;
                       var motiv6 = document.getElementById('motivacao6').value;
                       var motiv7 = document.getElementById('motivacao7').value;
                       var motiv8 = document.getElementById('motivacao8').value;
                       if((motiv8 == motiv1) || (motiv8 == motiv2) || (motiv8 == motiv3) || (motiv8 == motiv4) || (motiv8 == motiv5) || (motiv8 == motiv6)|| (motiv8 == motiv7)){
                         alert('ATIVIDADES IGUAIS! escolha outra!');
                         $("#motivacao8").each(function () { //added a each loop here
                             $(this).select2('val', ['null']);
                         });

                       }
                      if((motiv8 != motiv1) && (motiv8 != motiv2) && (motiv8 != motiv3) && (motiv8 != motiv4) && (motiv8 != motiv5) && (motiv8 != motiv6) && (motiv8 != motiv7) && (motiv8 != 'null')){
                       if(document.getElementById('motiv9').style.display=='block'){
                             document.getElementById('motiv9').style.display=='none';
                           }
                           else{
                             document.getElementById('motiv9').style.display='block';
                           }
                         }
                     }
                     function mostramotiv10(){
                       var motiv1 = document.getElementById('motivacao1').value;
                       var motiv2 = document.getElementById('motivacao2').value;
                       var motiv3 = document.getElementById('motivacao3').value;
                       var motiv4 = document.getElementById('motivacao4').value;
                       var motiv5 = document.getElementById('motivacao5').value;
                       var motiv6 = document.getElementById('motivacao6').value;
                       var motiv7 = document.getElementById('motivacao7').value;
                       var motiv8 = document.getElementById('motivacao8').value;
                       var motiv9 = document.getElementById('motivacao9').value;
                       if((motiv9 == motiv1) || (motiv9 == motiv2) || (motiv9 == motiv3) || (motiv9 == motiv4) || (motiv9 == motiv5) || (motiv9 == motiv6) || (motiv9 == motiv7) || (motiv9 == motiv8)){
                         alert('ATIVIDADES IGUAIS! escolha outra!');
                         $("#motivacao9").each(function () { //added a each loop here
                             $(this).select2('val', ['null']);
                         });

                       }
                     }
                  </script>
                  <!-- END VERIFICA MOTIVACOES INCENTIVOS -->

                  <!-- TABELA PRODUCAO -->
                  <script language="javascript">
                    // Função responsável por inserir linhas na tabela
                    function inserirLinhaTabela2() {

                        var table = document.getElementById("minhaTabela3");

                        // Captura a quantidade de linhas já existentes na tabela
                        var numOfRows = table.rows.length;

                        // Captura a quantidade de colunas da última linha da tabela
                        var numOfCols = table.rows[numOfRows-1].cells.length;

                        // Insere uma linha no fim da tabela.
                        var newRow = table.insertRow(numOfRows);

                        var cont = document.getElementById("cont").value;
                        var cont = parseInt(cont) + parseInt(1);
                        // Faz um loop para criar as colunas
                        for (var j = 0; j < numOfCols; j++) {
                            // Insere uma coluna na nova linha
                            newCell = newRow.insertCell(j);
                            // Insere um conteúdo na coluna
                            if(j == 0){
                              var td0 = '<select name="id_tipo[]" id="'+ cont +'" class="ajax form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" tabindex="-1" aria-hidden="true">' +
                                           '<option value="null">Selecione</option>' +
                                           '<option value="1">Fruticultura</option>' +
                                           '<option value="2">Olericultura</option>' +
                                        '</select>';
                              newCell.innerHTML = td0;
                            }
                            if(j == 1){
                              var td1 = '<select name="id_cultura[]" class="form-control select2 select2-hidden-accessible" id="selecionecultura'+ cont +'" style="width: 100%;" tabindex="-1" tabindex="-1" aria-hidden="true">' +
                                           '<option value="null">---</option>' +
                                        '</select>';
                              newCell.innerHTML = td1;
                            }
                            if(j == 2){
                              var td2 = '<select name="id_cultivar[]" class="form-control select2 select2-hidden-accessible" id="selecionecultivar'+ cont +'" style="width: 100%;" tabindex="-1" tabindex="-1" aria-hidden="true">' +
                                           '<option value="null">Selecione</option>' +
                                        '</select>';
                              newCell.innerHTML = td2;
                            }
                            if(j == 3){
                              var td3 = '<input type="text" class="form-control" name="ano_implant[]" style="width:55px;" maxlength="4" value="">';
                              newCell.innerHTML = td3;

                            }
                            if(j == 4){
                              var td4 = '<input type="text" class="form-control" name="num_plantas[]" style="width:55px;" maxlength="6" value="">';
                              newCell.innerHTML = td4;

                            }
                            if(j == 5){
                              var td5 = '<input type="text" class="form-control" name="area_ha_m[]" style="width:55px;" maxlength="8" value="">';
                              newCell.innerHTML = td5;
                            }
                            if(j == 6){
                              var td6 = '<select name="unidade[]" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" tabindex="-1" aria-hidden="true"> ' +
                                          '<option value="null">Selecione</option>' +
                                          '<option value="ha">ha</option>' +
                                          '<option value="m">m</option>' +
                                          '<option value="m²">m²</option>' +
                                        '</select>';
                              newCell.innerHTML = td6;

                            }
                            if(j == 7){
                              var td7 = '<input type="text" class="form-control" name="num_safras[]" style="width:55px;" maxlength="5" value="">';
                              newCell.innerHTML = td7;
                            }
                            if(j == 8){
                              var td8 = '<input type="text" class="form-control" name="quant_prod[]" style="width:55px;" maxlength="8" value="">';
                              newCell.innerHTML = td8;
                            }
                            if(j == 9){
                              var td9 = '<select name="unidade_quant_prod[]" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" tabindex="-1" aria-hidden="true">' +
                                            '<option value="null">Selecione</option>' +
                                            '<option value="kilos">kilos</option>' +
                                            '<option value="toneladas">toneladas</option>' +
                                            '<option value="maços">maços</option>' +
                                            '<option value="pes">pés</option>' +
                                            '<option value="litros">litros</option>' +
                                            '<option value="unidades">unidades</option>' +
                                            '<option value="caixas">caixas</option>' +
                                            '<option value="barris">barris</option>' +
                                        '</select>';
                              newCell.innerHTML = td9;
                            }
                            if(j == 10){
                              var td10 = '<select name="producao_suficiente[]" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" tabindex="-1" aria-hidden="true" >' +
                                            '<option value="null">Selecione</option>' +
                                            '<option value="sim">Sim</option>' +
                                            '<option value="nao">Não</option>' +
                                          '</select>';
                              newCell.innerHTML = td10;
                            }
                            if(j == 11){
                              var td11 = '<select name="intencao_ampliar[]" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" tabindex="-1" aria-hidden="true">' +
                                            '<option value="null">Selecione</option>' +
                                            '<option value="sim">Sim</option>' +
                                            '<option value="nao">Não</option>' +
                                          '</select>';
                              newCell.innerHTML = td11;
                            }
                            if(j == 12){
                              var td12 = '<input type="button" value="X" class="btn btn-danger btn-sm" onclick="deleteRow(this.parentNode.parentNode.rowIndex)">';
                              newCell.innerHTML = td12;

                            }
                        }
                        $(".select2").select2();
                        document.getElementById("cont").value = cont;
                    }
              </script>
              <script type="text/javascript">
                function deleteRow(i){
                  document.getElementById('minhaTabela3').deleteRow(i);
              }
            </script>

      <script type="text/javascript">
       $(document).ready(function(){
          $(document).on("change", ".ajax", function(){
                var id = $(this).attr("id");
                $("#selecionecultura"+id).empty();
                $("#selecionecultivar"+id).empty();
                $("#selecionecultura"+id).append(new Option("Selecione", "null"));
                $("#selecionecultivar"+id).append(new Option("Selecione", "null"));
                $.getJSON("/cultura/lista", {idTipo:$("#"+id+" option:selected").val()}, function(culturas){
                  for(x=0; x<culturas.length; x++){
                      $("#selecionecultura"+id).append(new Option(culturas[x].nome_cultura, culturas[x].cod_cultura));
                  }
               })

               $("#selecionecultura"+id).on("change", function(event){
                 $("#selecionecultivar"+id).empty();
                 $.getJSON("/cultivares/lista", {idCultura:$("#selecionecultura"+id+" option:selected").val()}, function(cultivar){
                        $("#selecionecultivar"+id).append(new Option("Selecione", "null"));
                        for(x=0; x<cultivar.length; x++){
                            $("#selecionecultivar"+id).append(new Option(cultivar[x].nome_cultivar_cultura, cultivar[x].cod_cultivar_cultura));
                        }
                    })
                event.stopImmediatePropagation()
               })

              });
       })
     </script>

@stop

<!-- /.content-wrapper -->
