@extends('layouts.admin')

@section('title', 'User Lists')

@section('content')
<div>
    <div class="ctn-main-font ctn-min-color ctn-standar padding-20px">User Lists</div>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Tanggal Bergabung</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at }}</td>
            <td><img width="28" height="28" src="{{ asset($user->photo_path) }}" alt="foto pengguna"></td>
            <td><a href="{{ action('UserController@profile', ['id' => $user->id])}}">Lihat Profil</a></td>
        </tr>
        @endforeach
    </table>
    {{ $users->links() }}
</div>
@endsection
