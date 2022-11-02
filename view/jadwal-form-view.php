<!-- Main content -->
<section class="content">
    <!-- left column -->
    <div class="col-md-13">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Input Form Jadwal</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label for="labelKelas">Kelas</label>
                        <input type="text" class="form-control" id="idKelas" name="kelas" placeholder="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="labelHari">Hari</label>
                        <select class="form-control select2" style="width: 100%;" name="pertemuan" id="idPertemuan">
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                            <option value="Minggu">Minggu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="labelWaktuMulai">Waktu Mulai</label>
                        <input type="time" id="idWaktuMulai" name="waktuMulai" class="form-control datetimepicker-input">
                    </div>
                    <div class="form-group">
                        <label for="labelMatkul">Matkul</label>
                        <select class="form-control select2" style="width: 100%;" name="matkul" id="idMatkul">
                            <?php
                            /**@var $item Matkul*/
                            foreach($matkul as $item) {
                                echo '<option>'.$item->getKodeMk().'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="labelDosen">Dosen</label>
                        <select class="form-control select2" style="width: 100%;" name="dosen" id="idDosen">
                            <?php
                            /**@var $item Dosen*/
                            foreach($dosen as $item) {
                                echo '<option>'.$item->getNik().'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="labelSemester">Semester</label>
                        <select class="form-control select2" style="width: 100%;" name="semester" id="idSemester">
                            <?php
                            /**@var $item Semester*/
                            foreach($semester as $item) {
                                echo '<option>'.$item->getIdSemester().'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="labelRuangan">Ruangan</label>
                        <select class="form-control select2" style="width: 100%;" name="ruangan" id="idRuangan">
                            <?php
                            /**@var $item Ruangan*/
                            foreach($ruangan as $item) {
                                echo '<option>'.$item->getIdRuangan().'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="labelTipe">Tipe</label>
                        <select class="form-control select2" style="width: 100%;" name="tipe" id="idTipe">
                            <option value="-">-</option>
                            <option value="Teori">Teori</option>
                            <option value="Praktikum">Praktikum</option>
                        </select>
                    </div>

                <div class="card-footer">
                    <button type="submit" name="btnAddJadwal" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</section>