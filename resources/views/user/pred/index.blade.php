@extends('layout.master2')
@section('tittle', 'Emoodji - Prediksi')
@section('header', 'header2')
@section('page', 'Prediksi')
@section('nav_prediksi', 'active')

@section('content')
    <div class="py-5 container-xxl">
        <div class="container">
            <div class="row g-5">

                <!-- Form / Unlock -->
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <p class="px-3 py-1 border rounded d-inline-block text-primary fw-semi-bold">Prediksi</p>
                    <h1 class="mb-4 display-5">Cek Kemungkinan Depresi</h1>
                    <p class="mb-4">Selamat datang di Fitur Cek Depresi Emoodji, alat yang membantu mengevaluasi tingkat
                        depresi.</p>
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif


                    <!-- Unlock -->
                    @if (!isset($session) || $session->status !== 'active')
                        <form method="POST" action="{{ route('prediksi.unlock') }}">
                            @csrf
                            <input type="hidden" name="feature_id" value="{{ $feature->id }}">
                            <button type="submit" class="btn btn-warning">
                                Unlock Prediksi ({{ $feature->unlock_cost }} reward)
                            </button>
                        </form>

                        <!-- Form Prediksi -->
                    @else
                        <form action="{{ route('prediksi.submit') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <!-- Jenis Kelamin -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-control" id="femaleres" name="femaleres" required>
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="0">Pria</option>
                                            <option value="1">Wanita</option>
                                        </select>
                                        <label for="femaleres">Jenis Kelamin</label>
                                    </div>
                                </div>

                                <!-- Usia -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="age" name="age"
                                            placeholder="Usiamu" required>
                                        <label for="age">Usia</label>
                                    </div>
                                </div>

                                <!-- Sudah Menikah -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-control" id="married" name="married" required>
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="0">Belum</option>
                                            <option value="1">Sudah</option>
                                        </select>
                                        <label for="married">Apakah sudah menikah</label>
                                    </div>
                                </div>

                                <!-- Jumlah Anak -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="children" name="children"
                                            placeholder="Jumlah anak" required>
                                        <label for="children">Jumlah anak</label>
                                    </div>
                                </div>

                                <!-- Pendidikan -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-control" id="edu" name="edu" required>
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="0">Tidak bersekolah</option>
                                            <option value="1">Taman Kanak-kanak</option>
                                            <option value="7">SD sederajat</option>
                                            <option value="10">SMP sederajat</option>
                                            <option value="13">SMA sederajat</option>
                                            <option value="16">S1 sederajat</option>
                                            <option value="20">S2 sederajat</option>
                                        </select>
                                        <label for="edu">Pendidikan Terakhir</label>
                                    </div>
                                </div>

                                <!-- Jumlah anggota keluarga -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="hhsize" name="hhsize"
                                            placeholder="Jumlah anggota keluarga" required>
                                        <label for="hhsize">Jumlah anggota keluarga</label>
                                    </div>
                                </div>

                                <!-- Hari ini -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-control" id="day_of_week" name="day_of_week" required>
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="0">Minggu</option>
                                            <option value="1">Senin</option>
                                            <option value="2">Selasa</option>
                                            <option value="3">Rabu</option>
                                            <option value="4">Kamis</option>
                                            <option value="5">Jumat</option>
                                            <option value="6">Sabtu</option>
                                        </select>
                                        <label for="day_of_week">Hari ini</label>
                                    </div>
                                </div>

                                <!-- e-wallet -->
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <select class="form-control" id="saved_mpesa" name="saved_mpesa" required>
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="0">Tidak</option>
                                            <option value="1">Ya</option>
                                        </select>
                                        <label for="saved_mpesa">Punya e-wallet?</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <select class="form-control" id="received_mpesa" name="received_mpesa" required>
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="0">Tidak</option>
                                            <option value="1">Ya</option>
                                        </select>
                                        <label for="received_mpesa">Menerima uang melalui e-wallet?</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <select class="form-control" id="given_mpesa" name="given_mpesa" required>
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="0">Tidak</option>
                                            <option value="1">Ya</option>
                                        </select>
                                        <label for="given_mpesa">Memberi uang melalui e-wallet?</label>
                                    </div>
                                </div>

                                <!-- Kegiatan ekonomi -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-control" id="ent_wagelabor" name="ent_wagelabor" required>
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="0">Tidak</option>
                                            <option value="1">Ya</option>
                                        </select>
                                        <label for="ent_wagelabor">Terlibat pekerjaan berbayar</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-control" id="ent_ownfarm" name="ent_ownfarm" required>
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="0">Tidak</option>
                                            <option value="1">Ya</option>
                                        </select>
                                        <label for="ent_ownfarm">Terlibat pertanian sendiri</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-control" id="ent_business" name="ent_business" required>
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="0">Tidak</option>
                                            <option value="1">Ya</option>
                                        </select>
                                        <label for="ent_business">Terlibat dalam bisnis</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-control" id="ent_nonagbusiness" name="ent_nonagbusiness"
                                            required>
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="0">Tidak</option>
                                            <option value="1">Ya</option>
                                        </select>
                                        <label for="ent_nonagbusiness">Terlibat bisnis non-pertanian</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="px-5 py-3 btn btn-primary" type="submit">Prediksi</button>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>

                <!-- Gambar / Ilustrasi -->
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 450px;">
                    <div class="overflow-hidden rounded position-relative h-100">
                        <img class="rounded img-fluid" src="{{ asset('img/image (3).jpg') }}">
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
