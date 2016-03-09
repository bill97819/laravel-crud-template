@extends('pencils.penciltemplate')

@section('title', $pencil->name)

@section('content')

<p>Name: {{ $pencil->name }}</p>
<p>Length: {{ $pencil->length }}</p>

@endsection