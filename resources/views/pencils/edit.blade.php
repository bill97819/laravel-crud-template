@extends('pencils.penciltemplate')

@section('title', 'Edit '.$pencil->name)

@section('content')

@if (count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

{!! Form::model($pencil, array('route' => array('pencil.update', $pencil->id),'method'=>'PUT')) !!}
    
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', 'HB2000') !!}
    
    <br>
   
    {!! Form::label('length', 'Length') !!}
    {!! Form::number('length', '0') !!}
    
    <br>
    
    {!! Form::submit('Create the Pencil!') !!}

{!! Form::close() !!}

@endsection