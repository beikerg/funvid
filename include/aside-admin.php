<?php 

$admin_root ='<li class="treeview menu-open" style="height: auto;">
<a href="#">
  <i class="fa fa-share"></i> <span> Residentes</span>
  <span class="pull-right-container">
    <i class="fa fa-angle-left pull-right"></i>
  </span>
</a>
<ul class="treeview-menu" style="display: block;">

<li class="treeview" style="height: auto;">
<a href="#"><i class="fa fa-circle-o"></i> Ficha <span class="pull-right-container">
    <i class="fa fa-angle-left pull-right"></i>
  </span>
</a>
<ul class="treeview-menu" style="display: none;">
  <li><a href="residente.php"><i class="fa fa-circle-o"></i> Residentes </a></li>
  <li><a href="abandono.php"><i class="fa fa-circle-o"></i> Abandono </a></li>
</ul>
</li>


  <li class="treeview" style="height: auto;">
    <a href="#"><i class="fa fa-circle-o"></i> Terapias
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu" style="display: none;">
      <li class="treeview" style="height: auto;">
        <a href="#"><i class="fa fa-circle-o"></i> Conductuales
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="display: none;">
          <li><a href="ListaTConf.php"><i class="fa fa-circle-o"></i> Activación Conductual</a></li>
          <li><a href="ListaTAvanzada.php"><i class="fa fa-circle-o"></i> Avanzada</a></li>
          <li><a href="ListaTEspecial.php"><i class="fa fa-circle-o"></i> Especial</a></li>
          <li><a href="ListaTEducador.php"><i class="fa fa-circle-o"></i> Reunión Educadores</a></li>
          <li><a href="ListaTGa.php"><i class="fa fa-circle-o"></i> Grupo Atrás</a></li>
        </ul>
      </li>

      <li class="treeview" style="height: auto;">
        <a href="#"><i class="fa fa-circle-o"></i> Cognitivas
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="display: none;">
          <li><a href="ListaTerapiaRelatoPase.php"><i class="fa fa-circle-o"></i> Relato de pase</a></li>
          <li><a href="ListaTGrupal.php"><i class="fa fa-circle-o"></i> Grupal / Exponencial</a></li>
          <li><a href="ListaTedu.php"><i class="fa fa-circle-o"></i> Educativa</a></li>
          <li><a href="ListaTNeuro.php"><i class="fa fa-circle-o"></i> Neuroplasticidad</a></li>
          <li><a href="ListaTMayeutica.php"><i class="fa fa-circle-o"></i> Mayéutica</a></li>
          <li><a href="ListaTEmocional.php"><i class="fa fa-circle-o"></i> Menejo emocional</a></li>
        </ul>
      </li>

      <li class="treeview" style="height: auto;">
        <a href="#"><i class="fa fa-circle-o"></i> Complementarias
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="display: none;">
          <li><a href="ListaTInf.php"><i class="fa fa-circle-o"></i> Reflexión</a></li>
         <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Familiar</a></li> -->
          <li><a href="ListaTs.php"><i class="fa fa-circle-o"></i> Sensei</a></li>
        </ul>
      </li>

    </ul>
  </li>

  
  <li class="treeview" style="height: auto;">
    <a href="#"><i class="fa fa-circle-o"></i> Psicologo
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu" style="display: none;">
      <li><a href="consultaPsicologia.php"><i class="fa fa-circle-o"></i> Consultas</a></li>
     <!-- <li><a href="#"><i class="fa fa-circle-o"></i> PTI</a></li> -->
    <!--  <li><a href="#"><i class="fa fa-circle-o"></i> Epicrisis</a></li>  --> 
    </ul>
  </li>

  <li class="treeview" style="height: auto;">
    <a href="#"><i class="fa fa-circle-o"></i> Introvisación
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu" style="display: none;">
      <li><a href="ListaIntro.php"><i class="fa fa-circle-o"></i> Activos</a></li>
      <li><a href="ListaIntroH.php"><i class="fa fa-circle-o"></i> Históricos</a></li>
      <li><a href="ListaIntroAct.php"><i class="fa fa-circle-o"></i> Psicólogo</a></li>     
    </ul>
  </li>

  <li class="treeview" style="height: auto;">
    <a href="ListaPTI.php"><i class="fa fa-circle-o"></i> PTI 
   <!-- QUITAR ESTA LINEA --> <span class="pull-right-container"><small class="label pull-right bg-green"> new </small></span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu" style="display: none;">
      <li><a href="ListaPTI.php"><i class="fa fa-circle-o"></i> Plan de tratamiento</a></li>
      
      <li><a href="ListaSegPTI.php"><i class="fa fa-circle-o"></i> Seguimiento</a></li> 
    </ul>
  </li>

  <!-- <li class="treeview" style="height: auto;">
    <a href="#"><i class="fa fa-circle-o"></i> Pases <small class="label pull-right bg-blue"> Pronto </small>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu" style="display: none;">
      <li><a href="#"><i class="fa fa-circle-o"></i> Entrega de Pases 
      <span class="pull-right-container"><small class="label pull-right bg-blue"> Pronto </small></span></a></li>
      <li><a href="#"><i class="fa fa-circle-o"></i> Historial 
      <span class="pull-right-container"><small class="label pull-right bg-blue"> Pronto </small></span></a></li>  
    </ul>
  </li> -->

  <li><a href="#" data-toggle="modal" data-target="#selec_resi" ><i class="fa fa-circle-o"></i> API</a></li>
  <li><a href="ayudas.php"><i class="fa fa-circle-o"></i> Ayudas</a></li>
  <li><a href="#" data-toggle="modal" data-target="#controlSalida" ><i class="fa fa-circle-o"></i> Control de salidas</a></li>
 <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Delegaciones 
  <span class="pull-right-container"><small class="label pull-right bg-blue"> Pronto </small></span>
  </a></li> -->
  <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Medicamentos</a></li> -->
