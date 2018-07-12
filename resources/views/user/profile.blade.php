@extends('layouts.app')

@section('title', 'Profil: '.$user->name)

@section('content')
    <!-- TODO: hapus ini -->
    <p style="background: yellow">Teruntuk Ganjar Hadiatna.<br>
       (1) Baca eta comment urang di file <code>views/user/profile.blade.php</code> keur panduan desain.<br>
       (2) <small>Mockup aya di folder <code>/mockup</code><br></small>
       -- Salam sukses dan damai --
    </p>

    <div id="left-container">
        <img id="photo-profile" src="{{ asset('storage/user_photo_profile/'.$user->photo) }}" alt="Foto pengguna">
        <div id="user-information">
            <p>Tanggal bergabung: {{ $user->created_at }}</p>
            <p>Jumlah pengajuan: {{ $user->verification_items_count }}</p>
            <p>Jumlah yang belum direview: {{ $user->unreviewed_verification_items_count }}</p>
        </div>

        @if ($user->id == Auth::user()->id)
        <form method="post" action="{{ route('user_delete') }}">
            @csrf
            <button type="submit">Hapus Akun</button>
        </form>
        @endif
    </div>

    <div id="main-container">
        <!-- kotak daftar verification item -->
        <div class="list-of-verification-item">
            @foreach ($user->verification_items as $verification_item)
                <!--
                Ada 2 tipe verifikasi item.
                    (1) Image-based
                    (2) Link-based

                Kedua tipe ini punya tampilan yang sedikit berbeda untuk box div.list-item
                Perbedaan dari segi tampilan:
                    (-) Untuk tipe gambar menampilkan 3 gambar. Sedangkan link, hanya teks link
                    (-) Untuk tipe gambar menggunakan teks `tanggal upload`. Sedangkan link, `tanggal submit`

                NOTE: Lihat mockup file yang ada di directory /mockup 
                -->
                @if ($verification_item->type == 'Gambar')
                <!-- kotak item... setiap item berisi 3 gambard dan keterangan tanggal upload + status review -->
                <div class="list-item">
                    @foreach ($verification_item->verification_item_images as $verification_item_image)
                        <img src="{{ asset('storage/verification_sneakers_images/'.$verification_item_image->path) }}" alt="Sneakers Image" width="150" height="120">
                        @if ($loop->iteration == 3)
                            @break
                        @endif
                    @endforeach
                    Tanggal upload: {{ $verification_item->created_at }}
                    Status review: {{ $verification_item->status_review }}
                </div>
                @endif
                @if ($verification_item->type == 'Link')
                <div class="list-item">
                    Link: <a href="{{ $verification_item->verification_item_link->link }}">
                            {{ $verification_item->verification_item_link->link }}
                          </a>
                    Tanggal submit: {{ $verification_item->created_at }}
                    Status review: {{ $verification_item->status_review }}
                </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection

