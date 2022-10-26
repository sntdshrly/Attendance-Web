<!-- Main content -->
<section class="content">
    <!-- left column -->
    <div class="col-md-13">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Input Form</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form">
                <div class="card-body">
                    <div class="form-group">
                        <label for="labelProgramStudi">Program Studi</label>
                        <select class="form-control select2" style="width: 100%;" name="programStudi" id="idProgramStudi">
                            <option value="<?php echo $prodi->getNamaProdi(); ?>"></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="labelMataKuliah">Mata Kuliah</label>
                        <select class="form-control select2" style="width: 100%;" name="mataKuliah" id="idMataKuliah">
                            <option value="dasprog">IN010 / Dasar Pemrograman</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="labelPertemuan">Pertemuan Ke</label>
                        <select class="form-control select2" style="width: 100%;" name="pertemuan" id="idPertemuan">
                            <option value="satu">1</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="labelTanggal">Tanggal</label>
                        <input type="date" id="idTanggal" name="tanggal" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                    </div>
                    <div class="form-group">
                        <label for="labelWaktuMulai">Waktu Mulai</label>
                        <input type="time" id="idWaktuMulai" name="waktuMulai" class="form-control datetimepicker-input">
                    </div>
                    <div class="form-group">
                        <label for="labelJumlahMahasiswa">Jumlah Mahasiswa</label>
                        <input type="number" id="idJumlahMahasiswa" name="jumlahMahasiswa" min="0" max="100" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="labelMateri">Materi Pokok Bahasan</label>
                        <input type="text" class="form-control" id="idMateri" name="materi" placeholder="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="labelCatatan">Catatan</label>
                        <textarea rows="4" cols="50" name="catatan" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="labelJumlahAsisten">Jumlah Asisten</label>
                        <input type="number" id="idJumlahAsisten" name="jumlahAsisten" min="0" max="100" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="labelNRPAsisten">NRP Asisten</label>
                        <input type="text" id="idNRPAsisten" name="NRPAsisten" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="labelJumlahJam">Jumlah Jam</label>
                        <input type="number" id="idJumlahJam" name="jumlahJam" min="0" max="500" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Bukti Kehadiran</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="bukti" class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text" id="">Upload</span>
                        </div>
                      </div>
                    </div>
                </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" name="btnAddDetail" class="btn btn-primary">Submit</button>
                    </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</section>