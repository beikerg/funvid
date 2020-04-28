<!DOCTYPE html>
<html>
<head>
	<!--<link rel="stylesheet" type="text/css" href="css/estilo.css"> -->
	<title>DATATABLES</title>
</head>
<body>



	<h1>BUSQUEDA DE JUGADORES</h1>

	
		<label for="busquedas">Buscar</label>
		<input type="text" name="busquedas" id="busquedas"></input>

		
	

	<div id="lol"></div>
	
	
	<form action="ajax/residentes/addResidentes.php" method="POST">
	<div class="box-body">
        <div class="form-group">
           <label for="nombre">Nombre completo:</label>
           <input type="text" class="form-control" id="nombre" placeholder="Nombre Completo" >
         </div>
        <div class="form-group">
            <label for="apellido" >Apellidos:</label>
            <input type="text" class="required form-control" id="apellido" placeholder="Apellidos">
        </div> 
             
        
        <div class="form-group"> 
            <lavel for="rut" >Rut:</lavel>
            <input type="text" id="rut" class="form-control" data-inputmask='"mask": " 99.999.999-*"' data-mask>
        </div>

        <div class="form-group">
          <label for="sexo">Sexo:</label>
          <select class="form-control" id="sexo">
            <option></option>
            <option value"Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
          </select>
        </div>
       
        <div class="form-group">
            <lavel for="telefono" >Telefono:</lavel>
            <input type="text" id="telefono" class="form-control" data-inputmask='"mask": "+56 (9) 999-99-999"' data-mask>
        </div>
        
        <div class="form-group">
                <label for="fecha" >Fecha de nacimiento:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control pull-right" id="fecha">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
        
        <div class="form-group">
          <label for="nivel">Nivel de estudio:</label>
          <input type="text" class="form-control" id="nivel">
        </div>
  
        <div class="form-group">
          <label for="profesion">Profesion:</label>
          <input type="text" class="form-control" id="profesion">
        </div>

         <div class="form-group">
            <label for="direccion" >Dirección</label>
            <input type="text"class="form-control" id="direccion"  placeholder="Dirección">
        </div> 
         
      <div class="form-group">
            <label for="localidad" >Ciudad</label>
            <input type="text" class="form-control" id="localidad" placeholder="Ciudad">
        </div>
        
      <div class="form-group">
            <label for="provincia" >Comuna</label>
            <input type="text" class="form-control" id="provincia" placeholder="Comuna" >
        </div>
        
        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" class="form-control" id="correo" placeholder="Provincia" >
        </div>
      
        </div>
        </div>
      </div>
   

    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header width-border">
          <h3 class="box-title">Datos Familiar</h3>
        </div>
        <div class="box-body">
          
         <div class="form-group">
              <label for="nombre_f">Nombre completo:</label>
              <input type="text" name="nombre_f" id="nombre_f" class="form-control" placeholder="Nombre Completo" required>
            </div>

            <div class="form-group">
              <label for="apellido_f">Apellidos:</label>
              <input type="text" name="apellido_f" id="apellido_f" class="form-control" placeholder="Apellido" required>
            </div>

            <div class="form-group">
              <label for="rut_f">Rut:</label>
              <input type="text" name="rut_f" id="rut_f" class="form-control" required data-inputmask='"mask": " 99.999.999-*"' data-mask>
            </div>

            <div class="form-group">
              <label for="telefono_f">Telefono:</label>
              <input type="text" name="telefono_f" id="telefono_f" class="form-control" required data-inputmask='"mask": "+56 (9) 999-99-999"' data-mask>
            </div>

            <div class="form-group">
              <label for="direccion_f">Dirección:</label>
              <input type="text" name="direccion_f" id="direccion_f" class="form-control" required placeholder="Direccion">
            </div>

            <div class="form-group">
              <label for="localidad_f" >Localidad:</label>
              <input type="text" name="localidad_f" id="localidad_" class="form-control" required placeholder="Localidad">
            </div>

            <div class="form-group">
              <label for="provincia_f">Provincia:</label>
              <input type="text" name="provincia_f" id="provincia_f" class="form-control" required placeholder="Provincia">
            </div>

            <div class="form-group">
              <label for="parentesco_f" >Parentesco</label>
              <input type="text" name="parentesco_f" id="parentesco_f" class="form-control" required placeholder="Mamá, Papá, Hermano, etc.">
            </div>
			<input type="submit" value="resgistrar">
</form>



<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/buscar.js"></script>
</body>

</html>