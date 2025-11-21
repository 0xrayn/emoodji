@extends('layout.master2')
@section('tittle', 'Emoodji - Assessment')
@section('header', 'header2')
@section('page', 'Assessment')
@section('nav_assessment', 'active')

@section('content')

    <div class="py-5 container-xxl">
        <div class="container">

            {{-- ============ BAGIAN KUIS ============ --}}
            <div class="mb-5 text-center">
                <p class="px-3 py-1 border rounded d-inline-block text-primary fw-semi-bold">Kuis</p>
                <h1 class="mb-3 display-5">Daftar Kuis</h1>
            </div>

            <div class="mb-5 row g-4">
                @foreach ($kuis as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="team-item">
                            <div class="team-text">
                                <h4 class="mb-0">{{ $item->quiz_name }}</h4>

                                <button class="px-4 py-2 btn btn-primary unlock-btn" data-type="quiz"
                                    data-id="{{ $item->id }}" data-cost="{{ $item->unlock_cost ?? 10 }}">
                                    Kerjakan
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


            {{-- ============ BAGIAN PREDIKSI ============ --}}
            <div class="mt-5 row g-5">
                <div class="text-center">
                    <p class="px-3 py-1 border rounded d-inline-block text-primary fw-semi-bold">Prediksi</p>
                    <h1 class="mb-4 display-5">Cek Kemungkinan Depresi</h1>
                </div>
                <div class="col-lg-6">


                    <p class="mb-3">
                        Fitur ini memungkinkan kamu mengisi beberapa pertanyaan untuk mengetahui indikasi awal terkait
                        kondisi
                        suasana hati atau kemungkinan depresi. Jawabanmu bersifat rahasia dan digunakan hanya untuk
                        memberikan
                        hasil prediksi otomatis.
                    </p>

                    <p class="mb-4">
                        Klik tombol di bawah untuk membuka halaman prediksi dan mulai mengisi assessment.
                    </p>

                    <a href="{{ route('prediksi.index') }}" class="px-4 py-2 btn btn-primary">
                        Lihat Selengkapnya
                    </a>

                </div>

                <div class="col-lg-6">
                    <img class="rounded img-fluid" src="{{ asset('img/image (3).jpg') }}">
                </div>
            </div>

        </div>
    </div>


    {{-- SCRIPT UNLOCK KUIS --}}
    <script>
        document.querySelectorAll('.unlock-btn').forEach(btn => {
            btn.addEventListener('click', async () => {
                const type = btn.dataset.type;
                const id = btn.dataset.id;
                const cost = btn.dataset.cost;

                if (!confirm(`Unlock fitur ini dengan ${cost} reward?`)) return;

                try {
                    const res = await fetch('{{ route('unlock') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            type,
                            id
                        })
                    });

                    const data = await res.json();

                    if (res.ok) {
                        alert(data.message);
                        window.location.href = `/kuis/${id}`;
                    } else {
                        alert(data.error);
                    }
                } catch (err) {
                    alert('Terjadi kesalahan!');
                }
            });
        });
    </script>

@endsection