</ul>
</li>

<!--  Administración  -->

<li class="treeview menu-open" style="height: auto;">
<a href="#">
  <i class="fa fa-share"></i> <span> Administración</span>
  <span class="pull-right-container">
    <i class="fa fa-angle-left pull-right"></i>
  </span>
</a>
<ul class="treeview-menu" style="display: block;">
  
  <li class="treeview" style="height: auto;">
    <a href="#"><i class="fa fa-circle-o"></i> Admin. Usuarios <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu" style="display: none;">
      <li><a href="usuarios.php"><i class="fa fa-circle-o"></i> Usuarios Sistema</a></li>
    </ul>
  </li>
  <li><a href="terapeuta.php"><i class="fa fa-circle-o"></i> Terapeutas <span class="pull-right-container"><small class="label pull-right bg-green"> new </small></span></a></li>
  <li><a href="ListaCaja.php"><i class="fa fa-circle-o"></i> Caja Residentes</a></li>
  <li><a href="LisPagoU.php"><i class="fa fa-circle-o"></i> Pagos</a></li>
  <li><a href="calendario.php"><i class="fa fa-circle-o"></i> Agenda</a></li>
  <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Delegaciones </a></li> -->

</ul>
</li>

   <!-- Reducados menú -->

<li class="treeview menu-open" style="height: auto;">
<a href="#">
  <i class="fa fa-share"></i> <span> Reeducados</span>
  <span class="pull-right-container">
    <i class="fa fa-angle-left pull-right"></i>
  </span>
</a>
<ul class="treeview-menu" style="display: block;">
  
  <li class="treeview" style="height: auto;">
    <a href="#"><i class="fa fa-circle-o"></i> Ficha <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu" style="display: none;">
      <li><a href="LReducado.php"><i class="fa fa-circle-o"></i> Reeducados </a></li>
      <li><a href="abandono.php"><i class="fa fa-circle-o"></i> Abandono </a></li>
    </ul>
  </li>

  <li><a href="reducado.php"><i class="fa fa-circle-o"></i> Seguimiento Reducado </a></li>
 <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Plan de tratamiento </a></li> -->

</ul>
</li>

';

$super_admin ='<li class="treeview menu-open" style="height: auto;">
<a href="#">
  <i class="fa fa-share"></i> <span> Residentes</span>
  <span class="pull-right-container">
    <i class="fa fa-angle-left pull-right"></i>
  </span>
</a>
<ul class="treeview-menu" style="display: block;">

<li class="treeview" style="height: auto;">
<a href="#"><i class="fa fa-circle-o"></i> Ficha <span class="pull-right-container">
    <i class="fa fa-angle-left pull-right"></i>
  </span>
</a>
<ul class="treeview-menu" style="display: none;">
  <li><a href="residente.php"><i class="fa fa-circle-o"></i> Residentes </a></li>
  <li><a href="abandono.php"><i class="fa fa-circle-o"></i> Abandono </a></li>
