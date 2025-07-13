@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Categorías</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
        @foreach($categorias as $cat)
            <tr>
                <td>{{ $cat['id'] ?? $cat->id ?? '' }}</td>
                <td>{{ $cat['name'] ?? $cat->name ?? '' }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
