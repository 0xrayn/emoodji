@extends('layout.master2')
@section('tittle', 'Emoodji - Prediksi')
@section('header', 'header2')
@section('page', 'Prediksi')
@section('nav_prediksi', 'active')

@section('content')

    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Prediksi</p>
                    <h1 class="display-5 mb-4">Cek Kemungkinan Depresi</h1>
                    <p class="mb-4">Selamat datang di Fitur Cek Depresi Emoodji, alat yang dirancang untuk membantu Anda mengevaluasi dan memahami tingkat depresi Anda.
                        Fitur ini menyediakan penilaian singkat yang dapat membantu Anda memprediksi apakah mungkin mengalami kondisi ini berdasarkan kondisi Anda.</p>
                    <form action="{{ route('cekDepresi') }}" method="POST">
                        @csrf
                        <div class="row g-3">

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-control" id="femaleres" name="femaleres">
                                        <option value="" selected disabled></option>
                                        <option value="0">Pria</option>
                                        <option value="1">Wanita</option>
                                    </select>
                                    <label for="femaleres">Jenis Kelamin</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="age" placeholder="Usiamu" name="age">
                                    <label for="age">Usia</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-control" id="married" name="married">
                                        <option value="" selected disabled></option>
                                        <option value="0">Belum</option>
                                        <option value="1">Sudah</option>
                                    </select>
                                    <label for="married">Apakah sudah menikah</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="children" placeholder="Jumlah anak" name="children">
                                    <label for="children">Jumlah anak</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-control" id="edu" name="edu">
                                        <option value="" selected disabled></option>
                                        <option value="0"> Tidak bersekolah</option>
                                        <option value="1"> Taman kanak-kanak</option>
                                        <option value="7"> SD sederajat</option>
                                        <option value="10"> SMP sederajat</option>
                                        <option value="13"> SMA sederajat</option>
                                        <option value="16"> S1 sederajat</option>
                                        <option value="20"> S2 sederajat</option>
                                    </select>
                                    <label for="edu">Pendidikan Terakhir</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="hhsize" placeholder="Jumlah anggota keluarga" name="hhsize">
                                    <label for="hhsize">Jumlah anggota keluarga</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-control" id="day_of_week" name="day_of_week">
                                        <option value="" selected disabled></option>
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

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-control" id="saved_mpesa" name="saved_mpesa">
                                        <option value="" selected disabled></option>
                                        <option value="0">Tidak</option>
                                        <option value="1">Ya</option>
                                    </select>
                                    <label for="saved_mpesa">Punya e-wallet?</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-control" id="received_mpesa" name="received_mpesa">
                                        <option value="" selected disabled></option>
                                        <option value="0">Tidak</option>
                                        <option value="1">Ya</option>
                                    </select>
                                    <label for="received_mpesa">Menerima uang melalui e-wallet?</label>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-control" id="given_mpesa" name="given_mpesa">
                                        <option value="" selected disabled></option>
                                        <option value="0">Tidak</option>
                                        <option value="1">Ya</option>
                                    </select>
                                    <label for="given_mpesa">Memberi uang melalui e-wallet?</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-control" id="ent_wagelabor" name="ent_wagelabor">
                                        <option value="" selected disabled></option>
                                        <option value="0">Tidak</option>
                                        <option value="1">Ya</option>
                                    </select>
                                    <label for="ent_wagelabor">Terlibat pekerjaan berbayar</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-control" id="ent_ownfarm" name="ent_ownfarm">
                                        <option value="" selected disabled></option>
                                        <option value="0">Tidak</option>
                                        <option value="1">Ya</option>
                                    </select>
                                    <label for="ent_ownfarm">Terlibat pertanian sendiri</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-control" id="ent_business" name="ent_business">
                                        <option value="" selected disabled></option>
                                        <option value="0">Tidak</option>
                                        <option value="1">Ya</option>
                                    </select>
                                    <label for="ent_business">Terlibat dalam bisnis:</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-control" id="ent_nonagbusiness" name="ent_nonagbusiness">
                                        <option value="" selected disabled></option>
                                        <option value="0">Tidak</option>
                                        <option value="1">Ya</option>
                                    </select>
                                    <label for="ent_nonagbusiness">Terlibat bisnis non-pertanian?</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary py-3 px-5" type="submit">Prediksi</button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 450px;">
                    <div class="position-relative rounded overflow-hidden h-100">
                        {{-- <iframe class="position-relative w-100 h-100"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                            frameborder="0" style="min-height: 450px; border:0;" allowfullscreen="" aria-hidden="false"
                            tabindex="0"></iframe> --}}
                        <img class="img-fluid rounded" src="img/image (3).jpg">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

@endsection