</ul>
</li>


  <li class="treeview" style="height: auto;">
    <a href="#"><i class="fa fa-circle-o"></i> Terapias
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu" style="display: none;">
      <li class="treeview" style="height: auto;">
        <a href="#"><i class="fa fa-circle-o"></i> Conductuales
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="display: none;">
          <li><a href="ListaTConf.php"><i class="fa fa-circle-o"></i> Activación Conductual</a></li>
          <li><a href="ListaTAvanzada.php"><i class="fa fa-circle-o"></i> Avanzada</a></li>
          <li><a href="ListaTEspecial.php"><i class="fa fa-circle-o"></i> Especial</a></li>
          <li><a href="ListaTEducador.php"><i class="fa fa-circle-o"></i> Reunión Educadores</a></li>
          <li><a href="ListaTGa.php"><i class="fa fa-circle-o"></i> Grupo Atrás</a></li>
        </ul>
      </li>

      <li class="treeview" style="height: auto;">
        <a href="#"><i class="fa fa-circle-o"></i> Cognitivas
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="display: none;">
          <li><a href="ListaTerapiaRelatoPase.php"><i class="fa fa-circle-o"></i> Relato de pase</a></li>
          <li><a href="ListaTGrupal.php"><i class="fa fa-circle-o"></i> Grupal / Exponencial</a></li>
          <li><a href="ListaTedu.php"><i class="fa fa-circle-o"></i> Educativa</a></li>
          <li><a href="ListaTNeuro.php"><i class="fa fa-circle-o"></i> Neuroplasticidad</a></li>
          <li><a href="ListaTMayeutica.php"><i class="fa fa-circle-o"></i> Mayéutica</a></li>
          <li><a href="ListaTEmocional.php"><i class="fa fa-circle-o"></i> Menejo emocional</a></li>
        </ul>
      </li>

      <li class="treeview" style="height: auto;">
        <a href="#"><i class="fa fa-circle-o"></i> Complementarias
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="display: none;">
          <li><a href="ListaTInf.php"><i class="fa fa-circle-o"></i> Reflexión</a></li>
         <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Familiar</a></li> -->
          <li><a href="ListaTs.php"><i class="fa fa-circle-o"></i> Sensei</a></li>
        </ul>
      </li>

    </ul>
  </li>

  
  
  <li class="treeview" style="height: auto;">
    <a href="#"><i class="fa fa-circle-o"></i> Introvisación
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu" style="display: none;">
      <li><a href="ListaIntro.php"><i class="fa fa-circle-o"></i> Activos</a></li>
      <li><a href="ListaIntroH.php"><i class="fa fa-circle-o"></i> Históricos</a></li>
      <li><a href="ListaIntroAct.php"><i class="fa fa-circle-o"></i> Psicólogo</a></li>     
    </ul>
  </li>

  <li class="treeview" style="height: auto;">
    <a href="ListaPTI.php"><i class="fa fa-circle-o"></i> PTI 
   <!-- QUITAR ESTA LINEA --> <span class="pull-right-container"><small class="label pull-right bg-green"> new </small></span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu" style="display: none;">
      <li><a href="ListaPTI.php"><i class="fa fa-circle-o"></i> Plan de tratamiento</a></li>
      
      <li><a href="ListaSegPTI.php"><i class="fa fa-circle-o"></i> Seguimiento</a></li> 
    </ul>
  </li>

  <!-- <li class="treeview" style="height: auto;">
    <a href="#"><i class="fa fa-circle-o"></i> Pases <small class="label pull-right bg-blue"> Pronto </small>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu" style="display: none;">
      <li><a href="#"><i class="fa fa-circle-o"></i> Entrega de Pases 
      <span class="pull-right-container"><small class="label pull-right bg-blue"> Pronto </small></span></a></li>
      <li><a href="#"><i class="fa fa-circle-o"></i> Historial 
      <span class="pull-right-container"><small class="label pull-right bg-blue"> Pronto </small></span></a></li>  
    </ul>
  </li> -->

  <li><a href="#" data-toggle="modal" data-target="#selec_resi" ><i class="fa fa-circle-o"></i> API</a></li>
  <li><a href="ayudas.php"><i class="fa fa-circle-o"></i> Ayudas</a></li>
  <li><a href="#" data-toggle="modal" data-target="#controlSalida" ><i class="fa fa-circle-o"></i> Control de salidas</a></li>
 <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Delegaciones 
  <span class="pull-right-container"><small class="label pull-right bg-blue"> Pronto </small></span>
  </a></li> -->
  <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Medicamentos</a></li> -->
</ul>
</li>

<!--  Administración  -->

<li class="treeview menu-open" style="height: auto;">
<a href="#">
  <i class="fa fa-share"></i> <span> Administración</span>
  <span class="pull-right-container">
    <i class="fa fa-angle-left pull-right"></i>
  </span>
</a>
<ul class="treeview-menu" style="display: block;">
  
  <li class="treeview" style="height: auto;">
    <a href="#"><i class="fa fa-circle-o"></i> Admin. Usuarios <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu" style="display: none;">
      <li><a href="usuarios.php"><i class="fa fa-circle-o"></i> Usuarios Sistema</a></li>
    </ul>
  </li>
  <li><a href="terapeuta.php"><i class="fa fa-circle-o"></i> Terapeutas <span class="pull-right-container"><small class="label pull-right bg-green"> new </small></span></a></li>
  <li><a href="ListaCaja.php"><i class="fa fa-circle-o"></i> Caja Residentes</a></li>
  <!-- <li><a href="LisPagoU.php"><i class="fa fa-circle-o"></i> Pagos</a></li> -->
  <li><a href="calendario.php"><i class="fa fa-circle-o"></i> Agenda</a></li>
  <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Delegaciones </a></li> -->

</ul>
</li>

   <!-- Reducados menú -->

<li class="treeview menu-open" style="height: auto;">
<a href="#">
  <i class="fa fa-share"></i> <span> Reeducados</span>
  <span class="pull-right-container">
    <i class="fa fa-angle-left pull-right"></i>
  </span>
</a>
<ul class="treeview-menu" style="display: block;">
  
  <li class="treeview" style="height: auto;">
    <a href="#"><i class="fa fa-circle-o"></i> Ficha <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu" style="display: none;">
      <li><a href="LReducado.php"><i class="fa fa-circle-o"></i> Reeducados </a></li>
      <li><a href="abandono.php"><i class="fa fa-circle-o"></i> Abandono </a></li>
    </ul>
  </li>

  <li><a href="reducado.php"><i class="fa fa-circle-o"></i> Seguimiento Reducado </a></li>
 <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Plan de tratamiento </a></li> -->

</ul>
</li>

