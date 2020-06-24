    <div classs="container"> 
     <div class="box box-solid"> 
      <div class="box-body table-responsive no-padding">
     <!--  <div class="row"> -->
        <div class="col-xs-12">
         
        <table id="" class="display table table-bordered table-striped dt-responsive nowrap">
          <thead>
            <th>ID</th>
            <th>Terapeuta</th>
            <th>Temática</th>
            <th>Fecha</th>
            <th><center>Opciones</center></th>

          </thead>
          <tbody>
            <?php
              include('ajax/db_connection.php');
              $sql = "SELECT * FROM t_sensei ORDER BY fecha_ts DESC";

              //use for MySQLi-OOP
              $query = $mysql->query($sql);
              while($row = $query->fetch_assoc()){
                echo 
                "<tr>
                  <td>".$row['id_ts']."</td>
                  <td>".$row['terapeuta_ts']."</td>
                  <td>".$row['tematica_ts']."</td>
                  <td>".date('d-m-Y', strtotime($row['fecha_ts']))."</td>
                  
                  
                  <td align='center'>
      
                    
                    <a title='Editar' href='editarTs.php?id=".$row['id_ts']."' class='btn btn-warning'><i class='glyphicon glyphicon-pencil'></i></a>

                    <a class='btn btn-danger' title='Eliminar' href='#' onclick='preguntar(".$row['id_ts'].")'><i class='glyphicon glyphicon-trash'></i></a> 

                    <a href='genera_pdf/TInfo.php?id=".$row['id_ts']."' class='btn btn-info'><i class='fa fa-file-pdf-o'></i> <strong>PDF <strong></a>

                    
                    
                  </td>
                </tr>";
                
              }


            ?>
          </tbody>
        </table>
      </div>
      <!--</div> -->
    </div>
    </div>
    </div>