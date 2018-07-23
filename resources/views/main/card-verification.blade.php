<div class="card-item">
    @if ($verification_item->type == 'Gambar')
        <div class="top ci-image">
            <div class="img" style="cursor: default;">
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
        </div>
    @endif
    @if ($verification_item->type == 'Link')
        <div class="top ci-link">
            <a href="{{ $verification_item->verification_item_link->link }}" target="_blank">
                <div class="link">
                    <div class="ttl ctn-main-font ctn-mikro">{{ $verification_item->verification_item_link->link }}</div>
                </div>
            </a>
        </div>
    @endif
    <div class="mid">
        <div class="ctn-main-font ctn-min-color ctn-16px">
            Type: {{ $verification_item->type }}
        </div>
        <div class="ctn-main-font ctn-min-color ctn-16px">
            Submited on : {{ $verification_item->created_at }}
        </div>
        <div class="ctn-main-font ctn-min-color ctn-16px">
            Status : <span class="ctn-main-font ctn-int-color ctn-16px">{{ $verification_item->status_review }}</span>
        </div>
    </div>
    <div class="bot">
        <a href="{{ url('/verification/review-result/'.$verification_item->id) }}" class="link">
            Review Result
        </a>
        <a href="{{ url('/verification/detail/'.$verification_item->id) }}" class="link">
            Detail Verification
        </a>
    </div>
</div>