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
                        <select class="form-control select2" style="width: 100%;" name="kelas" id="idKelas">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="labelHari">Hari</label>
                        <select class="form-control select2" style="width: 100%;" name="hari" id="idHari">
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
                            foreach ($matkul as $item) {
                                echo '<option>' . $item->getKodeMk() . ' - ' . $item->getNamaMk() . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="labelDosen">Dosen</label>
                        <select class="form-control select2" style="width: 100%;" name="dosen" id="idDosen">
                            <?php
                            /**@var $item Dosen*/
                            foreach ($dosen as $item) {
                                echo '<option>' . $item->getNik() . ' - ' . $item->getNamaDosen() . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="labelSemester">Semester</label>
                        <select class="form-control select2" style="width: 100%;" name="semester" id="idSemester">
                            <?php
                            /**@var $item Semester*/
                            foreach ($semester as $item) {
                                echo '<option>' . $item->getIdSemester() . ' - ' . $item->getNamaTahunSemester() . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="labelRuangan">Ruangan</label>
                        <select class="form-control select2" style="width: 100%;" name="ruangan" id="idRuangan">
                            <?php
                            /**@var $item Ruangan*/
                            foreach ($ruangan as $item) {
                                echo '<option>' . $item->getIdRuangan() . ' - ' . $item->getNamaRuangan() . '</option>';
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
                    <!--                    <div class="form-group">-->
                    <!--                        <label for="labelJumlahAsisten">Jumlah Asisten</label>-->
                    <!--                        <input type="number" id="idJumlahAsisten" name="jumlahAsisten" min="0" max="100" class="form-control" required>-->
                    <!--                    </div>-->
                    <input type="checkbox" id="asisten1" name="asisten1" value="Asisten1" onclick="myFunction()">
                    <label for="asisten1"> Asisten 1 </label>
                    <input type="checkbox" id="noasisten1" name="asisten1" value="NoAsisten1" onclick="myFunction()">
                    <label for="asisten1"> Tanpa Asisten 1</label><br>

                    <div class="form-group">
                        <label for="labelNRPAsisten">NRP Asisten 1</label>
                        <select class="form-control select2" style="width: 100%;" name="asisten" id="idAsisten" disabled=TRUE>
                            <?php
                            /**@var $item Asisten*/
                            foreach ($asisten as $item) {
                                echo '<option>' . $item->getNrp() . " - " . $item->getNamaMahasiswa() . '</option>';
                            }

                            ?>
                        </select>
                    </div>

                    <input type="checkbox" id="asisten2" name="asisten2" value="Asisten2" onclick="myFunction()">
                    <label for="asisten2"> Asisten 2 </label>
                    <input type="checkbox" id="noasisten2" name="asisten2" value="NoAsisten2" onclick="myFunction()">
                    <label for="asisten2"> Tanpa Asisten 2</label><br>

                    <div class="form-group">
                        <label for="labelNRPAsisten">NRP Asisten 2</label>
                        <select class="form-control select2" style="width: 100%;" name="asisten" id="idAsisten2" disabled=TRUE>
                            <?php
                            /**@var $item Asisten*/
                            foreach ($asisten as $item) {
                                echo '<option>' . $item->getNrp() . " - " . $item->getNamaMahasiswa() . '</option>';
                            }
                            ?>
                        </select>
                    </div>


                    <input type="checkbox" id="asisten3" name="asisten3" value="Asisten3" onclick="myFunction()">
                    <label for="asisten3"> Asisten 3 </label>
                    <input type="checkbox" id="noasisten3" name="asisten3" value="NoAsisten3" onclick="myFunction()">
                    <label for="asisten3"> Tanpa Asisten 3</label><br>


                    <div class="form-group">
                        <label for="labelNRPAsisten">NRP Asisten 3</label>
                        <select class="form-control select2" style="width: 100%;" name="asisten" id="idAsisten3" disabled=TRUE>
                            <?php
                            /**@var $item Asisten*/
                            foreach ($asisten as $item) {
                                echo '<option>' . $item->getNrp() . " - " . $item->getNamaMahasiswa() . '</option>';
                            }
                            ?>
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
<script>
    function myFunction() {
        var checkBox1 = document.getElementById("asisten1");
        var checkBox2 = document.getElementById("noasisten1");

        var checkBox3 = document.getElementById("asisten2");
        var checkBox4 = document.getElementById("noasisten2");

        var checkBox5 = document.getElementById("asisten3");
        var checkBox6 = document.getElementById("noasisten3");

        if (checkBox1.checked == true) {
            document.getElementById("idAsisten").disabled = false;
        }
        if (checkBox2.checked == true) {
            document.getElementById("idAsisten").disabled = true;
        }

        if (checkBox3.checked == true) {
            document.getElementById("idAsisten2").disabled = false;
        }
        if (checkBox4.checked == true) {
            document.getElementById("idAsisten2").disabled = true;
        }

        if (checkBox5.checked == true) {
            document.getElementById("idAsisten3").disabled = false;
        }
        if (checkBox6.checked == true) {
            document.getElementById("idAsisten3").disabled = true;
        }

    }
</script>