
<div class="main-menu-area mg-tb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro" id="nav">
                    <li>
                     <?php if (isset($_SESSION['guru'])):?>  

                        <a  href="index.php"><i class="notika-icon notika-house"></i> Home</a>
                    </li>
                    <li >
                        <a  href="absen_siswa.php"><i class="notika-icon notika-edit"></i>Absen Siswa</a>
                    </li>
                   
                    <li>
                        <a  href="tugas_siswa.php"><i class="notika-icon notika-bar-chart"></i>Tugas Siswa</a>
                    </li>
                     <li>
                        <a  href="nilai_siswa.php"><i class="notika-icon notika-form"></i>Penilaian</a>
                    </li>
                    <li>
                        <a  href="catatan_siswa.php"><i class="notika-icon notika-windows"></i>Catatan Siswa</a>
                    </li>
                <?php endif ?>
            </ul>

        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    $(function() {
        $('#nav a[href~="' + location.href + '"]').parents('li').addClass('active');
    });
</script>
<style type="text/css">
#nav li.active a {
    background-color: blue;
}
</style>