@extends('layouts.app')

@section('title', 'Reviewed Verification Item List')

@section('content')

    <div class="list">
        @foreach ($verification_items as $verification_item)
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
            <!-- storage gambar storate/ atau storage/app/public/ -->
            <!-- gambar tidak muncul -->
            <div class="card-item ci-image">
                <a class="ctn-main-font ctn-mikro" href="{{ url('/verification/review-result/'.$verification_item->id) }}">
                    <div class="top">
                        @foreach ($verification_item->verification_item_images as $verification_item_image)
                            <div class="cl-{{ $loop->iteration }}">
                                <!--gambar tidak muncul-->
                                <div class="image image-full no-bg-color" style="background-image: url('{{ asset('storage/verification_sneakers_images/'.$verification_item_image->path) }}');"></div>
                            </div>


                            @if ($loop->iteration == 3)
                                @break
                            @endif
                        @endforeach
                    </div>
                </a>
                <div class="mid">
                    <div class="ctn-main-font ctn-min-color ctn-16px">
                        Type: Image
                    </div>
                    <div class="ctn-main-font ctn-min-color ctn-16px">
                        Uploaded : {{ $verification_item->created_at }}
                    </div>
                    <div class="ctn-main-font ctn-min-color ctn-16px">
                        Status : <span class="ctn-main-font ctn-int-color ctn-16px">{{ $verification_item->status_review }}</span>
                    </div>
                </div>
                <div class="bot"></div>
            </div>
            @endif
            @if ($verification_item->type == 'Link')
            <div class="card-item ci-link">
                <a href="{{ url('/verification/review-result/'.$verification_item->id) }}">
                    <div class="top">
                        <div class="link ctn-main-font ctn-mikro">
                            {{ $verification_item->verification_item_link->link }}
                        </div>
                    </div>
                </a>
                <div class="mid">
                    <div class="ctn-main-font ctn-min-color ctn-16px">
                        Type: Link
                    </div>
                    <div class="ctn-main-font ctn-min-color ctn-16px">
                        Submited : {{ $verification_item->created_at }}
                    </div>
                    <div class="ctn-main-font ctn-min-color ctn-16px">
                        Status : <span class="ctn-main-font ctn-int-color ctn-16px">{{ $verification_item->status_review }}</span>
                    </div>
                </div>
            </div>
            @endif
        @endforeach

        {{ $verification_items->links() }}
    </div>

@endsection

