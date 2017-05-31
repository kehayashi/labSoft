<html><head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GIPAG | Fruticultura e horticultura no RS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset("/bower_components/adminLTE/bootstrap/css/bootstrap.min.css") }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset("/bower_components/adminLTE/dist/css/AdminLTE.min.css") }}">

  <link rel="stylesheet" href="{{ asset("/bower_components/adminLTE/dist/css/skins/_all-skins.min.css") }}">

  <link rel="stylesheet" href="{{ asset("/bower_components/adminLTE/plugins/select2/select2.min.css") }}">

  <script src="https://pagead2.googlesyndication.com/pub-config/r20160913/ca-pub-4495360934352473.js"></script>

  <script src="{{ asset("bower_components/adminLTE/plugins/jQuery/jquery-2.2.3.min.js") }}"></script>

  <script src="{{ asset("bower_components/adminLTE/plugins/jQuery/jquery-2.2.3.min.js") }}"></script>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page" style="background-color: white;">

<div class="wrapper">
  <div class="container">
    		<div class="row text-center">
    			<div class="col-md-4" style="margin-top: 1%;">
    				<img class="pull-left" src="{!! asset('ufsm.png') !!}" style="width: 110px;">
					  </nav>
            <!-- END NAV -->
    			</div>
          <!-- END COL -->
    			<div class="col-md-4" style="margin-top: 1%;">
              <img src="{!! asset('18718315_781270992049118_552335026_n.png') !!}" style="width: 310px;">
    			</div>
          <!-- END COL -->
    			<div class="col-md-4" style="margin-top: 1.5%;">
            <img class="pull-right" src="{!! asset('15493954_1178576778925960_730121703_n.png') !!}" style="width: 45px;">
          </div>
          <!-- END COL -->
    		</div>
        <!-- END ROW -->
			<hr>
  </div>
  <!-- END CONTAINER -->

  <div class="text-center text-muted">
      <h1 class="title"><strong>UFSM</strong> | Sistema para gerenciamento de dados sobre fruticultura e horticultura</h1>
  </div>

  <br>

<div class="login-box" style="margin-top: -0.0001%">
  <div class="login-logo">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body" style="background-color: #E8E8E8; border-radius: 8px;">
    <p class="login-box-msg" style="font-size: 20px;">
      <span class="text-center" style="font-size: 21px;">Logar e iniciar sessão</span>
      <i class="fa fa-unlock-alt pull-right" style="font-size: 40px; color: #367fa9;"></i>
    </p>

    <form action="/login" method="get">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="email" name="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="senha" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
        </div>
        <!-- /.col -->
      </div>


    <div class="text-center">
      <button type="submit" class="btn btn-primary form-control">Entrar &nbsp<i class="fa fa-sign-in"></i> </button>
    </div>

    <br/>
    @if(isset($erro))
    <div class="alert alert-danger text-center">
        <i class="fa fa-close"></i> Dados incorretos!
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    </div>
    @endif

    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<div class="push"></div>
</div>

<footer style="margin-top: -5%; margin-bottom: 10%;" class="footer text-center">
	<hr>
	<h4>
		<small class="text-info"> <b>Kendy Hayashi</b> &copy;
			2017 Sistemas para Internet/Col&eacute;gio Polit&eacute;cnico/UFSM.
		</small> <small> Todos os direitos reservados. </small>
	</h4>
</footer>

<script src="{{ asset("bower_components/adminLTE/plugins/jQuery/jquery-2.2.3.min.js") }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset("bower_components/adminLTE/bootstrap/js/bootstrap.min.js") }}"></script>
<!-- SlimScroll -->
<script src="{{ asset("bower_components/adminLTE/plugins/slimScroll/jquery.slimscroll.min.js") }}"></script>
<!-- FastClick -->
<script src="{{ asset("bower_components/adminLTE/plugins/fastclick/fastclick.js") }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset("bower_components/adminLTE/dist/js/app.min.js") }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset("bower_components/adminLTE/dist/js/demo.js") }}"></script>

<script src="{{ asset("bower_components/adminLTE/plugins/select2/select2.full.min.js") }}"></script>

<script src="{{ asset("bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.js") }}" ></script>

<script src="{{ asset("bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js") }}" ></script>

</body>
</html>
