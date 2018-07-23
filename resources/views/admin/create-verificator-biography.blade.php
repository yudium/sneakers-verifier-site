@extends('layouts.admin')
@section('title', 'Create Verificator Biography')
@section('content')
    <h2>Biografi {{ $verificator->name }}</h3>

    <form action="{{ route('create_verificator_biography', ['id' => $verificator->id]) }}" method="post">
        @csrf
        <textarea id="biograhpy-field" name="biography" cols="50" rows="20"></textarea>
        <button>Simpan</button>
    </form>
@endsection
