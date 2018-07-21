@extends('layouts.app')

@section('title', 'Profil: '.$verificator->name)

@section('content')
    <!-- TODO: hapus ini -->
    <p style="background: yellow">Teruntuk Ganjar Hadiatna.<br>
       (1) Baca eta comment urang di file <code>views/user/profile.blade.php</code> keur panduan desain.<br>
       (2) <small>Mockup aya di folder <code>/mockup</code><br></small>
       -- Salam sukses dan damai --
    </p>

    <div id="left-container">
        <img id="photo-profile" src="{{ asset($verificator->photo_path) }}" alt="Foto pengguna">
        <div id="user-information">
            <p>Tanggal bergabung: {{ $verificator->created_at }}</p>
            <p>Jumlah yang direview: {{ $verificator->reviewed_count }}</p>
        </div>

        @if (Auth::check())
            @if ($verificator->id == Auth::user()->id)
            TODO: buat route verificator_delete
            <form method="post" action="{{ route('verificator_delete') }}">
                @csrf
                <button type="submit">Hapus Akun</button>
            </form>
            @endif
        @endif
    </div>

    <div id="main-container">
        <!-- kotak daftar review -->
        <div class="list-of-review">
            @foreach ($verificator->reviews as $review)
                <div class="list-item">
                    Tanggal review: {{ $review->created_at }}
                    Hasil review: {{ $review->status }}
                </div>
            @endforeach
        </div>
        {{ $verificator->reviews->links() }}
    </div>
@endsection

