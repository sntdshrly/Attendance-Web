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
          <th>Id Prodi</th>
          <th>Nama Prodi</th>
          <th>Tingkatan Prodi</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($prodi as $prodis) {
          echo '<tr>';
          echo '<th>' . $prodis->getIdProdi() . '</th>';
          echo '<th>' . $prodis->getNamaProdi() . '</th>';
          echo '<th>' . $prodis->getTingkatanProdi() . '</th>';
          echo '<th> 
                    <button onclick="editProdi(\'' . $prodis->getIdProdi() . '\')" class="btn btn-success">Edit</button>
                    <button onclick="deleteProdi(\'' . $prodis->getIdProdi() . '\')" class="btn btn-danger">Delete</button></th>';
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
  // Fungsi editProdi & deleteProdi 
  function editProdi(id) {
    window.location = "index.php?webmenu=edgenProdi&eidProdi=" + id;
  }

  function deleteProdi(id) {
    const confirmation = window.confirm("Are you sure want to delete this data?");
    if (confirmation) {
      window.location = "index.php?webmenu=prodi&delcomProdi=1&didProdi=" + id;
    }
  }
</script>