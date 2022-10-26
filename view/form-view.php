<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
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
                                <label for="labelEmail">Email</label>
                                <input type="email" class="form-control" id="idEmail" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="labelProgramStudi">Program Studi</label>
                                <select name="programStudi" id="idProgramStudi">
                                    <option value="IF">S1 Teknik Informatika</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="labelMataKuliah">Mata Kuliah</label>
                                <select name="mataKuliah" id="idMataKuliah">
                                    <option value="dasprog">IN010 / Dasar Pemrograman</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="labelPertemuan">Pertemuan Ke</label>
                                <select name="pertemuan" id="idPertemuan">
                                    <option value="satu">1</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="labelTanggal">Tanggal</label>
                                <input type="date" id="idTanggal" name="tanggal">
                            </div>
                            <div class="form-group">
                                <label for="labelWaktuMulai">Waktu Mulai</label>
                                <input type="time" id="idWaktuMulai" name="waktuMulai">
                            </div>
                            <div class="form-group">
                                <label for="labelJumlahMahasiswa">Jumlah Mahasiswa</label>
                                <input type="number" id="idJumlahMahasiswa" name="jumlahMahasiswa" min="0" max="100">
                            </div>
                            <div class="form-group">
                                <label for="labelMateri">Materi Pokok Bahasan</label>
                                <input type="text" class="form-control" id="idMateri" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="labelCatatan">Catatan</label>
                                <textarea rows="4" cols="50" name="catatan"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="labelJumlahAsisten">Jumlah Asisten</label>
                                <input type="number" id="idJumlahAsisten" name="jumlahAsisten" min="0" max="100">
                            </div>
                            <div class="form-group">
                                <label for="labelNRPAsisten">NRP Asisten</label>
                                <input type="text" id="idNRPAsisten" name="NRPAsisten">
                            </div>
                            <div class="form-group">
                                <label for="labelJumlahJam">Jumlah Jam</label>
                                <input type="number" id="idJumlahJam" name="jumlahJam" min="0" max="500">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Bukti Attendance</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </form>
                </div>
                <!-- /.card -->