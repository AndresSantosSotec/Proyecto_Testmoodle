@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Usuarios</h1>
    <form class="mb-3" method="GET" action="{{ url('/moodle/usuarios') }}">
        <div class="input-group">
            <input type="text" name="query" class="form-control" value="{{ $query }}" placeholder="Buscar">
            <button class="btn btn-primary" type="submit">Buscar</button>
        </div>
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $u)
            <tr>
                <td>{{ $u['id'] ?? $u->id ?? '' }}</td>
                <td>{{ $u['fullname'] ?? ($u['firstname'] ?? '') . ' ' . ($u['lastname'] ?? '') }}</td>
                <td>{{ $u['email'] ?? '' }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
