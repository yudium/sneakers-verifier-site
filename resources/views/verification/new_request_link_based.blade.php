@extends('layouts.app')

@section('title', 'Buat Permintaan Baru untuk Pengecekkan')

@section('content')
    <form
        name="new_request"
        action="{{ route('new_request_link_based') }}"
        method="post">
        @csrf

        @if (session('status') == 'FAIL')
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
        @endif

        <input type="text" name="link" placeholder="http://....">

        <button type="submit">Kirim Permintaan</button>
    </form>
@endsection

