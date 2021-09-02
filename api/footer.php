
          <!-- /.row (main row) -->
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>
    // Base Url
    const url = "<?php echo DIR; ?>";
    console.log(url);
    //Create link in nav
    function varPage(desc,link) {
      window.location.href = url+"api/index.php?des=" + desc + "&page=" + link;
    }
    //Create link in nav with id 
    function varIdPage(desc,link,id) {
      window.location.href = url+"api/index.php?des=" + desc + "&page=" + link + '&id=' + id;
    }
</script>

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#"><?php echo SITETITLE;?></a>.</strong>
    Todos los derechos reservados.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.1.0
    </div>
  </footer>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->



<!-- Date -->
<script src="<?php echo DIR; ?>plugins/fullcalendar/main.min.js"></script>
<script src="<?php echo DIR; ?>plugins/fullcalendar/locales-all.min.js"></script>
<script src="<?php echo DIR; ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo DIR; ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo DIR; ?>dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo DIR; ?>plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo DIR; ?>plugins/raphael/raphael.min.js"></script>
<script src="<?php echo DIR; ?>plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo DIR; ?>plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo DIR; ?>plugins/chart.js/Chart.min.js"></script>


</body>
</html>