@extends('layout.master2')
@section('tittle', 'Emoodji - Kuis')
@section('header', 'header2')
@section('page', 'Kuis')
@section('nav_fitur', 'active')

@section('content')


    <!-- Team Start -->
    <div class="py-5 container-xxl">
        <div class="container">
            <div class="mx-auto text-center wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px; ">
                <p class="px-3 py-1 border rounded d-inline-block text-primary fw-semi-bold">Kuis</p>
                <h1 class="mb-5 display-5">Daftar Kuis</h1>
                <a class="px-5 py-3 btn btn-primary" href="{{ route('kuis.result') }}">Hasil Kuis</a>

                @if (session()->has('success') || session()->has('error'))

                <div class="my-3 alert alert-{{ session()->has('success') ? "success" : "danger" }}">
                    {{ session()->has('success') ? session('success') : session('error') }}
                </div>

                <script>
                    setTimeout(() => {
                        document.querySelector('.alert').remove();
                    }, 7000);
                </script>

                @endif
            </div>
            <div class="row g-4">


                  @if ($kuis)
                    @foreach ($kuis as $item)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="margin-top: 60px;">
                            <div class="team-item">
                                <div class="team-text">
                                    <h4 class="mb-0">{{ $item->quiz_name }}</h4>

                                    <button class="px-5 py-3 btn btn-primary unlock-btn"
                                            data-type="quiz"
                                            data-id="{{ $item->id }}"
                                            data-cost="{{ $item->unlock_cost ?? 10 }}">
                                        Kerjakan
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach

                  @endif

            </div>
        </div>
    </div>
    <!-- Team End -->
<script>
document.querySelectorAll('.unlock-btn').forEach(btn => {
    btn.addEventListener('click', async () => {
        const type = btn.dataset.type;
        const id = btn.dataset.id;
        const cost = btn.dataset.cost;

        if(!confirm(`Apakah kamu ingin unlock ini dengan ${cost} reward?`)) return;

        try {
            const res = await fetch('{{ route("unlock") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({type, id})
            });
            const data = await res.json();

            if(res.ok){
                alert(data.message);
                window.location.href = `/kuis/${id}`; // langsung ke quiz
            } else {
                alert(data.error);
            }
        } catch(err){
            alert('Terjadi kesalahan!');
            console.error(err);
        }
    });
});
</script>

@endsection
