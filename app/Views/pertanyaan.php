<!-- Load header -->
<?= view('template/header') ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left mb-3">
                <h3>Pertanyaan <small>Survei Kepuasan Masyarakat</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                </div>
              </div>
            </div>

            <div class="clearfix"></div>
            
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">
                      Tambah Pertanyaan
                    </button>

<!-- Modal -->
<form action="<?= base_url('add-pertanyaan') ?>" method="post">
<div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addLabel">Tambah Pertanyaan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
      </div>
      <div class="modal-body">
        <div>
        <input type="number" class="form-control" id="no_pertanyaan" name="no_pertanyaan" placeholder="No Pertanyaan" min="1" max="50" required>
        </div>
        <br>
        <div>
        <textarea class="form-control" id="pertanyaan" name="pertanyaan" placeholder="Tambah Pertanyaan Baru" required></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- End Modal -->

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="deleteConfirmationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1 aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" id="deleteConfirmationButton">Hapus</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus pertanyaan ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" id="deleteConfirmationButton">Hapus</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Konfirmasi Hapus -->

<!-- Modal Edit Data -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <form id="editForm">
                <div class="modal-body">
                    <input type="hidden" id="editId" name="editId">
                    <div class="mb-3">
                        <label for="editPertanyaan" class="form-label">Pertanyaan</label>
                        <textarea class="form-control" id="editPertanyaan" name="editPertanyaan" placeholder="Masukkan Pertanyaan"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Update Data -->

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th class="text-center">No</th>
                          <th class="text-center">Kode Soal</th>
                          <th class="text-center">Pertanyaan</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($pertanyaan as $key => $p) : ?>
                        <tr>
                        <th class="text-center" scope="row"><?=$key + 1?></th>
                          <td><?= $p->no_pertanyaan; ?></td>
                          <td><?= $p->pertanyaan; ?></td>
                          <td class="text-center">
                            <!-- Tombol Edit -->
                            <button type="button" class="btn btn-warning btn-sm" onclick="tampilkanModalEdit(<?= $p->id_pertanyaan ?>, '<?= $p->pertanyaan ?>')">Edit</button>
                            <button type="button" class="btn btn-danger btn-sm" onclick="hapus('<?php echo $p->id_pertanyaan; ?>')">Delete</button>
                          </td>
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
						
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <!-- <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer> -->
        <!-- /footer content -->
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Custom Theme Scripts -->
    <script src="/assets/build/js/custom.min.js"></script>
  </body>
</html>

<!-- Script untuk Menampilkan Modal Konfirmasi Hapus -->
<script>
  function hapus(id) {
    // Mengatur ID yang akan dihapus sebagai data pada tombol konfirmasi penghapusan
    document.getElementById("deleteConfirmationButton").dataset.id = id;

    // Menampilkan modal konfirmasi
    var deleteConfirmationModal = new bootstrap.Modal(document.getElementById('deleteConfirmationModal'));
    deleteConfirmationModal.show();
  }

  // Tangani klik pada tombol konfirmasi penghapusan
  document.getElementById("deleteConfirmationButton").addEventListener("click", function() {
      var id = this.dataset.id; // Dapatkan ID yang akan dihapus dari data pada tombol
      window.location.href = '<?= base_url('delete-pertanyaan/') ?>' + id; // Hapus data jika pengguna mengonfirmasi
  });

  $(document).ready(function() {
    $('#datatable').DataTable();
  });

  function tampilkanModalEdit(id, pertanyaan) {
    document.getElementById("editId").value = id;
    document.getElementById("editPertanyaan").value = pertanyaan;

    var editModal = new bootstrap.Modal(document.getElementById('editModal'));
    editModal.show();
}

document.getElementById("editForm").addEventListener("submit", function(event) {
    event.preventDefault();

    var formData = new FormData(this);
    var url = 'update-pertanyaan/' + formData.get('editId');

    fetch(url, {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (response.ok) {
            var editModal = new bootstrap.Modal(document.getElementById('editModal'));
            editModal.hide();
            window.location.reload();
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
</script>