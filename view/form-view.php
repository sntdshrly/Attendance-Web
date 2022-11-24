<!-- Main content -->
<section class="content">
    <!-- left column -->
    <div class="col-md-13">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Input Form Detail</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <!-- <div class="form-group">
                        <label for="labelProgramStudi">Program Studi</label>
                        <select class="form-control select2" style="width: 100%;" name="programStudi" id="idProgramStudi">
                            <?php
                            /**@var $item Prodi*/
                            // foreach($prodi as $item) {
                            //     echo '<option>'.$item->getNamaProdi().'</option>';
                            // }
                            // 
                            ?>
                        </select>
                    </div> -->
                    <div class="form-group">
                        <label for="labelJadwal">Jadwal</label>
                        <select class="form-control select2" style="width: 100%;" name="jadwal" id="idJadwal">
                            <?php
                            /**@var $item Jadwal*/
                            foreach ($jadwal as $item) {
                                if ($_SESSION['web_role'] == 1) {
                                    echo '<option value="{"data":[A, 1, 720307]}>' . $item->getKelasJadwal() . " - " . $item->getSemester()->getIdSemester() . " - " . $item->getDosen()->getNik() . " - " . $item->getMatkul()->getKodeMk() . " - " . $item->getTipeJadwal() . '</option>';
                                } else {
                                    if ($item->getDosen()->getNik() == $_SESSION['web_nik']) {
                                        echo '<option>' . $item->getKelasJadwal() . " - " . $item->getSemester()->getIdSemester() . " - " . $item->getDosen()->getNik() . " - " . $item->getMatkul()->getKodeMk() . " - " . $item->getTipeJadwal() . '</option>';
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="labelPertemuan">Pertemuan Ke</label>
                        <select class="form-control select2" style="width: 100%;" name="pertemuan" id="idPertemuan">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="labelTanggal">Tanggal</label>
                        <input type="date" id="idTanggal" name="tanggal" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask required>
                    </div>
                    <div class="form-group">
                        <label for="labelWaktuMulai">Waktu Mulai</label>
                        <input type="time" id="idWaktuMulai" name="waktuMulai" class="form-control datetimepicker-input" required>
                    </div>
                    <div class="form-group">
                        <label for="labelJumlahMahasiswa">Jumlah Mahasiswa</label>
                        <input type="number" id="idJumlahMahasiswa" name="jumlahMahasiswa" min="0" max="100" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="labelMateri">Materi Pokok Bahasan</label>
                        <input type="text" class="form-control" id="idMateri" name="materi" placeholder="" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="labelCatatan">Catatan</label>
                        <textarea rows="4" cols="50" name="catatan" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="labelJumlahJam">Jumlah Jam</label>
                        <input type="number" id="idJumlahJam" name="jumlahJam" min="0" max="500" class="form-control">
                    </div>
                    <!-- <div class="form-group">
                        <label for="labelBukti">Bukti Kehadiran</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <label class="custom-file-label" for="labelBukti">Choose file</label>
                                <input type="file" name="bukti" accept="image/png, image/jpeg" class="custom-file-input" id="labelBukti">
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text" id="">Upload</span>
                            </div>
                        </div>
                    </div>
                 -->
                    <div class="form-group">
                        <label for="photoId" class="form-label">Bukti Kehadiran</label>
                        <input type="file" name="bukti" id="photoId" class="form-control" accept="image/png, image/jpeg">
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