';
$psicologo ='<li class="treeview menu-open" style="height: auto;">
<a href="#">
  <i class="fa fa-share"></i> <span> Residentes</span>
  <span class="pull-right-container">
    <i class="fa fa-angle-left pull-right"></i>
  </span>
</a>
<ul class="treeview-menu" style="display: block;">

<li class="treeview" style="height: auto;">
<a href="#"><i class="fa fa-circle-o"></i> Ficha <span class="pull-right-container">
    <i class="fa fa-angle-left pull-right"></i>
  </span>
</a>
<ul class="treeview-menu" style="display: none;">
  <li><a href="residente.php"><i class="fa fa-circle-o"></i> Residentes </a></li>
  <li><a href="abandono.php"><i class="fa fa-circle-o"></i> Abandono </a></li>
</ul>
</li>
  
  <li class="treeview" style="height: auto;">
    <a href="#"><i class="fa fa-circle-o"></i> Psicologo
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu" style="display: none;">
      <li><a href="consultaPsicologia.php"><i class="fa fa-circle-o"></i> Consultas</a></li>
     <!-- <li><a href="#"><i class="fa fa-circle-o"></i> PTI</a></li> -->
    <!--  <li><a href="#"><i class="fa fa-circle-o"></i> Epicrisis</a></li>  --> 
    </ul>
  </li>

  <li class="treeview" style="height: auto;">
    <a href="#"><i class="fa fa-circle-o"></i> Introvisación
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu" style="display: none;">
      <!-- <li><a href="ListaIntro.php"><i class="fa fa-circle-o"></i> Activos</a></li> -->
      <li><a href="ListaIntroH.php"><i class="fa fa-circle-o"></i> Históricos</a></li>
      <li><a href="ListaIntroAct.php"><i class="fa fa-circle-o"></i> Psicólogo</a></li>     
    </ul>
  </li>

  <li class="treeview" style="height: auto;">
    <a href="ListaPTI.php"><i class="fa fa-circle-o"></i> PTI 
   <!-- QUITAR ESTA LINEA --> <span class="pull-right-container"><small class="label pull-right bg-green"> new </small></span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu" style="display: none;">
      <li><a href="ListaPTI.php"><i class="fa fa-circle-o"></i> Plan de tratamiento</a></li>
      
      <li><a href="ListaSegPTI.php"><i class="fa fa-circle-o"></i> Seguimiento</a></li>  
    </ul>
  </li>

  <!-- <li class="treeview" style="height: auto;">
    <a href="#"><i class="fa fa-circle-o"></i> Pases <small class="label pull-right bg-blue"> Pronto </small>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu" style="display: none;">
      <li><a href="#"><i class="fa fa-circle-o"></i> Entrega de Pases 
      <span class="pull-right-container"><small class="label pull-right bg-blue"> Pronto </small></span></a></li>
      <li><a href="#"><i class="fa fa-circle-o"></i> Historial 
      <span class="pull-right-container"><small class="label pull-right bg-blue"> Pronto </small></span></a></li>  
    </ul>
  </li> -->

  <li><a href="#" data-toggle="modal" data-target="#selec_resi" ><i class="fa fa-circle-o"></i> API</a></li>
  <li><a href="ayudas.php"><i class="fa fa-circle-o"></i> Ayudas</a></li>
  <li><a href="#" data-toggle="modal" data-target="#controlSalida" ><i class="fa fa-circle-o"></i> Control de salidas</a></li>
 <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Delegaciones 
  <span class="pull-right-container"><small class="label pull-right bg-blue"> Pronto </small></span>
  </a></li> -->
  <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Medicamentos</a></li> -->
</ul>
</li>

<!--  Administración  -->

<li class="treeview menu-open" style="height: auto;">
<a href="#">
  <i class="fa fa-share"></i> <span> Administración</span>
  <span class="pull-right-container">
    <i class="fa fa-angle-left pull-right"></i>
  </span>
</a>
<ul class="treeview-menu" style="display: block;">

  <li><a href="calendario.php"><i class="fa fa-circle-o"></i> Agenda</a></li>
  <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Delegaciones </a></li> -->

</ul>
</li>

  
';

$admin ='<li class="treeview menu-open" style="height: auto;">
<a href="#">
  <i class="fa fa-share"></i> <span> Residentes</span>
  <span class="pull-right-container">
    <i class="fa fa-angle-left pull-right"></i>
  </span>
</a>
<ul class="treeview-menu" style="display: block;">

<li class="treeview" style="height: auto;">
<a href="#"><i class="fa fa-circle-o"></i> Ficha <span class="pull-right-container">
    <i class="fa fa-angle-left pull-right"></i>
  </span>
</a>
<ul class="treeview-menu" style="display: none;">
  <li><a href="residente.php"><i class="fa fa-circle-o"></i> Residentes </a></li>
  <li><a href="abandono.php"><i class="fa fa-circle-o"></i> Abandono </a></li>
