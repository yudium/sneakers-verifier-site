@extends('layouts.app')

@section('title', 'Verification Link Based')

@section('content')
<script type="text/javascript">
    $(function () { 
        var imagesPreview = function (input, place) {
            $(place).html('');
            if (input.files) {
                var filesAmount = input.files.length;

                for (var i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();  
                    reader.onload = function (event) {
                        $($.parseHTML('<div class="image image-radius"></div>'))
                        .css('background-image', 'url('+event.target.result+')')
                        .appendTo(place);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }
        };
        $('#sneakers_images').on('change', function () {
            imagesPreview(this, '#image-preview');
        });
    });
</script>

<div class="login-container">
    <form
        name="new_request"
        action="{{ route('new_request_image_based') }}"
        method="post"
        enctype="multipart/form-data">
        @csrf

        <div class="ctn-main-font ctn-min-color ctn-standar ctn-center padding-20px">
            {{ __('Verification Image Based') }}
        </div>
        <div class="padding-10px"></div>

        <div class="lc-place">
            <div class="lc-block">

                <div class="padding-10px">
                    <input id="sneakers_images" type="file" name="sneakers_images[]" multiple required style="cursor: pointer;">
                </div>

                <div class="ctn-main-font ctn-err-color ctn-14px ctn-thin">
                    Pastikan semua sudut sneakers ada di semua gambar Anda
                </div>

                @if (session('status') == 'FAIL')
                    <div class="ctn-main-font ctn-err-color ctn-14px ctn-thin">
                        {{ session('message') }}
                    </div>
                @endif

                <div id="image-preview" class="image-preview"></div>

            </div>

            <div class="lc-block">
                <div class="lc-right">
                    <button type="submit" class="btn btn-main-color">
                        {{ __('Post Request') }}
                    </button>
                </div>
            </div>

        </div>
    </form>
</div>
@endsection

