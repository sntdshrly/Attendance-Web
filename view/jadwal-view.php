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
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th >Kelas</th>
                    <th >Hari</th>
                    <th >Waktu Mulai</th>
                    <th >Mata Kuliah</th>
                    <th >Dosen</th>
                    <th >Semester</th>
                    <th >Ruangan</th>
                    <th >Tipe</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                foreach ( $jadwal as $jadwals){
                    echo '<tr>';
                    echo '<th>' . $jadwals->getKelasJadwal() . '</th>';
                    echo '<th>' . $jadwals->getHariJadwal() . '</th>'; 
                    echo '<th>' . $jadwals->getWaktuMulaiJadwal() . '</th>';
                    echo '<th>' . $jadwals->getMatkul()->getNamaMk() . '</th>';
                    echo '<th>' . $jadwals->getDosen()->getNamaDosen() . '</th>';
                    echo '<th>' . $jadwals->getSemester()->getNamaTahunSemester() . '</th>';
                    echo '<th>' . $jadwals->getRuangan()->getNamaRuangan() . '</th>';
                    echo '<th>' . $jadwals->getTipeJadwal() . '</th>';
                    echo '</tr>';
                }

                ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->