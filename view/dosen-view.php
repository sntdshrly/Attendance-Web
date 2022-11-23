<div class="card">
  <div class="card-header border-0">
    <h3 class="card-title">Dosen</h3>
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
          <th>NIK</th>
          <th>Email</th>
          <th>Nama Dosen</th>
          <th>Role</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($dosen as $dosens) {
          echo '<tr>';
          echo '<th>' . $dosens->getNik() . '</th>';
          echo '<th>' . $dosens->getEmail() . '</th>';
          echo '<th>' . $dosens->getNamaDosen() . '</th>';
          echo '<th>' . $dosens->getRole()->getName() . '</th>';
          echo '<th> 
                    <button onclick="editDosen(\'' . $dosens->getNik() . '\')" class="btn btn-success">Edit</button>
                    <button onclick="deleteDosen(\'' . $dosens->getNik() . '\')" class="btn btn-danger">Delete</button></th>';
          // echo '<th>' . $details->getJadwal()->getKelasJadwal() . '</th>';
          echo '</tr>';
        }

        ?>
      </tbody>
    </table>
  </div>
</div>
<!-- /.card -->
<script>
  // Fungsi editDosen & deleteDosen 
  function editDosen(id) {
    window.location = "index.php?webmenu=edgenDosen&eidDosen=" + id;
  }

  function deleteDosen(id) {
    const confirmation = window.confirm("Are you sure want to delete this data?");
    if (confirmation) {
      window.location = "index.php?webmenu=dosen&delcomDosen=1&didDosen=" + id;
    }
  }
</script>