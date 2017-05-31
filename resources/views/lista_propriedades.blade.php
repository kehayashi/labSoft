@extends('template_principal')

@section('conteudo')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 243px; background-color: white;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-search"></i> Pesquisa
      <small>propriedades</small>
    </h1>
  </section>
<br>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary" style="background-color: #f2f2f2;">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-list-ol"></i> Propriedades cadastradas
                <small>pesquisa por: codigo da propriedade, nome do responsável e município</small>
              </h3>
            </div>
            <!-- /.box-header -->
              <div class="box-body">
                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                  <div class="row">
                    <div class="col-sm-12">
                      <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                        <thead>
                          <tr role="row" style="background-color: #222d32;">
                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 296.71875px; color: #f2f2f2;">Codigo da propriedade
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 361.03125px; color: #f2f2f2;">Nome do resposável
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 321.546875px; color: #f2f2f2;">Município
                            </th>
                            <th colspstyle="width: 256.453125px;" style="width: 40px; color: #f2f2f2;">Editar
                            </th>
                          </tr>
                        </thead>
                        <!-- end thead -->
                        <tbody>
                          <tr role="row" class="odd">
                            <td class="sorting_1"><span class="label label-info" style="font-size: 15px;">1</span></td>
                            <td>Nome Sobrenome 1</td>
                            <td>Santiago</td>
                            <td class="text-center"><span class="label label-success" style="font-size: 15px;"><i class="fa fa-pencil"></i></span></td>
                          </tr>
                          <!-- end tr -->
                          <tr role="row" class="even">
                            <td class="sorting_1"><span class="label label-info" style="font-size: 15px;">2</span></td>
                            <td>Nome Sobrenome 2</td>
                            <td>Santa Maria</td>
                            <td class="text-center"><span class="label label-success" style="font-size: 15px;"><i class="fa fa-pencil"></i></span></td>
                          </tr>
                          <!-- end tr -->
                          <tr role="row" class="odd">
                            <td class="sorting_1"><span class="label label-info" style="font-size: 15px;">3</span></td>
                            <td>Nome Sobrenome 3</td>
                            <td>Santiago</td>
                            <td class="text-center"><span class="label label-success" style="font-size: 15px;"><i class="fa fa-pencil"></i></span></td>
                          </tr>
                          <!-- end tr -->
                          <tfoot>
                            <tr>
                              <td>
                                <br/>
                              </td>
                              <td>
                                <br/>
                              </td>
                              <td>
                                <br/>
                              </td>
                              <td>
                                <br/>
                              </td>
                            </tr>
                            <!-- end tr -->
                          </tfoot>
                          <!-- end tfoot -->
                      </tbody>
                      <!-- end tbody -->
                    </table>
                    <!-- end table -->
                  </div>
                <!-- end col -->
              </div>
              <!-- end row -->
            </div>
            <!-- end wrapper -->
          </div>
          <!-- end box-body -->
        </div>
        <!-- end box -->
      </div>
      <!-- end col -->
    </div>
    <!-- end row -->
  </section>
  <!-- end section -->
</div>
<!-- end tab-content -->

<script>
  $(function () {
        $('#example1').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "language": {
		    	    "sEmptyTable": "Nenhum registro encontrado",
		    	    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
		    	    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
		    	    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
		    	    "sInfoPostFix": "",
		    	    "sInfoThousands": ".",
		    	    "sLengthMenu": "_MENU_ resultados por página",
		    	    "sLoadingRecords": "Carregando...",
		    	    "sProcessing": "Processando...",
		    	    "sZeroRecords": "Nenhum registro encontrado",
		    	    "sSearch": "Pesquisar",
		    	    "oPaginate": {
		    	        "sNext": "Próximo",
		    	        "sPrevious": "Anterior",
		    	        "sFirst": "Primeiro",
		    	        "sLast": "Último"
		    	    },
		    	    "oAria": {
		    	        "sSortAscending": ": Ordenar colunas de forma ascendente",
		    	        "sSortDescending": ": Ordenar colunas de forma descendente"
		    	    }
		    	}
        });
  });
</script>

@stop

<!-- /.content-wrapper -->
