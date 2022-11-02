<div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Program Studi</h3>
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
                    <th >Id Prodi</th>
                    <th >Nama Prodi</th>
                    <th >Tingkatan Prodi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                foreach ( $prodi as $prodis){
                    echo '<tr>';
                    echo '<th>' . $prodis->getIdProdi() . '</th>';
                    echo '<th>' . $prodis->getNamaProdi() . '</th>';
                    echo '<th>' . $prodis->getTingkatanProdi() . '</th>';
                    
                    // echo '<th>' . $details->getJadwal()->getKelasJadwal() . '</th>';
                    echo '</tr>';
                }

                ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->