<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("ppnpn/components/header.php") ?>
    <!-- Tambahkan SweetAlert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Flashdata for SweetAlert -->
    <?php if ($this->session->flashdata('password_err')) { ?>
    <script>
        swal({
            title: "Error Password!",
            text: "Ketik Ulang Password!",
            icon: "error"
        });
    </script>
    <?php } ?>
    <?php if ($this->session->flashdata('edit')) { ?>
    <script>
        swal({
            title: "Success!",
            text: "Data Berhasil Diedit!",
            icon: "success"
        });
    </script>
    <?php } ?>
    <?php if ($this->session->flashdata('eror_edit')) { ?>
    <script>
        swal({
            title: "Error!",
            text: "Data Gagal Diedit!",
            icon: "error"
        });
    </script>
    <?php } ?>
    <?php if ($this->session->flashdata('input')) { ?>
    <script>
        swal({
            title: "Success!",
            text: "Data Berhasil Ditambahkan!",
            icon: "success"
        });
    </script>
    <?php } ?>
    <?php if ($this->session->flashdata('eror')) { ?>
    <script>
        swal({
            title: "Error!",
            text: "Data Gagal Ditambahkan!",
            icon: "error"
        });
    </script>
    <?php } ?>

    <div class="wrapper">

        <!-- Navbar -->
        <?php $this->load->view("ppnpn/components/navbar.php") ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view("ppnpn/components/sidebar.php") ?>

        <div class="main-container">
            <div class="pd-ltr-20 xs-pd-20-10">
                <div class="min-height-200px">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="title">
                                    <h4>Form Pengajuan Izin Keluar Kantor</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="index.html">Home</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Form Pengajuan Izin Keluar Kantor
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <!-- Main content -->
                    <div class="row">
                        <div class="col-12 mb-30">
                            <div class="pd-20 card-box height-100-p">
                                <form id="formPengajuanPerbaikanbmn" action="<?= base_url();?>Form_izin/proses_izin_kaurrt" method="POST" enctype="multipart/form-data">
                                    <input type="text" value="<?=$this->session->userdata('id_user') ?>" name="id_user" hidden>
                                    <div class="form-group">
                                        <label for="alasan">Alasan</label>
                                        <textarea class="form-control" id="alasan" rows="2" name="alasan" required></textarea>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="perihal_izin">Perihal Izin</label>
                                        <input type="text" class="form-control" id="perihal_izin" aria-describedby="perihal_izin" name="perihal_izin" required>
                                    </div> -->
                                    <div class="form-group">
                                        <label for="mulai">Mulai Izin</label>
                                        <input type="time" class="form-control" id="mulai" aria-describedby="mulai" name="mulai" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="berakhir">Berakhir Izin</label>
                                        <input type="time" class="form-control" id="berakhir" aria-describedby="berakhir" name="berakhir" required>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                                <button type="button" class="btn btn-secondary" onclick="history.back()">Kembali</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <?php $this->load->view("ppnpn/components/js.php") ?>

    <!-- Load jQuery -->
    <script src="<?= base_url(); ?>src/plugins/jquery/jquery.min.js"></script>

    <!-- Activate WhatsApp -->
    <script>
        $(document).ready(function () {
            var form = $('#formPengajuanPerbaikanbmn');

            form.submit(function (event) {
                event.preventDefault(); // Mencegah pengiriman formulir secara default

                // Mengirim data formulir menggunakan AJAX
                $.ajax({
                    type: 'POST',
                    url: form.attr('action'),
                    data: form.serialize(),
                    success: function (response) {
                        // Jika pengiriman formulir berhasil, arahkan ke WhatsApp
                        var message = encodeURIComponent("Saya telah mengajukan izin keluar kantor di sistem FrenSIP, mohon untuk ditindak lanjuti");
                        var phoneNumber = "+6281273071000"; // Nomor telepon dengan kode negara Indonesia
                        var whatsappUrl = "https://wa.me/" + phoneNumber + "?text=" + message;
                        window.open(whatsappUrl, '_blank');
                    },
                    error: function () {
                        swal({
                            title: "Success!",
                            text: "Data telah tersimpan.",
                            icon: "success"
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>