</ul>
</li>


  <li class="treeview" style="height: auto;">
    <a href="#"><i class="fa fa-circle-o"></i> Terapias
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu" style="display: none;">
      <li class="treeview" style="height: auto;">
        <a href="#"><i class="fa fa-circle-o"></i> Conductuales
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="display: none;">
          <li><a href="ListaTConf.php"><i class="fa fa-circle-o"></i> Activación Conductual</a></li>
          <li><a href="ListaTAvanzada.php"><i class="fa fa-circle-o"></i> Avanzada</a></li>
          <li><a href="ListaTEspecial.php"><i class="fa fa-circle-o"></i> Especial</a></li>
          <li><a href="ListaTEducador.php"><i class="fa fa-circle-o"></i> Reunión Educadores</a></li>
          <li><a href="ListaTGa.php"><i class="fa fa-circle-o"></i> Grupo Atrás</a></li>
        </ul>
      </li>

      <li class="treeview" style="height: auto;">
        <a href="#"><i class="fa fa-circle-o"></i> Cognitivas
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="display: none;">
          <li><a href="ListaTerapiaRelatoPase.php"><i class="fa fa-circle-o"></i> Relato de pase</a></li>
          <li><a href="ListaTGrupal.php"><i class="fa fa-circle-o"></i> Grupal / Exponencial</a></li>
          <li><a href="ListaTedu.php"><i class="fa fa-circle-o"></i> Educativa</a></li>
          <li><a href="ListaTNeuro.php"><i class="fa fa-circle-o"></i> Neuroplasticidad</a></li>
          <li><a href="ListaTMayeutica.php"><i class="fa fa-circle-o"></i> Mayéutica</a></li>
          <li><a href="ListaTEmocional.php"><i class="fa fa-circle-o"></i> Menejo emocional</a></li>
        </ul>
      </li>

      <li class="treeview" style="height: auto;">
        <a href="#"><i class="fa fa-circle-o"></i> Complementarias
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="display: none;">
          <li><a href="ListaTInf.php"><i class="fa fa-circle-o"></i> Reflexión</a></li>
         <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Familiar</a></li> -->
          <li><a href="ListaTs.php"><i class="fa fa-circle-o"></i> Sensei</a></li>
        </ul>
      </li>

    </ul>
  </li>
  
  <li class="treeview" style="height: auto;">
    <a href="ListaPTI.php"><i class="fa fa-circle-o"></i> PTI 
   <!-- QUITAR ESTA LINEA --> <span class="pull-right-container"><small class="label pull-right bg-green"> new </small></span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu" style="display: none;">
      <li><a href="ListaPTI.php"><i class="fa fa-circle-o"></i> Plan de tratamiento</a></li>
      
      <li><a href="ListaSegPTI.php"><i class="fa fa-circle-o"></i> Seguimiento</a></li> 
    </ul>
  </li>


  <!-- <li class="treeview" style="height: auto;">
    <a href="#"><i class="fa fa-circle-o"></i> Pases <small class="label pull-right bg-blue"> Pronto </small>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu" style="display: none;">
      <li><a href="#"><i class="fa fa-circle-o"></i> Entrega de Pases 
      <span class="pull-right-container"><small class="label pull-right bg-blue"> Pronto </small></span></a></li>
      <li><a href="#"><i class="fa fa-circle-o"></i> Historial 
      <span class="pull-right-container"><small class="label pull-right bg-blue"> Pronto </small></span></a></li>  
    </ul>
  </li> -->

  <li><a href="#" data-toggle="modal" data-target="#selec_resi" ><i class="fa fa-circle-o"></i> API</a></li>
  <li><a href="ayudas.php"><i class="fa fa-circle-o"></i> Ayudas</a></li>
  <li><a href="#" data-toggle="modal" data-target="#controlSalida" ><i class="fa fa-circle-o"></i> Control de salidas</a></li>
 <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Delegaciones 
  <span class="pull-right-container"><small class="label pull-right bg-blue"> Pronto </small></span>
  </a></li> -->
  <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Medicamentos</a></li> -->
</ul>
</li>

<!--  Administración  -->

<li class="treeview menu-open" style="height: auto;">
<a href="#">
  <i class="fa fa-share"></i> <span> Administración</span>
  <span class="pull-right-container">
    <i class="fa fa-angle-left pull-right"></i>
  </span>
</a>
<ul class="treeview-menu" style="display: block;">
  

<li><a href="terapeuta.php"><i class="fa fa-circle-o"></i> Terapeutas <span class="pull-right-container"><small class="label pull-right bg-green"> new </small></span></a></li>
  <li><a href="ListaCaja.php"><i class="fa fa-circle-o"></i> Caja Residentes</a></li>
  <li><a href="calendario.php"><i class="fa fa-circle-o"></i> Agenda</a></li>
  <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Delegaciones </a></li> -->

</ul>
</li>

';

$terapeuta ='<li class="treeview menu-open" style="height: auto;">
<a href="#">
  <i class="fa fa-share"></i> <span> Residentes</span>
  <span class="pull-right-container">
    <i class="fa fa-angle-left pull-right"></i>
  </span>
</a>
<ul class="treeview-menu" style="display: block;">

<li class="treeview" style="height: auto;">
<a href="#"><i class="fa fa-circle-o"></i> Ficha <span class="pull-right-container">
    <i class="fa fa-angle-left pull-right"></i>
  </span>
</a>
<ul class="treeview-menu" style="display: none;">
  <li><a href="residente.php"><i class="fa fa-circle-o"></i> Residentes </a></li>
  <li><a href="abandono.php"><i class="fa fa-circle-o"></i> Abandono </a></li>
