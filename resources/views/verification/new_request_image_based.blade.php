@extends('layouts.app')

@push('scripts')
    @inline('/js/utils/multi-image-preview.js')
@endpush

@push('styles')
    @style('/css/multi-image-preview.css')
@endpush

@section('title', 'Buat Permintaan Baru untuk Pengecekkan')

@section('content')
    <form
        name="new_request"
        action="{{ route('new_request_image_based') }}"
        method="post"
        enctype="multipart/form-data">
        @csrf

        @if (session('status') == 'FAIL')
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
        @endif

        <input id="sneakers_images" type="file" name="sneakers_images[]" multiple>

        <h4>Pastikan semua sudut sneakers ada di semua gambar Anda</h4>
        <div id="image-preview"></div>

        <button type="submit">Kirim Permintaan</button>
    </form>
@endsection

