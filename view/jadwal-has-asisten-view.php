<div class="card">
    <div class="card-header border-0">
        <h3 class="card-title">Jadwal Has Asisten</h3>
        <div class="card-tools">
            <a href="#" class="btn btn-tool btn-sm">
                <i class="fas fa-download"></i>
            </a>
            <a href="#" class="btn btn-tool btn-sm">
                <i class="fas fa-bars"></i>
            </a>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-striped table-valign-middle">
            <thead>
            <tr>
                <th>Kelas</th>
                <th>Semester</th>
                <th>Dosen</th>
                <th>Matkul</th>
                <th>Tipe</th>
                <th>Asisten</th>
                <th>Pertemuan</th>
                <th>Tanggal</th>
                <th>Jumlah Jam</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ( $jadwalHasAsisten as $item){
                echo '<tr>';
                echo '<th>' . $item->getJadwal()->getKelasJadwal() . '</th>';
                echo '<th>' . $item->getJadwal()->getSemester()->getNamaTahunSemester() . '</th>';
                echo '<th>' . $item->getJadwal()->getDosen()->getNamaDosen() . '</th>';
                echo '<th>' . $item->getJadwal()->getMatkul()->getNamaMk() . '</th>';
                echo '<th>' . $item->getJadwal()->getTipeJadwal() . '</th>';
                echo '<th>' . $item->getAsisten()->getNamaMahasiswa() . '</th>';
                echo '<th>' . $item->getPertemuan() . '</th>';
                echo '<th>' . $item->getTanggal() . '</th>';
                echo '<th>' . $item->getJumlahJam() . '</th>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