</ul>
</li>


  <li class="treeview" style="height: auto;">
    <a href="#"><i class="fa fa-circle-o"></i> Terapias
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu" style="display: none;">
      <li class="treeview" style="height: auto;">
        <a href="#"><i class="fa fa-circle-o"></i> Conductuales
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="display: none;">
          <li><a href="ListaTConf.php"><i class="fa fa-circle-o"></i> Activación Conductual</a></li>
          <li><a href="ListaTAvanzada.php"><i class="fa fa-circle-o"></i> Avanzada</a></li>
          <li><a href="ListaTEspecial.php"><i class="fa fa-circle-o"></i> Especial</a></li>
          <li><a href="ListaTEducador.php"><i class="fa fa-circle-o"></i> Reunión Educadores</a></li>
          <li><a href="ListaTGa.php"><i class="fa fa-circle-o"></i> Grupo Atrás</a></li>
        </ul>
      </li>

      <li class="treeview" style="height: auto;">
        <a href="#"><i class="fa fa-circle-o"></i> Cognitivas
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="display: none;">
          <li><a href="ListaTerapiaRelatoPase.php"><i class="fa fa-circle-o"></i> Relato de pase</a></li>
          <li><a href="ListaTGrupal.php"><i class="fa fa-circle-o"></i> Grupal / Exponencial</a></li>
          <li><a href="ListaTedu.php"><i class="fa fa-circle-o"></i> Educativa</a></li>
          <li><a href="ListaTNeuro.php"><i class="fa fa-circle-o"></i> Neuroplasticidad</a></li>
          <li><a href="ListaTMayeutica.php"><i class="fa fa-circle-o"></i> Mayéutica</a></li>
          <li><a href="ListaTEmocional.php"><i class="fa fa-circle-o"></i> Menejo emocional</a></li>
        </ul>
      </li>

      <li class="treeview" style="height: auto;">
        <a href="#"><i class="fa fa-circle-o"></i> Complementarias
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="display: none;">
          <li><a href="ListaTInf.php"><i class="fa fa-circle-o"></i> Reflexión</a></li>
         <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Familiar</a></li> -->
          <li><a href="ListaTs.php"><i class="fa fa-circle-o"></i> Sensei</a></li>
        </ul>
      </li>

    </ul>
  </li>


  <li class="treeview" style="height: auto;">
    <a href="#"><i class="fa fa-circle-o"></i> Introvisación
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu" style="display: none;">
      <li><a href="ListaIntro.php"><i class="fa fa-circle-o"></i> Activos</a></li>
      <li><a href="ListaIntroH.php"><i class="fa fa-circle-o"></i> Históricos</a></li>
         
    </ul>
  </li>

  <li class="treeview" style="height: auto;">
    <a href="ListaPTI.php"><i class="fa fa-circle-o"></i> PTI 
   <!-- QUITAR ESTA LINEA --> <span class="pull-right-container"><small class="label pull-right bg-green"> new </small></span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu" style="display: none;">
      <li><a href="ListaPTI.php"><i class="fa fa-circle-o"></i> Plan de tratamiento</a></li>
      
      <li><a href="ListaSegPTI.php"><i class="fa fa-circle-o"></i> Seguimiento</a></li> 
    </ul>
  </li>

  <!-- <li class="treeview" style="height: auto;">
    <a href="#"><i class="fa fa-circle-o"></i> Pases <small class="label pull-right bg-blue"> Pronto </small>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu" style="display: none;">
      <li><a href="#"><i class="fa fa-circle-o"></i> Entrega de Pases 
      <span class="pull-right-container"><small class="label pull-right bg-blue"> Pronto </small></span></a></li>
      <li><a href="#"><i class="fa fa-circle-o"></i> Historial 
      <span class="pull-right-container"><small class="label pull-right bg-blue"> Pronto </small></span></a></li>  
    </ul>
  </li> -->

  
  <li><a href="ayudas.php"><i class="fa fa-circle-o"></i> Ayudas</a></li>
  <li><a href="#" data-toggle="modal" data-target="#controlSalida" ><i class="fa fa-circle-o"></i> Control de salidas</a></li>

</ul>
</li>

<!--  Administración  -->

<li class="treeview menu-open" style="height: auto;">
<a href="#">
  <i class="fa fa-share"></i> <span> Administración</span>
  <span class="pull-right-container">
    <i class="fa fa-angle-left pull-right"></i>
  </span>
</a>
<ul class="treeview-menu" style="display: block;">
  
  
  <li><a href="calendario.php"><i class="fa fa-circle-o"></i> Agenda</a></li>
 

</ul>
</li>

';

$reeducados ='
<!--  Administración  -->

<li class="treeview menu-open" style="height: auto;">
<a href="#">
  <i class="fa fa-share"></i> <span> Administración</span>
  <span class="pull-right-container">
    <i class="fa fa-angle-left pull-right"></i>
  </span>
</a>
<ul class="treeview-menu" style="display: block;">
  
  <li><a href="calendario.php"><i class="fa fa-circle-o"></i> Agenda</a></li>

</ul>
</li>

   <!-- Reducados menú -->

