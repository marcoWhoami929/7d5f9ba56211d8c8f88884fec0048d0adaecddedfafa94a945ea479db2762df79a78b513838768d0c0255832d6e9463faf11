
<!-- /.login-box -->
<div class="login-box" style="margin-top: 0%">
  <div class="login-logo">
    <center><img src="vistas/img/plantilla/LOGO SDF blanco.png" class="img-responsive" style="width: 100%"></center>
    
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg" style="font-size: 20px">SAN FRANCISCO DEKKERLAB <br><strong>BLITZ</strong></p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="ingEmail">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="ingPassword">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
          </div>
          <!-- /.col -->
        </div>
          <?php

            $login = new ControladorAdministradores();
            $login -> ctrIngresoAdministrador();

          ?>
      </form>


    
    </div>
    <!-- /.login-card-body -->
  </div>
</div>