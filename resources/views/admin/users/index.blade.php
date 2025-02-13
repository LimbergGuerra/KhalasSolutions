@extends('layouts.admin')

@section('title', 'Gestión de Usuarios')

@section('content')
<div class="container mx-auto px-4 py-8 bg-white bg-opacity-80 rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Usuarios Registrados</h1>
    <style>
    body {
        background-image: url('{{ asset('images/fondo.jpg') }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }
</style>


    <!-- Botón para registrar un nuevo usuario -->
    <div class="mb-4">
    @if(Auth::user()->role === 'admin')
    <a href="{{ route('admin.users.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg">
        ➕ Crear Usuario
    </a>
@endif

    </div>

    <!-- Tabla de usuarios -->
    <div class="bg-white p-6 rounded-lg shadow-lg overflow-x-auto">
        <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Nombre</th>
                    <th class="px-4 py-3">Correo Electrónico</th>
                    <th class="px-4 py-3">Rol</th>
                    <th class="px-4 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-gray-100 text-gray-800">
                @foreach ($users as $user)
                    <tr class="border-b border-gray-300 text-center">
                        <td class="px-4 py-2">{{ $user->id }}</td>
                        <td class="px-4 py-2">{{ $user->name }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2">{{ ucfirst($user->role) }}</td>
                        <td class="px-4 py-2">
                        @if(auth()->user()->role === 'admin')
    <!-- ✅ Botón habilitado solo para admin -->
    <a href="{{ route('admin.users.edit', $user) }}" class="bg-green-500 text-white px-3 py-1 rounded-md">Editar</a>
@else
    <!-- ❌ Botón deshabilitado para users -->
    <a href="#" class="bg-green-300 text-white px-3 py-1 rounded-md opacity-50 cursor-not-allowed" onclick="return false;">
        Editar
    </a>
@endif

    @csrf
    @method('DELETE')

    @if(auth()->user()->role === 'admin')
        <!-- ✅ Botón habilitado solo para admin -->
        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md"
            onclick="return confirm('¿Estás seguro de eliminar este usuario?')">
            Eliminar
        </button>
    @else
        <!-- ❌ Botón deshabilitado para users -->
        <button type="button" class="bg-red-300 text-white px-3 py-1 rounded-md opacity-50 cursor-not-allowed" disabled>
            Eliminar
        </button>
    @endif
</form>

                        </td>
                    </tr>
                @endforeach
                @if ($users->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">No hay usuarios registrados.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
