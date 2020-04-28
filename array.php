





<?php

  $ar = implode("," , $_POST['ayuda']);

echo "<br>
      ".$_POST['id_residente']."<br>
      ".$_POST['nombre_residente']."<br>
      ".$_POST['apellido_residente']."<br>
      ".implode(", ", $_POST['ayuda'])."<br>
      ".$_POST['obser_ayuda']."<br>
      ".$_POST['fecha']."<br>
    ";



$array_equipo = array('portero', 'laterales', 'centrales', 'mediocentros', 'interiores', 'delanteros');
 
$cadena_equipo = implode(" , ", $array_equipo);
echo "El equipo separaro por ';' es el siguiente: " .$cadena_equipo;
 
$cadena_equipo2 = implode($array_equipo);
echo "<br><br>El equipo sin parámetro string es el siguiente: " .$cadena_equipo2."<br>";

?>

<textarea><?php echo $cadena_equipo; ?></textarea><br>

<?php 


$cadena = "uno,dos,tres,cuatro,cinco";
$array = explode(",", $cadena);
echo "<br><br>El número de elementos en el array es: " . count($array);

$miCadena  = "piece1 piece2 piece3 piece4 piece5 piece6";
$piezas = explode(" ", $miCadena);

?>

<textarea value="hola"><?php echo $piezas[1]; ?></textarea>




<html> 
<head> 
  <?php include("include/head.php");?>
</head> 
<body> 

  <script> 
function most(x) { 
  if(x==0) { 
    document.getElementById("f1")ckecked.style.display = 'block'; 
  } 
  else { 
    document.getElementById("f1").style.display = 'none';
  } 
} 
</script>
<div class="col-md-12">
  <div class="box box-solid">
    <div class="form-group col-md-4 col-xs-6">
            <h4>¿Tiene antecedentes legales?</h4>
        </div>
    <div class="form-group">
      <input type="radio" class="flat-red" name="penal" onclick="most(0)"> si
      <input type="radio" class="flat-red" name="penal" onclick="most(1)" checked> no
    </div>
  </div>
</div>

   <div id="f1" style="display: none">
    <div class="form-group col-md-12">
                    <label>Antecedentes</label>
                    <textarea type="text" name="" class="md-textarea form-control" rows="5"></textarea>
                  </div>
                
                
                  <div class="form-group col-md-12">
                    <label>Tramites o temas pendientes</label>
                    <textarea type="text" name=""  class="md-textarea form-control" rows="5"></textarea>
                  </div>
   </div>

            <div class="col-md-12">
              <div class="box box-solid">
                


                
                  <div class="form-group col-md-4 col-xs-6">
                    <h4>¿Tiene antecedentes legales?</h4>
                  </div>
                  <div class="form-group col-md-1 col-xs-3">
                    <h4>
                      <input type="radio" name="descrip" class="flat-red" onclick="most(0)">
                      Sí
                    </h4>  
                  </div>
                  <div class="form-group col-md-1 col-xs-3">
                    <h4> 
                      <input type="radio" name="descrip" class="flat-red" value="No" checked onclick="most(1)">
                      No 
                    </h4>
                  </div>
                
                

               

              </div>
            </div>
         
<?php include("include/scrip.php"); ?>
</body> 
</html>

<?php
$fecha=date('Y-m-d'); // tu sabrás como la obtienes, solo asegurate que tenga este formato 
$dias= 2; // los días a restar 

echo "<h1>".date("Y-m-d", strtotime("$fecha -13 day"))."</h1>";  
 ?>


 <input type="button" value="¡A Darle! " onclick="darle('casa');">

 <script type="text/javascript">
   function darle(id)
   {
    var c = id.val();
    
   }
 </script>

<br><br>

 <?php 

$i = '';
$num = '';
  while($i < 10) {
    $i++;
    $num += 2;
  echo 'La variable $i vale: ' . $i.' + '.$num.' <br>' ;
  } 
  

 ?>