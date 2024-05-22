<!-- Load header -->
<?= view('template/header') ?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Tabel <small>Data Responden</small></h3>
      </div>
      <div class="clearfix"></div>
      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
          <div class="x_title">
            <h2>Bordered table <small>Bordered table subtitle</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li>
                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Settings 1</a>
                    <a class="dropdown-item" href="#">Settings 2</a>
                  </div>
              </li>
              <li>
                <a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable" class="table table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Jenis Kelamin</th>
                  <th class="text-center">Usia</th>
                  <th class="text-center">Pekerjaan</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($responden as $key => $r) : ?>
                <tr>
                  <th class="text-center" scope="row"><?=$key + 1?></th>
                  <td><?=$r->jenis_kelamin?></td>
                  <td><?=$r->usia?></td>
                  <td><?=$r->pekerjaan?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
    <!-- /page content -->

    <!-- footer content -->
    <footer>
      <div class="pull-right">
        </br>	
      </div>
      <div class="clearfix"></div>
    </footer> 
    </footer content>
  </div>
</div>

    <!-- jQuery -->
    <script src="/assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="/assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="/assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/assets/vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="/assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="/assets/build/js/custom.min.js"></script>
    <!-- Datatables -->
    <script src="/assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="/assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="/assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="/assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="/assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="/assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="/assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="/assets/vendors/jszip/dist/jszip.min.js"></script>
    <script src="/assets/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="/assets/vendors/pdfmake/build/vfs_fonts.js"></script>

    <script>
      $(document).ready(function() {
        $('#datatable').DataTable();
      });
    </script>
  </body>
</html>