<li class="treeview menu-open" style="height: auto;">
<a href="#">
  <i class="fa fa-share"></i> <span> Reeducados</span>
  <span class="pull-right-container">
    <i class="fa fa-angle-left pull-right"></i>
  </span>
</a>
<ul class="treeview-menu" style="display: block;">
  
  <li class="treeview" style="height: auto;">
    <a href="#"><i class="fa fa-circle-o"></i> Ficha <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu" style="display: none;">
      <li><a href="LReducado.php"><i class="fa fa-circle-o"></i> Reeducados </a></li>
      <li><a href="abandono.php"><i class="fa fa-circle-o"></i> Abandono </a></li>
    </ul>
  </li>

  <li><a href="reducado.php"><i class="fa fa-circle-o"></i> Seguimiento Reducado </a></li>
 <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Plan de tratamiento </a></li> -->

</ul>
</li>

';


//  $usuario = '<li class=""><a href="usuarios.php"><i class="fa fa-circle-o"></i><span>Usuarios</span></a></li>'; 

//  $residentes = '<li class="treeview">
//               <a href="#">
//                 <i class="fa fa-circle-o"></i>
//                 <span>Residentes</span>
//                 <i class="fa fa-angle-left pull-right"></i>
//               </a>
//               <ul class="treeview-menu">
//                 <li><a href="residente.php"><i class="fa fa-circle-o"></i> Residentes</a></li>
//                 <li><a href="LReducado.php"><i class="fa fa-circle-o"></i> Reeducados</a></li>
//                 <li><a href="abandono.php"><i class="fa fa-circle-o"></i> Abandono</a></li>
//               </ul>
//             </li>'; 

//   $residentes_redu = '<li class=""><a href="LReducado.php"><i class="fa fa-circle-o"></i><span> Reeducados</span></a></li>'; 

//   // $introvisacion = '<li class=""><a href="ListaIntro.php"><i class="fa fa-circle-o"></i><span>Introvisación</span></a></li>';

//   $introvisacion = '<li class="treeview">
//             <a href="#">
//               <i class="fa fa-circle-o"></i>
//               <span>Introvisaciones</span>
//               <i class="fa fa-angle-left pull-right"></i>
//             </a>
//             <ul class="treeview-menu">';
//         $intro_historico =' <li><a href="ListaIntroH.php"><i class="fa fa-circle-o"></i> Histórico</a></li>';
//         $intro_activo = '<li><a href="ListaIntro.php"><i class="fa fa-circle-o"></i> Activos</a></li>';
//         $intro_psico ='<li><a href="ListaIntroAct.php"><i class="fa fa-circle-o"></i> Psicologo</a></li>';
//   $introvisacionf = '</ul>
//           </li>'; 

//   // $profesionales = '<li class="treeview">
//   //         <a href="#">
//   //           <i class="fa fa-share"></i> <span>Profesionales</span>
//   //           <span class="pull-right-container">
//   //             <i class="fa fa-angle-left pull-right"></i>
//   //           </span>
//   //         </a>
//   //         <ul class="treeview-menu">
//   //           <li><a href="psicologo.php"><i class="fa fa-circle-o"></i> Psicólogo</a></li>
//   //           <li><a href="terapeuta.php"><i class="fa fa-circle-o"></i> Terapeuta</a></li>
//   //           <li><a href="educadores.php"><i class="fa fa-circle-o"></i> Educador</a></li>
//   //         </ul>
//   //       </li>';

//     $listaTerapias = '<li class="treeview">
//               <a href="#">
//                 <i class="fa fa-circle-o"></i>
//                 <span>Terapias</span>
//                 <i class="fa fa-angle-left pull-right"></i>
//               </a>
//               <ul class="treeview-menu">
//                 <li><a href="terapiaconfrontacion.php"><i class="fa fa-circle-o"></i> Activación Conductual</a></li>
//                 <li><a href="ListaTerapiaRelatoPase.php"><i class="fa fa-circle-o"></i>Relato de pase</a></li>
//                 <li><a href="ListaTGrupal.php"><i class="fa fa-circle-o"></i>Grupal</a></li>
//                 <li><a href="ListaTInf.php"><i class="fa fa-circle-o"></i>Espiritual o Reflexiva</a></li>
//                 <li><a href="ListaTAvanzada.php"><i class="fa fa-circle-o"></i>Avanzada</a></li>
//                 <li><a href="ListaTEspecial.php"><i class="fa fa-circle-o"></i>Especial</a></li>
//                 <li><a href="ListaTEducador.php"><i class="fa fa-circle-o"></i>Reunión Educadores</a></li>
//                 <li><a href="ListaTGa.php"><i class="fa fa-circle-o"></i>Grupo Atrás</a></li>
//                 <li><a href="ListaTs.php"><i class="fa fa-circle-o"></i>Sensei</a></li>
//                 <li><a href="ListaTedu.php"><i class="fa fa-circle-o"></i>Educativa</a></li>
//                 <li><a href="ListaTNeuro.php"><i class="fa fa-circle-o"></i>Neuroplasticidad</a></li>
//                 <li><a href="ListaTMayeutica.php"><i class="fa fa-circle-o"></i>Mayéutica</a></li>
//                 <li><a href="ListaTEmocional.php"><i class="fa fa-circle-o"></i>Manejo emocional</a></li>
                

