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
            <th><center>Opciones</center></th>

          </thead>
          <tbody>
            <?php
              include('ajax/db_connection.php');
              $sql = "SELECT * FROM residentes ";

              //use for MySQLi-OOP
              $query = $mysql->query($sql);
              while($row = $query->fetch_assoc()){
                echo 
                "<tr>
                  <td>".$row['id_residente']."</td>
                  <td>".$row['nombre']."</td>
                  <td>".$row['apellido']."</td>
                  <td>".$row['rut']."</td>
                  
                  
                  <td align='center'>

                    <a href='terapiaGrupal.php?id=".$row['id_residente']."' title='Seleccionar' class='btn btn-primary btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-check'></span> </a>
                    
                  </td>
                </tr>";
                
              }


            ?>
          </tbody>
        </table>
      </div>
      </div>
    </div>
    </div>
    </div>