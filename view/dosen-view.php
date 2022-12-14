<?php
// Get status message
if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusType = 'alert-success';
            $statusMsg = 'Members data has been imported successfully.';
            break;
        case 'err':
            $statusType = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusType = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusType = '';
            $statusMsg = '';
    }
}
?>

<!-- Display status message -->
<?php if(!empty($statusMsg)){ ?>
    <div class="col-xs-12">
        <div class="alert <?php echo $statusType; ?>"><?php echo $statusMsg; ?></div>
    </div>
<?php } ?>

<div class="row">
    <!-- Import link -->
    <div class="col-md-12 head">
        <div class="float-right">
            <a href="javascript:void(0);" class="btn btn-success" onclick="formToggle('importFrm');"><i class="plus"></i> Import</a>
        </div>
    </div>
    <!-- CSV file upload form -->
    <div class="col-md-12" id="importFrm" style="display: none;">
        <form action="view/import-dosen.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file" />
            <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
        </form>
    </div>
</div>

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

  // Show/hide CSV upload form
  function formToggle(ID){
      var element = document.getElementById(ID);
      if(element.style.display === "none"){
          element.style.display = "block";
      }else{
          element.style.display = "none";
      }
  }
</script>