//               </ul>
//             </li>';

//     $llamadaReducado = ' <li class=""><a href="reducado.php"><i class="fa fa-circle-o"></i><span>Llamada Reducados</span></a></li>';

//     $consultaPsicologia = ' <li class=""><a href="consultaPsicologia.php"><i class="fa fa-circle-o"></i><span>Consulta</span></a></li>';

//     $pagos = '<li class=""><a href="LisPagoU.php"><i class="fa fa-circle-o"></i><span>Pagos</span></a></li>';

//     $APIS = '<li class=""><a href="#"  ><i class="fa fa-circle-o"></i><span>API</span></a></li>';

//     $calendario = '<li class=""><a href="calendario.php"><i class="fa fa-circle-o"></i><span>Calendario</span></a></li>';

//     //$caja = '<li class=""><a href="#" data-toggle="modal" data-target="#selec_resi_a"><i class="fa fa-circle-o"></i><span>Caja</span></a></li>';
//     $caja = ' <li class=""><a href="ListaCaja.php"><i class="fa fa-circle-o"></i><span>Caja</span></a></li>';

//     $ayudas = '<li class=""><a href="ayudas.php"><i class="fa fa-circle-o"></i><span>Ayudas</span></a></li>';

//     $controlSalida = '<li class=""><a href="#" ><i class="fa fa-circle-o"></i><span>Control salida</span></a></li>';

//     $velamiento = '<li class=""><a href="LVelamiento.php"><i class="fa fa-circle-o"></i><span>Velamiento</span></a></li>';
?>


<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menú</li>
      <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="#"><i class="fa fa-dashboard"></i> <span>Inicio</span></a></li>
        
         
<?php

  $rol = $_SESSION['rol'];

  switch ($rol) {
    case 'Admin':

      // admin
      echo $admin_root;
     
      break;
      case 'Super_Administrador':

        echo $super_admin;
      break;

      case 'Administracion':

        echo $admin;

      break;
      case 'Terapeutas':
        
        echo $terapeuta;  
        
      break;

      case 'Reducados':

        echo $reeducados;

      break;

      case 'Psicologo':
        echo $psicologo;
      break;

    default:
         
      break;
  }

 ?>


      </ul>
      <!-- /.sidebar-menu -->
    </section>

    
<!-- // Modal -->
    <!-- /.sidebar -->
  </aside>




<div class="modal fade" id="selec_resi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title" id="myModalLabel">Seleccionar un residente</h4></center>
            </div>
            <div class="modal-body">
                    
              <div classs="container">    
     <div class="box box-solid"> 
      <div class="box-body">
      <div class="row">
        <div class="col-xs-12">
        <table id="myTable2" class=" table table-bordered table-striped">
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
                echo 
                "<tr>
                  <td>".$row['id_residente']."</td>
                  <td>".$row['nombre']."</td>
                  <td>".$row['apellido']."</td>
                  <td>".$row['rut']."</td>
                  <td>".$row['etapa_resi']."</td>
                  
                  
                  <td align='center'>

                    <a href='APIS.php?id=".$row['id_residente']."' title='Seleccionar' class='btn btn-primary btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-check'></span> </a>
                    
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
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>

            </div>
        </div>
    </div>
</div>

<!-- Modal caja -->
<div class="modal fade" id="selec_resi_a" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title" id="myModalLabel">Seleccionar un residente</h4></center>
            </div>
            <div class="modal-body">
                    
              <div classs="container">    
     <div class="box box-solid"> 
      <div class="box-body">
      <div class="row">
        <div class="col-xs-12">
        <table id="myTable3" class=" table table-bordered table-striped">
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
                echo 
                "<tr>
                  <td>".$row['id_residente']."</td>
                  <td>".$row['nombre']."</td>
                  <td>".$row['apellido']."</td>
                  <td>".$row['rut']."</td>
                  <td>".$row['etapa_resi']."</td>
                  
                  
                  <td align='center'>

                    <a href='caja.php?id=".$row['id_residente']."' title='Seleccionar' class='btn btn-primary btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-check'></span> </a>
                    
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
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>

            </div>
        </div>
    </div>
</div>
<!-- ./ Fin modal Caja -->


<div class="modal fade" id="controlSalida" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title" id="myModalLabel">Seleccionar un residente</h4></center>
            </div>
            <div class="modal-body">
                    
              <div classs="container">    
     <div class="box box-solid"> 
      <div class="box-body">
      <div class="row">
        <div class="col-xs-12">
        <table id="cSalida" class=" table table-bordered table-striped">
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
                echo 
                "<tr>
                  <td>".$row['id_residente']."</td>
                  <td>".$row['nombre']."</td>
                  <td>".$row['apellido']."</td>
                  <td>".$row['rut']."</td>
                  <td>".$row['etapa_resi']."</td>
                  
                  
                  <td align='center'>

                    <a href='controlSalida.php?id=".$row['id_residente']."' title='Seleccionar' class='btn btn-primary btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-check'></span> </a>
                    
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
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>

            </div>
        </div>
    </div>
</div>
<!-- ./ Fin modal Caja -->