<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">Jadwal</h3>
                    <div class="card-tools">
                        <a href="#" class="btn btn-tool btn-sm">
                            <i class="fas fa-download"></i>
                        </a>
                        <a href="#" class="btn btn-tool btn-sm">
                            <i class="fas fa-bars"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Kelas</th>
                            <th>Hari</th>
                            <th>Waktu Mulai</th>
                            <th>Mata Kuliah</th>
                            <th>Dosen</th>
                            <th>Semester</th>
                            <th>Ruangan</th>
                            <th>Tipe</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($jadwal as $jadwals) {
                            if ($_SESSION['web_role'] == 1) {
                                echo '<tr>';
                                echo '<td>' . $jadwals->getKelasJadwal() . '</td>';
                                echo '<td>' . $jadwals->getHariJadwal() . '</td>';
                                echo '<td>' . $jadwals->getWaktuMulaiJadwal() . '</td>';
                                echo '<td>' . $jadwals->getMatkul()->getNamaMk() . '</td>';
                                echo '<td>' . $jadwals->getDosen()->getNamaDosen() . '</td>';
                                echo '<td>' . $jadwals->getSemester()->getNamaTahunSemester() . '</td>';
                                echo '<td>' . $jadwals->getRuangan()->getNamaRuangan() . '</td>';
                                echo '<td>' . $jadwals->getTipeJadwal() . '</td>';
                                echo '<td> 
                    <button onclick="editJadwal(\'' . $jadwals->getKelasJadwal() . '\')" class="btn btn-success">Edit</button>
                    <button onclick="deleteJadwal(\'' . $jadwals->getKelasJadwal() . '\', \'' . $jadwals->getMatkul()->getKodeMk() . '\', \'' . $jadwals->getDosen()->getNik() . '\', \'' . $jadwals->getSemester()->getIdSemester() . '\', \'' . $jadwals->getTipeJadwal() . '\')" class="btn btn-danger">Delete</button></td>';
                                echo '</tr>';
                            } else {
                                if ($jadwals->getDosen()->getNik() == $_SESSION['web_nik']) {
                                    echo '<tr>';
                                    echo '<td>' . $jadwals->getKelasJadwal() . '</td>';
                                    echo '<td>' . $jadwals->getHariJadwal() . '</td>';
                                    echo '<td>' . $jadwals->getWaktuMulaiJadwal() . '</td>';
                                    echo '<td>' . $jadwals->getMatkul()->getNamaMk() . '</td>';
                                    echo '<td>' . $jadwals->getDosen()->getNamaDosen() . '</td>';
                                    echo '<td>' . $jadwals->getSemester()->getNamaTahunSemester() . '</td>';
                                    echo '<td>' . $jadwals->getRuangan()->getNamaRuangan() . '</td>';
                                    echo '<td>' . $jadwals->getTipeJadwal() . '</td>';
                                    echo '</tr>';
                                }
                            }
                        }

                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function editJadwal(kelas, matkul, dosen, semester, tipe) {
        window.location = "index.php?webmenu=edgenProdi&eidProdi=" + id;
    }

    function deleteJadwal(kelas, matkul, dosen, semester, tipe) {
        const confirmation = window.confirm("Are you sure want to delete this data?");
        if (confirmation) {
            window.location = "index.php?webmenu=jadwal&delcomJadwal=1&dkJadwal=" + kelas + "&dmJadwal=" + matkul + "&ddJadwal=" + dosen + "&dsJadwal=" + semester + "&dtJadwal=" + tipe;
        }
    }
</script>