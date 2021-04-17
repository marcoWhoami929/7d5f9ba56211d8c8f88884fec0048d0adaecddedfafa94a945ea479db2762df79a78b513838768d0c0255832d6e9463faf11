<?php

require_once "../../../controladores/encuestas.controlador.php";
require_once "../../../modelos/encuestas.modelo.php";

$totalNotificaciones = ControladorEncuestas::ctrMostrarTotalNotificaciones();
$total = $totalNotificaciones["puebla"]+$totalNotificaciones["tlaxcala"];
$totalPuebla = $totalNotificaciones["puebla"];
$totalTlaxcala = $totalNotificaciones["tlaxcala"];
$ultimaEncuestaPuebla = $totalNotificaciones["fechaPuebla"];
$ultimaEncuestaTlaxcala = $totalNotificaciones["fechaTlaxcala"];
?>
<!-- Right navbar links -->
 
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell fa-2x"></i>
          <span class="badge badge-warning navbar-badge"><?php echo $total ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><?php echo $total ?> Notificaciones</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-map-marked-alt"></i> <strong style="color:#218CFF;font-size: 20px"><?php echo $totalPuebla ?></strong> Puebla
            <span class="float-right text-muted text-sm"><?php echo $ultimaEncuestaPuebla?></span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-map-marked-alt"></i> <strong style="color:#218CFF;font-size: 20px"><?php echo $totalTlaxcala ?></strong> Tlaxcala
            <span class="float-right text-muted text-sm"><?php echo $ultimaEncuestaTlaxcala?></span>
          </a>
          <div class="dropdown-divider"></div>
          
        </div>
      </li>
  