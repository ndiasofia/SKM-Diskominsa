
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
	<link href="/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="/assets/vendors/nprogress/nprogress.css" rel="stylesheet">
	<!-- iCheck -->
	<link href="/assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	<!-- bootstrap-wysiwyg -->
	<link href="/assets/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
	<!-- Select2 -->
	<link href="/assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
	<!-- Switchery -->
	<link href="/assets/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
	<!-- starrr -->
	<link href="/assets/vendors/starrr/dist/starrr.css" rel="stylesheet">
	<!-- bootstrap-daterangepicker -->
	<link href="/assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
	<!-- Custom Theme Style -->
	<link href="/assets/build/css/custom.min.css" rel="stylesheet">
  <!-- Sweet Allert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  </head>

  <body>

  <div class="card m-2 p-2">
  <div class="card-header">
  <a href="<?= base_url('/') ?>">
    <h5 class="card-title text-center">Form Survei Kepuasan Masyarakat</h5>
  </a>
  </div>
  <div class="card-body">
  <form action="<?= base_url('save') ?>" method="post" id="myForm" onsubmit="return validateForm()">
    <?= csrf_field() ?>
    <div class="row">
        <div class="col-md-4 col-sm-12 mb-4">
            <label for="usia" class="form-label">Umur Responden</label>
            <input type="text" class="form-control" name="usia" id="usia" placeholder="Masukkan umur">
            <div id="umurError" class="invalid-feedback">Umur harus diisi dan berupa angka.</div>
        </div>
        <div class="col-md-4 col-sm-12 mb-4">
            <label for="jenis_kelamin" class="control-label">Jenis Kelamin</label>
            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" >
                <option value="">----</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <div id="jenisKelaminError" class="invalid-feedback">Jenis kelamin harus dipilih.</div>
        </div>
        <div class="col-md-4 col-sm-12 mb-4">
            <label for="pekerjaan" class="form-label">Pekerjaan Utama</label>
            <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Masukkan pekerjaan" >
            <div id="pekerjaanError" class="invalid-feedback">Pekerjaan harus diisi.</div>
        </div>
    </div>
      <!-- Daftar Pertanyaan -->
      <div class="x_content">
        <table class="table">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">Pertanyaan</th>
              <th class="text-center">Penilaian</th>
            </tr>
          </thead>
          <tbody>         
            <?php       
            foreach ($pertanyaan as $key => $p) : ?>
            <tr>
              <td><?= $key + 1 ?></td>
              <td><?= $p->pertanyaan ?></td>
              <td>
                <input type="hidden" name="pertanyaan[<?= $p->no_pertanyaan ?>]" value="<?= $p->pertanyaan ?>">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="penilaian[<?= $p->no_pertanyaan ?>]" id="radio1_<?= $p->no_pertanyaan ?>" value="1">
                    <label class="form-check-label" for="radio1_<?= $p->no_pertanyaan ?>">Tidak kompeten</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="penilaian[<?= $p->no_pertanyaan ?>]" id="radio2_<?= $p->no_pertanyaan ?>" value="2">
                    <label class="form-check-label" for="radio2_<?= $p->no_pertanyaan ?>">Kurang kompeten</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="penilaian[<?= $p->no_pertanyaan ?>]" id="radio3_<?= $p->no_pertanyaan ?>" value="3">
                    <label class="form-check-label" for="radio3_<?= $p->no_pertanyaan ?>">Kompeten</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="penilaian[<?= $p->no_pertanyaan ?>]" id="radio4_<?= $p->no_pertanyaan ?>" value="4">
                    <label class="form-check-label" for="radio4_<?= $p->no_pertanyaan ?>">Sangat kompeten</label>
                </div>
            </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <!-- Saran -->
      <div class="mb-3">
        <label for="saran" class="form-label">Saran dan Masukan</label>
        <textarea class="form-control" id="saran" name="saran" placeholder="Masukkan saran dan masukan"></textarea>
        <div id="saranError" class="invalid-feedback">Pekerjaan harus diisi.</div>
      </div>

      <div class="d-flex justify-content-between mt-3">       
          <!-- <button type="button" class="btn btn-secondary">Kembali</button> -->
          <a href="<?= base_url('/') ?>" class="btn btn-secondary">Kembali</a>
          <button type="submit" class="btn btn-primary">Simpan Penilaian</button>
      </div>
    </form>
  </div>
