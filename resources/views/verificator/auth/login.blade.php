@extends('layouts.app')

@section('title', 'Verificator Login')

@section('content')
    <form action="{{ route('verificator.login') }}" method="post">
        @csrf
        <input type="text" name="email">
        <input type="password" name="password">
        <button type="submit">Login</button>
    </form>
@endsection

