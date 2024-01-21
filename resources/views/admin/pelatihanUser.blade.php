@extends('layouts.master')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Pelatihan Peserta</h4>
    <div class="row mb-5">
        @foreach($data as $pelatihan)
        <div class="col-md-6 col-lg-4 mb-3">
            <div class="card h-100">
                <img class="card-img-top" src="{{ asset('gambar-pelatihan/'.$pelatihan->gambar) }}" width="374" height="374" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $pelatihan->nama_Pelatihan }}</h5>
                    <p class="card-text">
                        {{ $pelatihan->deskripsi }}
                    </p>
                    <form action="{{ route('createpelatihanUser', $pelatihan->id) }}" method="post">
                        @csrf

                        <button type="submit" class="btn btn-outline-primary">Mengikuti Pelatihan</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection