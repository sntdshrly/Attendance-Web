<div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Attendance</h3>
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
                    <th >Pertemuan Ke</th>
                    <th >Tanggal</th>
                    <th >Waktu Mulai</th>
                    <th >Jumlah Mahasiswa</th>
                    <th >Materi</th>
                    <th >Keterangan</th>
                    <th >Dibantu Asisten</th>
                    <th >Bukti</th>
                    <th >Kelas</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                foreach ( $detail as $details){
                    if($details->getJadwal()->getDosen()->getNik() == $_SESSION['web_nik']) {
                        echo '<tr>';
                        echo '<th>' . $details->getPertemuanKe() . '</th>';
                        echo '<th>' . $details->getTanggal() . '</th>';
                        echo '<th>' . $details->getWaktuMulai() . '</th>';
                        echo '<th>' . $details->getJumlahMahasiswa() . '</th>';
                        echo '<th>' . $details->getMateri() . '</th>';
                        echo '<th>' . $details->getKeterangan() . '</th>';
                        echo '<th>' . $details->getDibantuAsisten() . '</th>';
                        echo '<th>' . $details->getBukti() . '</th>';
                        echo '<th>' . $details->getJadwal()->getKelasJadwal() . '</th>';
                        echo '</tr>';
                    }
                }

                ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->