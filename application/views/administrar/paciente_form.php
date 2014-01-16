<form class="span10 offset1"  id="form-paciente">
<h2>Datos de Paciente <small class="text-info" id="agregado"></small></h2>                                                        
		<fieldset>
			<legend>Datos Personales</legend>
			<div class="controls">
				<div class="input-prepend span3">
					<label>Cedula</label>
					<span class="add-on"><i class="icon-barcode"></i></span>
					<input class="span9 cedula" name="cedula" id="cedula" type="text" placeholder="Ejem: V-5555555" >
					<input name="bandera" type="hidden" value="0">
				</div>
			</div>
			<div class="controls">
				<div class="input-prepend span3">
					<label>Nombre</label>
					<span class="add-on"><i class="icon-user"></i></span>
					<input class="span9" name="nombre" type="text" placeholder="Nombre" maxlength="255" required  onkeyup="aMays(event, this)">
				</div>		
			</div>
			<div class="controls">
				<div class="input-prepend span3">
					<label>Apellido</label>
					<span class="add-on"><i class="icon-user"></i></span>
					<input class="span9" name="apellido" type="text" placeholder="Apellido" maxlength="255" required  onkeyup="aMays(event, this)">
				</div>		
			</div>
			<div class="controls">
				<div class="input-prepend span3">
					<label>Fecha de Nacimiento</label>
					<span class="add-on"><i class="icon-calendar"></i></span>
					<input class="span9 fecha2" name="fecha_nacimiento"   id="fecha_nacimiento" type="text" placeholder="dd-mm-aaaa" maxlength="20" required>
				</div>		
			</div>
			<div class="controls">
				<div class="input-prepend span3">
					<label>Telefono1</label>
					<span class="add-on"><i class="icon-headphones"></i></span>
					<input class="span9 telefono " name="telefono1" type="text" placeholder="Telefono1" maxlength="20" required>
				</div>		
			</div>
			<div class="controls">
				<div class="input-prepend span3">
					<label>Telefono2</label>
					<span class="add-on"><i class="icon-headphones"></i></span>
					<input class="span9 telefono" name="telefono2" type="text" placeholder="Telefono2" maxlength="20" >
				</div>		
			</div>
		</fieldset>
		<fieldset>
			<legend>Datos de Direccion</legend>
			<div class="controls">
				<div class="input-prepend span12">
					<label>Direccion</label>
					<span class="add-on"><i class="icon-home"></i></span>
					<input class="span10" name="direccion" type="text" placeholder="Direccion"  onkeyup="aMays(event, this)">
				</div>		
			</div>
			<div class="controls">
				<div class="input-prepend span3">
					<label>Municipio</label>
					<span class="add-on"><i class="icon-home"></i></span>
					<select class="span9" name="municipio" id="_municipio">
						<option>--Municipio--</option>
						<?php foreach ($municipios as $row)
								{
									$str = '<option value ='.$row->id.'>'.$row->detalle.'</option>';
									echo $str;
								} 		
						?>
					</select>
				</div>		
			</div>
			<div class="controls">
				<div class="input-prepend span3">
					<label>Parroquia</label>
					<span class="add-on"><i class="icon-home"></i></span>
					<select class="span9" name="parroquia" id="parroquia">
						<option>--Parroquia--</option>
					</select>
				</div>		
			</div>
		</fieldset>
		<fieldset>
			<legend>Datos de Atencion</legend>
			<div class="controls">
				<div class="input-prepend span3">
					<label>Fecha de Atencion</label>
					<span class="add-on"><i class="icon-calendar"></i></span>
					<input class="span9 fecha2" name="fecha_atencion"  id="fecha_atencion" type="text" placeholder="dd-mm-aaaa" maxlength="20" required>
				</div>		
			</div>
			<div class="controls">
				<div class="input-prepend span3">
					<label>Numero de Hijos</label>
					<span class="add-on"><i class="icon-signal"></i></span>
					<input class="span9 positive-integer" name="n_hijos" type="number" min="0" value="0"  required>
				</div>		
			</div>
			<div class="controls">
				<div class="input-prepend span3">
					<label>Esterilizada</label>
					<span class="add-on"><i class="icon-ok"></i></span>
					<select class="span9" name="esterilizada">
						<option value="no">En Proceso</option>
						<option value="si">Esterilizada</option>
						<option value="tq">Tratamiento Quirurgico</option>
					</select>
				</div>		
			</div>
			<div class="controls">
				<div class="input-prepend span3">
					<label>Fecha de Esterilizacion</label>
					<span class="add-on"><i class="icon-calendar"></i></span>
					<input class="span9 fecha2" name="fecha_esterilizacion" id="fecha_esterilizacion" type="text" placeholder="dd-mm-aaaa" maxlength="20">
					<span class="help-block">aaaa-mm-dd</span>
				</div>		
			</div>
			<div class="controls">
				<div class="input-prepend span12">
					<label>Observacion</label>
					<span class="add-on"><i class="icon-search"></i></span>
					<input class="span10" name="observacion" type="text" placeholder="observacion"   onkeyup="aMays(event, this)">
				</div>		
			</div>
		</fieldset>

    <div class="modal-footer">
			<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true" id="_cerrar"><i class="icon-backward icon-white"></i> Retornar</button>
		    <button class="btn btn-info" type="button" id="_guardar"><i class="icon-ok icon-white"></i> Guardar</button>
		<!--<input type="submit">-->
	</div>
		<!--<input type="submit">-->
</form>

<script type="text/javascript">var tb = '<?php echo $tb;?>';</script>
<script src="<?php echo base_url();?>media/funcion_js/fn_paciente.js"></script>