<script src="<?php echo base_url();?>media/graficos/js/highcharts.js"></script>
<script src="<?php echo base_url();?>media/graficos/js/modules/exporting.js"></script>

<ul class="nav nav-tabs nav-stacked span2 offset1" id="navegacion">
              <li class="active"><a href="#estadisticas">Estadisticas</a></li>
              <li><a href="#totales">Estadisticas Totales</a></li>
              <li><a href="#municipales">Estadisticas Municipales</a></li>
              <li><a href="#parroquiales">Estadisticas Parroquiales</a></li>
</ul>
<form class="span8"  id="form-paciente" class="scrollspy-example" data-target="#navegacion" >
			<!--action="http://mujervf.fsbolivar.com.ve/estadistica/getMunicipales" method="post">-->
<!--<form class="span10 offset1" action="http://mujervf.fsbolivar.com.ve/paciente/editar" method="post">-->
	<h2 id="titulo_estadisticas">Estadisiticas</h2>
	<div class="row-fluid">
		<div class="controls">
				<div class="input-prepend span3">
					<label>Fecha Inicio</label>
					<span class="add-on"><i class="icon-calendar"></i></span>
					<input class="span9 fecha" name="fecha_inicio"  id="fecha_inicio" type="text" placeholder="Fecha Inicio" maxlength="20" required>
				</div>		
		</div>
		<div class="controls">
				<div class="input-prepend span3">
					<label>Fecha Fin</label>
					<span class="add-on"><i class="icon-calendar"></i></span>
					<input class="span9 fecha" name="fecha_final"   id="fecha_final" type="text" placeholder="Fecha Fin" maxlength="20" required>
				</div>		
		</div>	
		<div class="controls">
				<div class="input-prepend span1">
					<label style="color:#fff;">Buscar</label>
					<button class="btn btn-info " type="button" id="_buscar_fecha"><i class="icon-search icon-white"></i>Buscar</button>
					<!--<input type="submit">-->
				</div>		
		</div>
	</div>
	<ul class="nav nav-pills">
			<li class="active">
				<a href="<?php echo base_url();?>atletas_admin/pdf_estadistica" target="_blank">Descargar PDF <i class='icon-download-alt'></i></a>
			</li>
	</ul>
	<fieldset>
		<legend><h4 id="totales"><i class="icon-file"></i> Estadisticas Totales</h4></legend>
		<table id="tabla" class="table table-hover table-bordered table-striped" >
			<tr>
				<th>Total de pacientes atendidos	</th>
				<th id="total_atendidos"><?php echo $total_atendidos; ?></th>
			</tr>
			<tr>
				<th>Total de pacientes esterilizadas	</th>
				<th id="total_esterilizadas"><?php echo $total_esterilizadas; ?></th>
			</tr>
			<tr>
				<th>Total de pacientes en tratamiento quirurgico</th>
				<th id="total_tratamiento"><?php echo $total_tratamiento; ?></th>
			</tr>
			<tr></tr>
		</table>
		
	</fieldset>
	
	<fielset style="margin-top: 50px;">
		<legend><h4 id="municipales"><i class="icon-file"></i> Estadisticas Municipales</h4></legend>
		<table class="table table-hover table-bordered table-striped " id="tabla_municipales">
				<thead>
					<tr style="background:#802c59; color: #FFF ">
						<th class="span6">Municipio</th>
						<th class="span2">Atendidos</th>
						<th class="span2">Exterilizados</th>
						<th class="span2">Tra. Quirurgico</th>
					</tr>
				</thead>
				<tbody>
				<?php
				foreach ($municipales as $row)
				{
					$totalsi = 0+$row->totalsi;
					$totaltq = 0+$row->totaltq;
					$str = '<tr  style="text-transform: uppercase">'.
						'<td class="centrado">'.$row->detalle.'</td>'.
						'<td class="centrado">'.$row->totalcompleto.'</td>'.
						'<td class="centrado">'.$totalsi.'</td>'.
						'<td class="centrado">'.$totaltq.'</td>'.
						'</tr>';
					echo $str;
				}
				?>
				</tbody>
		</table>
		
		<div id="grafica_total"  class="hidden" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
	</fieldset>
	
	<fieldset style="margin-top: 50px;">
		<legend><h4 id="parroquiales"><i class="icon-file"></i> Estadisticas Parroquiales</h4></legend>
		<div class="row-fluid">
			<div class="controls">
					<div class="input-prepend span3">
						<label>Municipio</label>
						<span class="add-on"><i class="icon-home"></i></span>
						<select class="span9" name="municipio" id="_municipio">
							<option value="NULL">--Municipio--</option>
							<?php foreach ($municipios as $row)
								{
									$str = '<option value ='.$row->id.'>'.$row->detalle.'</option>';
									echo $str;
								} ?>
						</select>
					</div>		
			</div>
<!--			<div class="controls">
					<div class="input-prepend span1">
						<label style="color:#fff;">Buscar</label>
						<button class="btn btn-info " type="button" id="_guardar"><i class="icon-search icon-white"></i>Buscar</button>
					</div>		
			</div>-->
		</div>
		<table class="table table-hover table-bordered table-striped" id="tabla_parroquiales">
				<thead>
					<tr style="background:#802c59; color: #FFF ">
						<th class="span6">Parroquia</th>
						<th class="span2">Atendidos</th>
						<th class="span2">Exterilizados</th>
						<th class="span2">Tra. Quirurgico</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
		</table>
	</fieldset>
</form>

<script type="text/javascript">var tb = '<?php echo $tb;?>';</script>
<script src="<?php echo base_url();?>media/funcion_js/fn_estadisticas.js"></script>