@extends('layouts.admin')

@section('title', 'Verificator List')

@section('content')
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Tanggal Dibuat</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
        @foreach ($verificators as $verificator)
        <tr>
            <td>{{ $verificator->id }}</td>
            <td>{{ $verificator->name }}</td>
            <td>{{ $verificator->email }}</td>
            <td>{{ $verificator->created_at }}</td>
            <td><img width="28" height="28" src="{{ asset($verificator->photo_path) }}" alt="foto pengguna"></td>
            <td><a href="{{ action('Verificator\VerificatorController@profile', ['id' => $verificator->id])}}">Lihat Profil</a></td>
        </tr>
        @endforeach
    </table>
    {{ $verificators->links() }}
@endsection
