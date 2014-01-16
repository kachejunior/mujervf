<!DOCTYPE html>
<html lang="es">
	<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta name="description" content="">
			<meta name="author" content="">
			<title>Mujer Vida y Futuro</title>
			<script type="text/javascript">var base_url = '<?php echo base_url();?>';</script>	</head>
	
			<link rel="stylesheet" href="<?php echo base_url();?>media/bootstrap3/dist/css/bootstrap-unity.min.css" type="text/css" media="all">
			<style>
				body {
					padding-top: 70px;
				}
			</style>
	</head>

	<body>

		 <div class="navbar navbar-inverse navbar-fixed-top">
			 <div class="container">
				 <div class="navbar-header">
					 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						 <span class="icon-bar"></span>
						 <span class="icon-bar"></span>
						 <span class="icon-bar"></span>
					 </button>
					 <a class="navbar-brand" href="#"><img src="<?php echo base_url()?>media/img/logos/logomv-white.png" heigth="20" width="20" style="margin-rigth:5px;"> Mujer Vida y Futuro</a>
				 </div>
				 <div class="collapse navbar-collapse">
					 <ul class="nav navbar-nav">
						 <li class="active"><a href="#">Home</a></li>
						 <li><a href="#about">About</a></li>
						 <li><a href="#contact">Contact</a></li>
					 </ul>
				 </div><!--/.nav-collapse -->
			 </div>
		 </div>

		 <div class="container panel panel-default">
			 <h2 class="panel-heading">Registro Paciente <small>Agregado por carlos</small></h2>
			 <fieldset class="panel-body">
				 <legend>Datos Personales</legend>
				 <div class="form-group col-lg-3">
					<label>Cedula</label>
					<input type="text" class="form-control" name="cedula" placeholder="v-999999999">
				 </div>
				 <div class="form-group col-lg-3">
					<label>Nombre</label>
					<input type="text" class="form-control" name="nombre" placeholder="Nombre">
				</div>
				 <div class="form-group col-lg-3">
					<label>Apellido</label>
					<input type="text" class="form-control" name="apellido" placeholder="Apellido">
				</div>
				 <div class="form-group col-lg-3">
					<label>Fecha nacimiento</label>
					<input type="date" class="form-control" name="fecha_nacimiento" placeholder="dd-mm-aaaa">
				</div>
				 <div class="form-group col-lg-3">
					<label>Telefono 1</label>
					<input type="tel" class="form-control" name="telefono1" placeholder="0xxx-xxxxxxx">
				</div>
				 <div class="form-group col-lg-3">
					<label>Telefono 2</label>
					<input type="tel" class="form-control" name="telefono2" placeholder="0xxx-xxxxxxx">
				</div>
				 <legend>Datos de Ubicacion</legend>
				 <div class="form-group col-lg-12">
					<label>Direccion</label>
					<input type="text" class="form-control" name="direccion" placeholder="Direccion">
				</div>
				 <div class="form-group col-lg-3">
					<label>Municipio</label>
					<select class="form-control" name="municipio" id="_municipio"></select>
				</div>
				 <div class="form-group col-lg-3">
					<label>Parroquia</label>
					<select class="form-control" name="parroquia" id="parroquia">
						<option>-- Municipio --</option>
					</select>
				</div>
				 <legend>Datos de Atencion</legend>
				 <div class="form-group col-lg-3">
					<label>Fecha Atencion</label>
					<input type="date" class="form-control" name="fecha_atencion" placeholder="dd-mm-aaaa">
				</div>
				 <div class="form-group col-lg-3">
					<label>Numero de Hijos</label>
					<input type="number" class="form-control" name="n_hijos" min="0" value="0">
				</div>
				 <div class="form-group col-lg-3">
					 <label>Estatus</label>
					<select class="form-control" name="esterilizada" id="parroquia">
						<option>-- Estatus --</option>
					</select>
				</div>
				<div class="form-group col-lg-3">
					<label>Fecha de Esterilizacion</label>
					<input type="date" class="form-control" name="fecha_esterilizacion" placeholder="dd-mm-aaaa">
				</div>
				<div class="form-group col-lg-12">
					<label>Observacion</label>
					<input type="text" class="form-control" name="observacion" placeholder="Observacion">
				</div>
				<input name="bandera" type="hidden" value="0">
			 </fieldset>
			<div class="panel-footer">
				<div class="btn-group">
				<button type="button" class="btn btn-danger"  id="_cerrar"><span class="glyphicon glyphicon-backward"></span> Retornar</button>
				<button type="button" class="btn btn-success" id="_guardar"><span class="glyphicon glyphicon-ok"></span> Guardar</button>
				</div>
				<div class="alert alert-success" style="margin-top:10px;">...</div>
			</div>
		</div>

		 <script type="text/javascript" src="<?php echo base_url();?>media/js/jquery.js"></script>
	 <script type="text/javascript" src="<?php echo base_url();?>media/bootstrap3/dist/js/bootstrap.min.js"></script>
	 </body>
</html>