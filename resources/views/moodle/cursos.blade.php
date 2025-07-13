@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Cursos</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Visible</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cursos as $curso)
            <tr>
                <td>{{ $curso['id'] ?? $curso->id ?? '' }}</td>
                <td>{{ $curso['fullname'] ?? $curso->fullname ?? '' }}</td>
                <td>{{ !empty($curso['visible']) ? 'Sí' : 'No' }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
