<!DOCTYPE html>
<html lang="en">
    <?php
    function indo($tanggal)
    {
        $bulan = [
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember',
        ];

        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
    }

    ?>
<head>
    @include('pengguna.layout.header')
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-2" align="center">
                <img src="{{ asset('logo/logo.jpg') }}" alt="" style="width:100px; text-align: center;">
            </div>
            <div class="col-md-8 col-8 text-center">
                <h4>KEMENTERIAN KESEHATAN REPUBLIK INDONESIA</h4>
                <h5>DIREKTORAT JENDERAL PELAYANAN KESEHATAN</h5>
                <h6>RUMAH SAKIT UMUM PUSAT DR. M. DJAMIL PADANG</h6>
                <p>Jalan Perintis Kemerdekaan Padang – 2512</p>
                <p>Phone : (0751) 32371, 810253, 810254 Fax : (0751) 32371</p>
                <p>Website : www.rsdjamil.co.id, Email : rsupdjamil@yahoo.com</p>
            </div>
            <div class="col-md-2 col-2">
                <img src="{{ asset('logo/logo2.png') }}" alt="" style="width:100px; text-align: center;">
            </div>
        </div>
        <hr style="background-color: black; width: 100%; height: 10px;">
        <div class="col-md-12">
            <h6 class="text-center mb-3">HASIL KONSULTASI PASIEN DIAGNOSIS AWAL GANGGUAN AUTISME</h6>
            <div class="row mt-3">
                <div class="col-md-2 col-12">
                    <label for="">Tanggal</label>
                </div>

                <div class="col-md-10 col-12">
                    <label for="">{{ $data->riwayat->created_at }}</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-12">
                    <label for="">Nama</label>
                </div>

                <div class="col-md-10 col-12">
                    <label for="">{{ $data->riwayat->pasien->nama_pasien }}</label>
                </div>
            </div>
            <div class="row mt-3 mb-3">
                <div class="col-md-6 col-6">
                    <h6>Hasil Diagnosis</h6>
                    <div class="row mt-2">
                        <div class="col-md-12 col-12">
                            <label for="">Gangguan Terdekteksi</label>
                        </div>
                        <div class="col-md-12 col-12">
                            <label for="">{{ $data->riwayat->hasil_diagnosis }}</label>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12 col-12">
                            <label for="">Akurasi Gangguan</label>
                        </div>
                        <div class="col-md-12 col-12">
                            <label for="">{{ $data->riwayat->akurasi_hasil_diagnosis }}</label>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12 col-12">
                            <label for="">Saran Penanganan</label>
                        </div>
                        <div class="col-md-12 col-12">
                            <label for="" style="text-align: justify">{{ $data->riwayat->solusi }}</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-6">
                    <h6>Kemungkinan Gangguan Lain Terdeteksi</h6>
                    <div class="row mt-2">
                        <div class="col-md-12 col-12">
                            <label for="">Gangguan Terdekteksi</label>
                        </div>
                        <div class="col-md-12 col-12">
                            <label for="">{{ $data->riwayat->diagnosa_lain }}</label>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12 col-12">
                            <label for="">Akurasi Gangguan</label>
                        </div>
                        <div class="col-md-12 col-12">
                            <label for="">{{ $data->riwayat->akurasi_diagnosa_lain }}</label>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12 col-12">
                            <label for="">Saran Penanganan</label>
                        </div>
                        <div class="col-md-12 col-12">
                            <label for="" style="text-align: justify">{{ $data->riwayat->solusi_diagnosa_lain }}</label>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Gejala</th>
                        <th>Parameter Terpilih</th>
                        <th>Nilai Parameter</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $gejala = DB::table('himpunanfuzzifikasis')
                            ->whereIn('id', [$data->h1, $data->h2, $data->h3, $data->h4, $data->h5])
                            ->get();
                    @endphp
                    @foreach ($gejala as $no => $g)
                        <tr>
                            <td>{{ $no+1 }}</td>
                            <td>{{ $g->nama_himpunan }}</td>
                            <td>{{ $g->batas_bawah }} - {{ $g->batas_atas }}</td>
                            <td>{{ $g->batas_tengah1 }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row mt-3 mb-3">
                <div class="col-md-10"></div>
                <div class="col-md-2" align="center">
                    <p>
                        Padang, {{ indo(date('Y-m-d')) }}
                    </p>
                    <span >{{ $data->jabatan }}</span>
                    <p class="mt-2">
                        <img src="{{ asset('paraf/'.$data->paraf) }}" alt="" style="width:100px;">
                    </p>
                    <p class="mt-2">{{ $data->nama }}</p>
                </div>
            </div>
        </div>
    </div>
    @include('pengguna.layout.script')
    <script>
        window.print();
    </script>
</body>

</html>
