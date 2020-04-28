

<!-- Segundo modal -->
<div id="busca" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h4 class="modal-title"> Seleccione el Residente</h4></center>
      </div>
      <div class="modal-body">

   <!-- Archivo JS-->
    <div classs="container">    
     <div class="box box-solid"> 
      <div class="box-body">
      <div class="row">
        <div class="col-xs-12">
        <table id="myTable" class=" table table-bordered table-striped">
          <thead>
            <th>ID</th>
            <th>Nombres</th>
            <th>Apellido</th>
            <th>Rut</th>
            <th>Etapa</th>
            <th><center>Opciones</center></th>

          </thead>
          <tbody>
            <?php
              include('ajax/db_connection.php');
              $sql = "SELECT * FROM residentes ";

              //use for MySQLi-OOP
              $query = $mysql->query($sql);
              while($row = $query->fetch_assoc()){
                  $nombre = $row['nombre'];
                  $apellido = $row['apellido'];
                
                echo 
                '<tr>
                  <td>'.$row['id_residente'].'</td>
                  <td>'.$row['nombre'].'</td>
                  <td>'.$row['apellido'].'</td>
                  <td>'.$row['rut'].'</td>
                  <td>'.$row['etapa_resi'].'</td>
                  
                  
                  <td align="center">
                        
                    <a href="#" onclick="alma('.$row['id_residente'].',\''.$row['nombre'].'\',\''.$row['apellido'].'\');" title="Seleccionar" class="btn btn-primary btn-sm" data-toggle="modal" data-dismiss="modal"><span class="glyphicon glyphicon-check"></span> </a>
                    
                    </td>
                </tr>';
               
              }

             
            ?>
          </tbody>
        </table>
      </div>
      </div>
    </div>
    </div>
    </div>

      </div>     
    </div>
  </div>
</div>


<script type="text/javascript">
  function alma(id,nom,ape){
     
    document.getElementById("id_residente").value = id;
    document.getElementById("nombre_residente").value = nom;
    document.getElementById("apellido_residente").value = ape;
  }

</script>




