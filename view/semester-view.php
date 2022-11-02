<div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Semester</h3>
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
                    <th >Id Semester</th>
                    <th >Nama Tahun Semester</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                foreach ( $semester as $semesters){
                    echo '<tr>';
                    echo '<th>' . $semesters->getIdsemester() . '</th>';
                    echo '<th>' . $semesters->getNamaTahunsemester() . '</th>'; 
                    // echo '<th>' . $details->getJadwal()->getKelasJadwal() . '</th>';
                    echo '</tr>';
                }

                ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->