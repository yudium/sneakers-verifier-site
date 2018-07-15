@extends('layouts.app')

@section('title', 'Biography: '.$verificator->name)

@section('content')
<h3>Biography</h3>
<h2>{{ $verificator->name }}</h2>

{{ $verificator->biography }}
@endsection
