@extends('layouts.admin')

@section('title', 'Admin Lists')

@section('content')
<div>
    <div class="ctn-main-font ctn-min-color ctn-standar padding-20px">Admin Lists</div>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Tanggal Dibuat</th>
            <th>Foto</th>
        </tr>
        @foreach ($admins as $admin)
        <tr>
            <td>{{ $admin->id }}</td>
            <td>{{ $admin->name }}</td>
            <td>{{ $admin->email }}</td>
            <td>{{ $admin->created_at }}</td>
            <td><img width="28" height="28" src="{{ asset($admin->photo_path) }}" alt="foto pengguna"></td>
        </tr>
        @endforeach
    </table>
    {{ $admins->links() }}
</div>
@endsection
