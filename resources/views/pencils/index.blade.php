@extends('pencils.penciltemplate')

@section('title', 'Pencil Index')

@section('content')

<table>
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Length</td>
        </tr>
    </thead>
    <tbody>
        @foreach($pencils as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->length }}</td>

            <!-- show, edit, and delete buttons -->
            <td>
                <!-- show the pencil (uses the show method found at GET /pencil/{id} -->
                <a href="{{ URL::to('pencil/' . $value->id) }}">Show this Pencil</a>

                <!-- edit this pencil (uses the edit method found at GET /pencil/{id}/edit -->
                <a href="{{ URL::to('pencil/' . $value->id . '/edit') }}">Edit this Pencil</a>

                <!-- delete the pencil (uses the destroy method DESTROY /pencil/{id} -->
                {{ Form::open(array('url' => 'pencil/' . $value->id)) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete this Pencil') }}
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection