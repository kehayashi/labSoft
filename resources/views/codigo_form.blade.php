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
      Cadastro
      <small>de propriedades</small>
    </h1>
    <ol class="breadcrumb">
      <li id="li"><i class="fa fa-spinner"></i> Progresso do cadastro</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            </div>
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
            <li class=""><a href="#tab_6" data-toggle="tab" aria-expanded="false">Culturas</a></li>
            <li class=""><a href="#tab_7" data-toggle="tab" aria-expanded="false">Mercado</a></li>
              </ul>
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
                                  <button class="form-control btn btn-info" id="idModal" onclick="teste();">Ver localização <i class="fa fa-map-marker"></i></button>
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
                                <input type="text" class="form-control" name="nome_cadastrador" placeholder="ex: nome" value="{{ old('nome') }}">
                              </div>
                              <!-- end col -->
                              <div class="col-lg-4">
                                <b>Data:</b><br>
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


                <!-- inicio tab_2 -->
                <div class="tab-pane" id="tab_2">
                  <div class="box box-primary" style="background-color: #f2f2f2;">
                   <div class="box-header with-border">
                   </div>
                     <div class="box-body">
                       <div class="row">
                        <div class="form-group-row">
                          <div class="col-lg-12">
                            <div class="box-body table">
                              <table class="table table-hover responsive" id="minhaTabela" style="background-color: #f4f4f4">
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
                                    <input type="text" class="form-control" name="nome" placeholder="ex: nome" />
                                  </td>
                                  <td>
                                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="parentesco">
                                      <option>Selecione</option>
                                    </select>
                                  </td>
                                  <td>
                                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="sexo">
                                      <option>Selecione</option>
                                      <option>M</option>
                                      <option>F</option>
                                    </select>
                                  </td>
                                  <td>
                                    <input type="text" class="form-control" name="data_nasc" placeholder="dd/mm/aaaa" />
                                  </td>
                                  <td>
                                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="escolaridade">
                                      <option>Selecione</option>
                                    </select>
                                  </td>
                                  <td style="width: 280px;">
                                    <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Selecione" style="width: 95%;" tabindex="-1" aria-hidden="true">
                                       <option>Janeiro</option>
                                       <option>Fevereiro</option>
                                       <option>Março</option>
                                       <option>Abril</option>
                                       <option>Maio</option>
                                       <option>Junho</option>
                                       <option>Julho</option>
                                       <option>Agosto</option>
                                       <option>Setembro</option>
                                       <option>Outubro</option>
                                       <option>Novembro</option>
                                       <option>Dezembro</option>
                                   </select>
                                </table>
                              <input type="hidden" id ="cont" value="1">
                              <br>
                             <button type="button" class="form-control btn btn-info" onclick="inserirLinhaTabela()"> Adicionar + 1 membro familiar</button>
                            <div class="row">
                              <div class="col-md-4">
                              </div>
                              <!-- end col -->
                              <div class="col-md-4">
                              </div>
                              <!-- end col -->
                              <div class="col-md-4">
                              </div>
                              <!-- end col -->
                            </div>
                            <!-- end row -->
                          </div>
                          <!-- end div table -->
                        </div>
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
                             <span>Própria</span>
                             <div class="input-group">
                                <span class="input-group-addon">
                                  <input type="checkbox" aria-label="">
                                </span>
                                <input type="text" class="form-control" placeholder="hectare">
                             </div>
                            <!-- end input-group -->
                           </div>
                          <!-- end col -->
                           <div class="col-md-4">
                             <span>Arrendada</span>
                             <div class="input-group">
                                <span class="input-group-addon">
                                  <input type="checkbox" aria-label="">
                                </span>
                                <input type="text" class="form-control" placeholder="hectare">
                              </div>
                              <!-- end input-group -->
                           </div>
                           <!-- end col-->
                           <div class="col-md-4">
                             <span>Parceria</span>
                             <div class="input-group">
                                <span class="input-group-addon">
                                  <input type="checkbox" aria-label="">
                                </span>
                                <input type="text" class="form-control" placeholder="hectare">
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
                                  <input type="checkbox" aria-label="">
                                </span>
                                <input type="number" class="form-control" placeholder="Quantidade">
                              </div>
                              <!-- end input-group -->
                           </div>
                           <!-- end col -->
                           <div class="col-md-4">
                             <span>Contratada</span>
                             <div class="input-group">
                                <span class="input-group-addon">
                                  <input type="checkbox" aria-label="">
                                </span>
                                <input type="number" class="form-control" placeholder="Quantidade">
                              </div>
                              <!-- end input-group -->
                           </div>
                           <!-- end col -->
                           <div class="col-md-4">
                             <span>Diarista</span>
                             <div class="input-group">
                                <span class="input-group-addon">
                                  <input type="checkbox" aria-label="">
                                </span>
                                <input type="number" class="form-control" placeholder="Quantidade">
                             </div>
                             <!-- end input-group -->
                           </div>
                           <!-- end col -->
                         </div>
                         <!-- end row -->
                         <div class="row">
                           <div class="col-md-4">
                             <div class="form-group">
                               <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Meses" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <option>Janeiro</option>
                                  <option>Fevereiro</option>
                                  <option>Março</option>
                                  <option>Abril</option>
                                  <option>Maio</option>
                                  <option>Junho</option>
                                  <option>Julho</option>
                                  <option>Agosto</option>
                                  <option>Setembro</option>
                                  <option>Outubro</option>
                                  <option>Novembro</option>
                                  <option>Dezembro</option>
                              </select>
                             </div>
                             <!-- end input-group -->
                           </div>
                           <!-- end col -->
                           <div class="col-md-4">
                             <div class="form-group">
                               <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Meses" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <option>Janeiro</option>
                                  <option>Fevereiro</option>
                                  <option>Março</option>
                                  <option>Abril</option>
                                  <option>Maio</option>
                                  <option>Junho</option>
                                  <option>Julho</option>
                                  <option>Agosto</option>
                                  <option>Setembro</option>
                                  <option>Outubro</option>
                                  <option>Novembro</option>
                                  <option>Dezembro</option>
                              </select>
                             </div>
                             <!-- end input-group -->
                           </div>
                           <!-- end col -->
                           <div class="col-md-4">
                             <div class="form-group">
                               <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Meses" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <option>Janeiro</option>
                                  <option>Fevereiro</option>
                                  <option>Março</option>
                                  <option>Abril</option>
                                  <option>Maio</option>
                                  <option>Junho</option>
                                  <option>Julho</option>
                                  <option>Agosto</option>
                                  <option>Setembro</option>
                                  <option>Outubro</option>
                                  <option>Novembro</option>
                                  <option>Dezembro</option>
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
                             <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="importancia">
                               <option>Selecione as atividades da propriedade</option>
                             </select>
                             <div id="selects_adicionais2" style="border: none"></div>
                           </div>
                           <!-- end col -->
                         </div>
                         <!-- end row -->
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
                         <div class="row">
                           <div class="col-md-12">
                              <br>
                              <button type="button" class="form-control btn btn-info" name="add2">Adicionar + 1 atividade</button>
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
                             <input type="number" class="form-control" name="" value="" placeholder="ex: 2001" />
                           </div>
                           <!-- end col -->
                           <div class="col-md-6">
                             <span>Na fruticultura</span>
                             <input type="number" class="form-control" name="" value=""  placeholder="ex: 2002" />
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
                             <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="importancia">
                               <option>Selecione o percentual</option>
                               <option>Nenhum</option>
                               <option>Até 20%</option>
                               <option>De 20 a 40%</option>
                               <option>De 40 a 60%</option>
                               <option>De 60 a 80%</option>
                               <option>Mais de 80%</option>
                             </select>
                           </div>
                           <!-- end col -->
                           <div class="col-md-6">
                             <label>6. Quanto a fruticultura altera a renda total da propriedade (0 a 100%)?</label>
                             <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="importancia">
                               <option>Selecione o percentual</option>
                               <option>Nenhum</option>
                               <option>Até 20%</option>
                               <option>De 20 a 40%</option>
                               <option>De 40 a 60%</option>
                               <option>De 60 a 80%</option>
                               <option>Mais de 80%</option>
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
                             <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Selecione" style="width: 100%;" tabindex="-1" aria-hidden="true" id="teste" name="teste" onchange="mostraOutros()">
                                <option>Vem de geração em geração</option>
                                <option>Oportunidade de renda visualizada</option>
                                <option>Presença de uma politica ou ação publica</option>
                                <option>Motivada pela extensão rural</option>
                                <option value="outros">Outros</option>
                             </select>
                            <br><br>
                            <span>Outros quais?</span>
                            <input type="text" class="form-control" name="" value="" />
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
                             <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="importancia">
                               <option>Selecione atividades</option>
                             </select>
                               <div id="selects_adicionais" style="border: none"></div>
                           </div>
                           <!-- end col -->
                         </div>
                         <!-- end row -->
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
                         <div class="row">
                           <div class="col-md-12">
                             <span>Outros quais?</span>
                             <input type="text" class="form-control" name="" value="" />
                              <br>
                              <button type="button" class="form-control btn btn-info" name="add">Adicionar + 1 atividade</button>
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
                             <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Selecione" style="width: 100%;" tabindex="-1" aria-hidden="true" id="teste" name="teste" onchange="mostraOutros()">
                                <option>Solo</option>
                                <option>Semi-hidropônico</option>
                                <option>Hidropônico</option>
                             </select>
                            <br>
                           </div>
                           <!-- end col -->
                           <div class="col-md-3">
                             <label>9.B. Tipo de pulverizador:</label>
                             <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Selecione" style="width: 100%;" tabindex="-1" aria-hidden="true" id="teste" name="teste" onchange="mostraOutros()">
                                <option>Costal/Manual</option>
                                <option>Costal/Bateria</option>
                                <option>Turbo-atomizador Costal</option>
                                <option>Turbo-atomizador motorizado</option>
                                <option>Outros</option>
                             </select>
                             <br>
                           </div>
                           <!-- end col -->
                           <div class="col-md-3">
                             <label>9.C. Tração:</label>
                             <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Selecione" style="width: 100%;" tabindex="-1" aria-hidden="true" id="teste" name="teste" onchange="mostraOutros()">
                                <option>Manual</option>
                                <option>Animal</option>
                                <option>Mecanizada</option>
                                <option>Micro-trator</option>
                                <option>Trator</option>
                             </select>
                             <br>
                           </div>
                           <!-- end col -->
                           <div class="col-md-3">
                             <label>9.D. Irrigação:</label>
                             <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Selecione" style="width: 100%;" tabindex="-1" aria-hidden="true" id="teste" name="teste" onchange="mostraOutros()">
                                <option>Não tem</option>
                                <option>Gotejamento</option>
                                <option>Micro-aspersão</option>
                                <option>Aspersão</option>
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
                             <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Selecione" style="width: 100%;" tabindex="-1" aria-hidden="true" id="teste" name="teste" onchange="mostraOutros()">
                                <option>Fertirrigação</option>
                                <option>Adubação química</option>
                                <option>Adubação orgânica</option>
                                <option>Não faz</option>
                            </select>
                            <br>
                           </div>
                           <!-- end col -->
                           <div class="col-md-3">
                             <label>9.F. Plasticultura:</label>
                             <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Selecione" style="width: 100%;" tabindex="-1" aria-hidden="true" id="teste" name="teste" onchange="mostraOutros()">
                                <option>Não tem</option>
                                <option>Túnel baixo</option>
                                <option>Estufas</option>
                                <option>Outros</option>
                             </select>
                             <br>
                           </div>
                           <!-- end col -->
                           <div class="col-md-3">
                             <label>9.G. Fonte de água:</label>
                             <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Selecione" style="width: 100%;" tabindex="-1" aria-hidden="true" id="teste" name="teste" onchange="mostraOutros()">
                                <option>Corsan</option>
                                <option>Fonte comunitária</option>
                                <option>Açude</option>
                                <option>Sanga/rio</option>
                                <option>Poço</option>
                                <option>Poço artesiano</option>
                             </select>
                             <br>
                           </div>
                           <!-- end col -->
                           <div class="col-md-3">
                             <label>9.H. Irrigação:</label>
                             <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Selecione" style="width: 100%;" tabindex="-1" aria-hidden="true" id="teste" name="teste" onchange="mostraOutros()">
                                <option>Não tem</option>
                                <option>Gotejamento</option>
                                <option>Micro-aspersão</option>
                                <option>Aspersão</option>
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
                             <input type="text" class="form-control" placeholder="Outros"/>
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
                             <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="importancia">
                               <option>Selecione</option>
                               <option>1</option>
                               <option>2</option>
                               <option>3</option>
                               <option>4</option>
                               <option>5</option>
                               <option>6</option>
                               <option>7</option>
                               <option>8</option>
                               <option>9</option>
                               <option>10</option>
                             </select>
                           </div>
                           <!-- end col -->
                           <div class="col-md-6">
                             <label>10. Quais os principais problemas com a atividade?</label>
                             <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Selecione" style="width: 100%;" tabindex="-1" aria-hidden="true" id="teste" name="teste" onchange="mostraOutros()">
                                <option>Falta de apoio governamental</option>
                                <option>Acesso – estradas</option>
                                <option>Mercado incerto</option>
                                <option>Problemas com mão de obra</option>
                                <option>Incidência de doenças, pragas e ervas daninhas</option>
                                <option>Intempéries (geadas, ventos, chuvas, solo ruim)</option>
                                <option>Alta necessidade de recursos para investimento</option>
                                <option>Dificuldades no acompanhamento técnico</option>
                                <option>Qualificação técnica</option>
                                <option>Perspectiva de continuidade(sucessão)</option>
                                <option>Outros</option>
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
                             <input type="text" class="form-control" placeholder="Outros" />
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
              <div class="tab-pane" id="tab_7">
                <div class="row">
                  <div class="col-md-12">
                    <div class="box box-primary" style="background-color: #f2f2f2;">
                     <div class="box-header with-border">
                     </div>
                       <div class="box-body">
                         <label>Tabela dos tipos de mercados que se destinam as produções</label>
                          <div class="table table-responsive">
                           <table class="table table-hover-responsive" id="minhaTabela2" style="background-color: #f4f4f4">
                             <thead>
                               <tr style="background-color: #333">
                                   <th class="text-center" style="color: white;">Tipo</th>
                                   <th class="text-center" style="color: white;">Tipo de<br> fruta<br>/olerícola&nbsp;</th>
                                   <th class="text-center" style="color: white;">Tipo de<br> cultivar&nbsp;</th>
                                   <th class="text-center" style="color: white;">Ano de <br>implan-<br>tação<br>(p/ frutas)</th>
                                   <th class="text-center" colspan="3" style="color: white;">Área plantada</th>
                                   <th class="text-center" style="color: white;">Nº<br>safras<br>/ano</th>
                                   <th class="text-center" style="color: white;">Quant.<br>produzida<br>/ano</th>
                                   <th class="text-center" style="color: white;">Unidade</th>
                                   <th class="text-center" style="color: white;">A <br>Produçao<br>é<br>suficiente</th>
                                   <th class="text-center" style="color: white;">Intenção <br>de ampliar<br>área desse<br> cultivo</th>
                                   <th></th>
                               </tr>
                               <tr style="background-color: #333">
                                 <th></th>
                                 <th></th>
                                 <th></th>
                                 <th></th>
                                 <th class="text-center" style="color: white;">nº<br>plantas</th>
                                 <th class="text-center" style="color: white;">ha ou<br> m linear</th>
                                 <th class="text-center" style="color: white;">unidade</th>
                                 <th></th>
                                 <th></th>
                                 <th></th>
                                 <th></th>
                                 <th></th>
                                 <th></th>
                               </tr>
                             </thead>
                             <tbody>
                               <tr>
                                 <td>
                                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="importancia">
                                     <option>Selecione</option>
                                     <option>Fruticultura</option>
                                     <option>Olericultura</option>
                                    </select>
                                 </td>
                                 <td>
                                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="importancia">
                                     <option>Selecione</option>
                                     <option>Fruticultura</option>
                                     <option>Olericultura</option>
                                    </select>
                                 </td>
                                 <td>
                                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="importancia">
                                     <option>Selecione</option>
                                     <option>Fruticultura</option>
                                     <option>Olericultura</option>
                                    </select>
                                 </td>
                                 <td>
                                   <input type="text" class="form-control" name="" placeholder="0" value="">
                                 </td>
                                 <td>
                                   <input type="text" class="form-control" placeholder="0" name="" value="">
                                 </td>
                                 <td>
                                   <input type="text" class="form-control" placeholder="0" name="" value="">
                                 </td>
                                 <td>
                                   <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="importancia">
                                    <option>Selecione</option>
                                    <option>ha</option>
                                    <option>m</option>
                                    <option>m²</option>
                                    </select>
                                 </td>
                                 <td>
                                   <input type="text" class="form-control" placeholder="0" name="" value="">
                                 </td>
                                 <td>
                                   <input type="text" class="form-control" placeholder="0" name="" value="">
                                 </td>
                                 <td>
                                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="importancia">
                                      <option>Selecione</option>
                                      <option>Kilos</option>
                                      <option>Toneladas</option>
                                      <option>Maços</option>
                                      <option>Pés</option>
                                      <option>Litros</option>
                                      <option>Unidades</option>
                                      <option>Caixas</option>
                                      <option>Barris</option>
                                      </select>
                                  </td>
                                  <td>
                                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="importancia">
                                      <option>Selecione</option>
                                      <option>Sim</option>
                                      <option>Não</option>
                                    </select>
                                  </td>
                                  <td>
                                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="importancia">
                                      <option>Selecione</option>
                                      <option>Sim</option>
                                      <option>Não</option>
                                    </select>
                                  </td>
                               </tr>
                             </tbody>
                           </table>
                          <!-- end table -->
                         </div>
                         <!-- end table-responsive -->
                        <input type="hidden" id ="cont2" value="1">
                        <br>
                        <button type="button" class="form-control btn btn-info" onclick="inserirLinhaTabela2()"> Adicionar + 1 produção</button>
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


              </div>
              <!-- end tab-content -->
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
          <a href="#tab_1" class="form-control btn btn-danger" id="prevTab"><i class="fa fa-arrow-left"></i> Voltar</a>
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
          <a href="#tab_2" class="form-control btn btn-success" id="nextTab">Continuar <i class="fa fa-arrow-right"></i></a>
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
                    <button type="button" class="form-control btn btn-success" data-dismiss="modal">Fechar</button>
                </div>
                <!-- end modal-footer -->
            </div>
            <!-- end modal-content -->
          </div>
          <!-- end modal-dialog -->
      </div>
      <!-- end modal -->

    <script src="{{ asset("/bower_components/adminLTE/plugins/jQuery/jquery-2.2.3.min.js") }}"></script>

    <script>
      function mostraOutros(){
        var result = [];
        var options = document.getElementById('teste').options;
        var opt;

        for (var i = 0; iLen < options.length; i<iLen; i++) {
            opt = options[i];
            alert(options[i]);
        }
      }
    </script>

    <script>
      $(function () {
        $(".select2").select2();
      });
    </script>


    <script>
      $('#nextTab').click(function(e){
        e.preventDefault();
        $('.nav-tabs > .active').next('li').find('a').trigger('click');

        var barra = document.getElementById('progress-bar').style.width;
        var percentual = parseInt(barra) + parseInt(17);

        document.getElementById('buttonPrev').style.display = "block";
        document.getElementById('progress-bar').style.width = percentual + '%';
        document.getElementById('li').style.color = "green";
      });
    </script>

    <script>
      $('#prevTab').click(function(e){
        e.preventDefault();
        $('.nav-tabs > .active').prev('li').find('a').trigger('click');

        var barra = document.getElementById('progress-bar').style.width;
        var percentual = parseInt(barra) - parseInt(17);

        if(percentual == 0){
          document.getElementById('buttonPrev').style.display = "none";
        }

        document.getElementById('progress-bar').style.width = percentual + '%';
        document.getElementById('li').style.color = "green";
      });
    </script>

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
                                  '<input type="text" class="form-control" name="nome" placeholder="ex: nome" />'+
                                '</td>';
                      newCell.innerHTML = td0;
                    }
                    if(j == 1){
                      var td1 = '<td>'+
                                    '<select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="parentesco">'+
                                      '<option>Selecione</option>'+
                                    '</select>'+
                                  '</td>';
                      newCell.innerHTML = td1;
                    }
                    if(j == 2){
                      var td2 = '<td>'+
                                    '<select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="sexo">'+
                                      '<option>Selecione</option>'+
                                    '</select>'+
                                  '</td>';
                      newCell.innerHTML = td2;
                    }
                    if(j == 3){
                      var td3 = '<td>'+
                                  '<input type="text" class="form-control" name="data_nasc" placeholder="dd/mm/aaaa" />'+
                                '</td>';
                      newCell.innerHTML = td3;
                    }
                    if(j == 4){
                      var td4 = '<td>'+
                                    '<select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="escolaridade">'+
                                      '<option>Selecione</option>'+
                                    '</select>'+
                                  '</td>';
                      newCell.innerHTML = td4;

                    }
                    if(j == 5){
                      var td5 = '<td style="width: 280px;">'+
                                    '<select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Selecione" style="width: 95%;" tabindex="-1" aria-hidden="true">'+
                                       '<option>Janeiro</option>'+
                                       '<option>Fevereiro</option>'+
                                       '<option>Março</option>'+
                                       '<option>Abril</option>'+
                                       '<option>Maio</option>'+
                                       '<option>Junho</option>'+
                                       '<option>Julho</option>'+
                                       '<option>Agosto</option>'+
                                       '<option>Setembro</option>'+
                                       '<option>Outubro</option>'+
                                       '<option>Novembro</option>'+
                                       '<option>Dezembro</option>'+
                                   '</select>';
                      newCell.innerHTML = td5;
                    }
                }
                $(".select2").select2();
                document.getElementById("cont").value = cont;
            }
      </script>

      <script type="text/javascript">
          $(document).ready(function(){
              var input =  '<br><select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="importancia">'+
                            '<option>Selecione atividades</option>'+
                          '</select><br>';
              $("button[name='add']").click(function( e ){
                  $('#selects_adicionais').append( input );
                  $(".select2").select2();
              });
          });
      </script>

      <script language="javascript">
              // Função responsável por inserir linhas na tabela
              function inserirLinhaTabela2() {

                  var table = document.getElementById("minhaTabela2");

                  // Captura a quantidade de linhas já existentes na tabela
                  var numOfRows = table.rows.length;

                  // Captura a quantidade de colunas da última linha da tabela
                  var numOfCols = table.rows[numOfRows-1].cells.length;

                  // Insere uma linha no fim da tabela.
                  var newRow = table.insertRow(numOfRows);

                  var cont = document.getElementById("cont2").value;
                  var cont = parseInt(cont) + parseInt(1);
                  // Faz um loop para criar as colunas
                  for (var j = 0; j < numOfCols; j++) {
                      // Insere uma coluna na nova linha
                      newCell = newRow.insertCell(j);
                      // Insere um conteúdo na coluna
                      if(j == 0){
                        var td0 = '<td>'+
                                    '<select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="importancia">'+
                                        '<option>Selecione</option>'+
                                        '<option>Fruticultura</option>'+
                                        '<option>Olericultura</option'+
                                    '</select>'+
                                  '</td>';
                        newCell.innerHTML = td0;
                      }
                      if(j == 1){
                        var td1 = '<td>'+
                                    '<select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="importancia">'+
                                        '<option>Selecione</option>'+
                                    '</select>'+
                                  '</td>';
                        newCell.innerHTML = td1;
                      }
                      if(j == 2){
                        var td2 = '<td>'+
                                    '<select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="importancia">'+
                                        '<option>Selecione</option>'+
                                        '<option>Fruticultura</option>'+
                                        '<option>Olericultura</option>'+
                                    '</select>'+
                                  '</td>';
                        newCell.innerHTML = td2;
                      }
                      if(j == 3){
                        var td3 = '<td>'+
                                    '<input type="text" class="form-control" name="" placeholder="0" value="">'+
                                  '</td>';
                        newCell.innerHTML = td3;
                      }
                      if(j == 4){
                        var td4 = '<td>'+
                                    '<input type="text" class="form-control" placeholder="0" name="" value="">'+
                                  '</td>';
                        newCell.innerHTML = td4;

                      }
                      if(j == 5){
                        var td5 = '<td>'+
                                    '<input type="text" class="form-control" placeholder="0" name="" value="">'+
                                  '</td>';
                        newCell.innerHTML = td5;
                      }
                      if(j == 6){
                        var td6 = '<td>'+
                                    '<select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="importancia">'+
                                      '<option>Selecione</option>'+
                                      '<option>ha</option>'+
                                      '<option>m</option>'+
                                      '<option>m²</option>'+
                                    '</select>'+
                                  '</td>';
                        newCell.innerHTML = td6;
                      }
                      if(j == 7){
                        var td7 = '<td>'+
                                      '<input type="text" class="form-control" placeholder="0" name="" value="">'+
                                  '</td>';
                        newCell.innerHTML = td7;
                      }
                      if(j == 8){
                        var td8 = '<td>'+
                                    '<input type="text" class="form-control" placeholder="0" name="" value="">'+
                                  '</td>';
                        newCell.innerHTML = td8;
                      }
                      if(j == 9){
                        var td9 = '<td>'+
                                    '<select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="importancia">'+
                                        '<option>Selecione</option>'+
                                        '<option>Kilos</option>'+
                                        '<option>Toneladas</option>'+
                                        '<option>Maços</option>'+
                                        '<option>Pés</option>'+
                                        '<option>Litros</option>'+
                                        '<option>Unidades</option>'+
                                        '<option>Caixas</option>'+
                                        '<option>Barris</option>'+
                                    '</select>'+
                                  '</td>';
                        newCell.innerHTML = td9;
                      }
                      if(j == 10){
                        var td10 = '<td>'+
                                    '<select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="importancia">'+
                                        '<option>Selecione</option>'+
                                        '<option>Sim</option>'+
                                        '<option>Não</option>'+
                                    '</select>'+
                                  '</td>';
                        newCell.innerHTML = td10;
                      }
                      if(j == 11){
                        var td11 = '<td>'+
                                    '<select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="importancia">'+
                                        '<option>Selecione</option>'+
                                        '<option>Sim</option>'+
                                        '<option>Não</option>'+
                                    '</select>'+
                                  '</td>';
                        newCell.innerHTML = td11;
                      }
                  }
                  $(".select2").select2();
                  document.getElementById("cont2").value = cont;
              }
        </script>

        <script type="text/javascript">
            $(document).ready(function(){
                var input =  '<br><select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="importancia">'+
                              '<option>Selecione atividades</option>'+
                            '</select><br>';
                $("button[name='add']").click(function( e ){
                    $('#selects_adicionais').append( input );
                    $(".select2").select2();
                });
            });
        </script>

      <script type="text/javascript">
          $(document).ready(function(){
              var input =  '<br><select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="importancia">'+
                            '<option>Selecione atividades</option>'+
                          '</select><br>';
              $("button[name='add2']").click(function( e ){
                  $('#selects_adicionais2').append( input );
                  $(".select2").select2();
              });
          });
      </script>

      <script type="text/javascript">
          $(document).ready(function(){
              var input =  '<br><select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="importancia">'+
                            '<option>Selecione atividades</option>'+
                          '</select><br>';
              $("button[name='add3']").click(function( e ){
                  $('#selects_adicionais3').append( input );
                  $(".select2").select2();
              });
          });
      </script>

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

      <script type="text/javascript">
        function teste(){
          $('#myModal1').modal({
            }).on('shown.bs.modal', function () {
              google.maps.event.trigger(map, 'resize');
              initMap();
            });
        }
      </script>

      <script sync defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQalLzBKBjsXnHcP6ixo87rnHJOv2DaBI&callback=initMap">
      </script>

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

       <script language="javascript"> ///colocar barra automatica na data
          function barra(objeto){
            if (objeto.value.length == 2 || objeto.value.length == 5 ){
              objeto.value = objeto.value+"/";
              }
            }
        </script>

@stop

<!-- /.content-wrapper -->