</div>

<!-- Di dalam tag <script> -->
<script>
    // Ambil pesan sukses dari session jika ada
    var successMessage = "<?php echo session('success'); ?>";

    // Jika ada pesan sukses, tampilkan SweetAlert
    if (successMessage) {
        Swal.fire({
            icon: 'success',
            title: 'Sukses!',
            text: successMessage,
            showConfirmButton: false,
            timer: 1500 // Tampilkan SweetAlert selama 1.5 detik
        });
    }
</script>

<script>
    function validateForm() {
        // Validasi input umur, jenis kelamin, dan pekerjaan
        var usia = document.getElementById("usia").value;
        var jenisKelamin = document.getElementById("jenis_kelamin").value;
        var pekerjaan = document.getElementById("pekerjaan").value;
        var saran = document.getElementById("saran").value;
        var isValid = true;

        if (usia.trim() === "" || isNaN(usia.trim()) || usia.trim().length !== 2) {
            document.getElementById("umurError").style.display = "block";
            isValid = false;
        } else {
            document.getElementById("umurError").style.display = "none";
        }

        if (jenisKelamin.trim() === "") {
            document.getElementById("jenisKelaminError").style.display = "block";
            isValid = false;
        } else {
            document.getElementById("jenisKelaminError").style.display = "none";
        }

        if (pekerjaan.trim() === "") {
            document.getElementById("pekerjaanError").style.display = "block";
            isValid = false;
        } else {
            document.getElementById("pekerjaanError").style.display = "none";
        }       

        if (saran.trim() === "") {
            document.getElementById('saranError').style.display = 'block';
            isValid = false;
        } else {
            document.getElementById('saranError').style.display = 'none';
        }

        // Validasi radio button
        var radioGroups = document.querySelectorAll('input[type="radio"]');
        var radioChecked = false;

        radioGroups.forEach(function(radioGroup) {
            if (radioGroup.checked) {
                radioChecked = true;
            }
        });

        if (!radioChecked) {
          Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Anda harus memilih penilaian untuk semua pertanyaan.'
          });
            return false;
        }

        return isValid; // Form bisa di-submit jika semua validasi berhasil
    }
</script>



  <!-- jQuery -->
  <script src="/assets/vendors/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="/assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<!-- FastClick -->
	<script src="/assets/vendors/fastclick/lib/fastclick.js"></script>
	<!-- NProgress -->
	<script src="/assets/vendors/nprogress/nprogress.js"></script>
	<!-- bootstrap-progressbar -->
	<script src="/assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
	<!-- iCheck -->
	<script src="/assets/vendors/iCheck/icheck.min.js"></script>
	<!-- bootstrap-daterangepicker -->
	<script src="/assets/vendors/moment/min/moment.min.js"></script>
	<script src="/assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
	<!-- bootstrap-wysiwyg -->
	<script src="/assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
	<script src="/assets/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
	<script src="/assets/vendors/google-code-prettify/src/prettify.js"></script>
	<!-- jQuery Tags Input -->
	<script src="/assets/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
	<!-- Switchery -->
	<script src="/assets/vendors/switchery/dist/switchery.min.js"></script>
	<!-- Select2 -->
	<script src="/assets/vendors/select2/dist/js/select2.full.min.js"></script>
	<!-- Parsley -->
	<script src="/assets/vendors/parsleyjs/dist/parsley.min.js"></script>
	<!-- Autosize -->
	<script src="/assets/vendors/autosize/dist/autosize.min.js"></script>
	<!-- jQuery autocomplete -->
	<script src="/assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
	<!-- starrr -->
	<script src="/assets/vendors/starrr/dist/starrr.js"></script>
	<!-- Custom Theme Scripts -->
	<script src="/assets/build/js/custom.min.js"></script>

  </body>
</html>

