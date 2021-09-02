  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?php echo DIR; ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo SITETITLE; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      

      <!-- SidebarSearch Form 
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
        -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <?php
        if($permiso == 1){
          foreach($pages as $page_name){
          
          if($page_name== "index"){
          ?>
          <li class="nav-item">
            <a href="#" class="nav-link link_page" onclick="varPage('admin','<?php echo $page_name; ?>');">
            <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Panel de Control
              </p>
            </a>
          </li>
          <?php
          }
          }
        }
        if($permiso == 1){
          foreach($pages as $page_name){
          
          if($page_name== "lista_pedidos"){
          ?>
          <li class="nav-item">
            <a href="#" class="nav-link link_page" onclick="varPage('admin','<?php echo $page_name; ?>');">
            <i class="fas fa-truck"></i>
              <p>
                Pedidos
              </p>
            </a>
          </li>
          <?php
          }
          }
        }
        if($permiso == 2){
          foreach($pages as $page_name){
          
          if($page_name== "index"){
          ?>
          <li class="nav-item">
            <a href="#" class="nav-link link_page" onclick="varPage('cliente','<?php echo $page_name; ?>');">
            <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Hacer Pedido
              </p>
            </a>
          </li>
          <?php
          }
          }
        }
        if($permiso == 2){
          foreach($pages as $page_name){
          
          if($page_name== "lista_pedidos"){
          ?>
          <li class="nav-item">
            <a href="#" class="nav-link link_page" onclick="varPage('cliente','<?php echo $page_name; ?>');">
            <i class="fas fa-truck"></i>
              <p>
                Lista Pedidos
              </p>
            </a>
          </li>
          <?php
          }
        }//forearch
        } // .if permiso 2
        ?>
        <li class="nav-header">USUARIOS</li>
        <?php
        if($permiso == 1){
          foreach($pages as $page_name){
          if($page_name == "lista_usuarios"){
          ?> 
          <li class="nav-item">
            <a href="#" class="nav-link link_page" onclick="varPage('admin','<?php echo $page_name; ?>');">
              <i class="fas fa-users-cog"></i>
              <p>
                Lista de Usuarios
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <?php
          }
          if($page_name == "nuevo_usuario"){
          ?>
          <li class="nav-item">
            <a href="#" class="nav-link link_page" onclick="varPage('admin','<?php echo $page_name; ?>');">
              <i class="fas fa-user-plus"></i>
              <p>
                Crear Usuario
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>

          <?php
          }
          }
        }
        if($permiso == 2){
          foreach($pages as $page_name){
          
          if($page_name== "editar_usuarios"){
          ?>
          <li class="nav-item">
            <a href="#" class="nav-link link_page" onclick="varPage('cliente','<?php echo $page_name; ?>');">
              <i class="fas fa-user-edit"></i>
              <p>
                Editar Usuario
              </p>
            </a>
          </li>
          <?php
          }
          }
        }
        ?>
        <li class="nav-header">PRODUCTOS</li>
        <?php
        if($permiso == 1){
          foreach($pages as $page_name){
          if($page_name == "lista_productos"){
          ?>
          <li class="nav-item">
            <a href="#" class="nav-link link_page" onclick="varPage('admin','<?php echo $page_name; ?>');">
              <i class="fas fa-oil-can"></i>
              <p>
                Lista Productos
                <!--<span class="badge badge-info right">2</span> -->
              </p>
            </a>
          </li>
          <?php
          }
          if($page_name == "nuevo_producto"){
            ?>
            <li class="nav-item">
              <a href="#" class="nav-link link_page" onclick="varPage('admin','<?php echo $page_name; ?>');">
              <i class="fas fa-oil-can"></i>
                <p>
                  Nuevo Producto
                  <!--<span class="badge badge-info right">2</span> -->
                </p>
              </a>
            </li>
            <?php
            }
          }
        }  
        if($permiso == 2){
          foreach($pages as $page_name){
          
          if($page_name== "lista_productos"){
          ?>
          <li class="nav-item">
            <a href="#" class="nav-link link_page" onclick="varPage('cliente','<?php echo $page_name; ?>');">
              <i class="fas fa-spinner"></i>
              <p>
                Productos
              </p>
            </a>
          </li>
          <?php
          }
          }
        }
        ?>
        <li class="nav-header">EMPRESAS</li>
        <?php
        if($permiso == 1){
          foreach($pages as $page_name){
          if($page_name == "empresas"){
          ?>
          <li class="nav-item">
            <a href="#" class="nav-link link_page" onclick="varPage('admin','<?php echo $page_name; ?>');">
              <i class="fas fa-book"></i>
              <p>
                Empresas
                <!--<span class="badge badge-info right">2</span> -->
              </p>
            </a>
          </li>
          <?php
          }
          if($page_name == "nueva_empresa"){
            ?>
            <li class="nav-item">
              <a href="#" class="nav-link link_page" onclick="varPage('admin','<?php echo $page_name; ?>');">
                <i class="fas fa-book"></i>
                <p>
                  Crear Empresa
                  <!--<span class="badge badge-info right">2</span> -->
                </p>
              </a>
            </li>
            <?php
            }
         } //forearch
        } // .if permiso 1
      
      if($permiso == 2){
        foreach($pages as $page_name){
        
        if($page_name== "editar_empresa"){
        ?>
        <li class="nav-item">
          <a href="#" class="nav-link link_page" onclick="varPage('cliente','<?php echo $page_name; ?>');">
            <i class="fas fa-laptop-house"></i>
            <p>
              Editar Empresa
            </p>
          </a>
        </li>
        <?php
        }
        }
      }
        ?>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-gray"><?php echo SITETITLE;?></h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <?php
        if($permiso == 1){
      ?>  
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>L</h3>
                <p>Lista de Usuarios</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
                <a href="#" class="small-box-footer" onclick="varPage('admin','lista_usuarios');">
                    Secci&oacute;n <i class="fas fa-arrow-circle-right"></i>  
                </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>+</h3>

                <p>A&ntilde;adir Nuevo Usuario</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="#" class="small-box-footer" onclick="varPage('admin','nuevo_usuario');">
                Secci&oacute;n  <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>E</h3>

                <p>Empresas</p>
              </div>
              <div class="icon">
               <i class="fas fa-house-user"></i>
              </div>
              <a href="#" class="small-box-footer" onclick="varPage('admin','empresas');">
              Secci&oacute;n <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>P</h3>

                <p>Pedidos</p>
              </div>
              <div class="icon">
              <!-- <i class="fas fa-truck-moving"></i> -->
              <i style="top: -6px;">
              <?php 
              $pedidos = new Pedido();
              $tp = $pedidos->totalPedidos();
              echo $tp;
              
              ?>
              </i>
              </div>
              <a href="#" class="small-box-footer" onclick="varPage('admin','lista_pedidos');">
              Secci&oacute;n <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      <?php
        }
        if($permiso == 2){
      ?>
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>P</h3>
                <p>Productos</p>
              </div>
              <div class="icon">
                <i class="fas fa-spinner"></i>
              </div>
                <a href="#" class="small-box-footer" onclick="varPage('cliente','lista_productos');">
                    Secci&oacute;n <i class="fas fa-arrow-circle-right"></i>  
                </a>
            </div>
          </div>
          <!-- ./col -->
          <!-- <div class="col-lg-3 col-6">
            <!- small box ->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>+</h3>

                <p>A&ntilde;adir Nuevo Usuario</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="#" class="small-box-footer" onclick="varPage('admin','nuevo_usuario');">
                Secci&oacute;n  <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div> -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>E</h3>

                <p>Empresa</p>
              </div>
              <div class="icon">
               <i class="fas fa-house-user"></i>
              </div>
              <a href="#" class="small-box-footer" onclick="varPage('cliente','editar_empresa');">
              Secci&oacute;n <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>P</h3>

                <p>Pedidos</p>
              </div>
              <div class="icon">
              <i class="fas fa-truck-moving"></i>
              </div>
              <a href="#" class="small-box-footer" onclick="varPage('cliente','lista_pedidos');">
                Secci&oacute;n <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      <?php
        }
      ?>