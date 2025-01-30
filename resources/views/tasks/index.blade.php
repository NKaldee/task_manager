@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-semibold mb-6">Tareas</h1>

    <a href="{{ route('tasks.create') }}" class="inline-block mb-4 px-4 py-2 bg-blue-500 text-white rounded-md shadow-md hover:bg-blue-600">
        Crear Tarea
    </a>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="w-full table-auto text-left">
            <thead>
                <tr class="bg-gray-100 text-gray-600">
                    <th class="px-4 py-2 border">Título</th>
                    <th class="px-4 py-2 border">Descripción</th>
                    <th class="px-4 py-2 border">Fecha de vencimiento</th>
                    <th class="px-4 py-2 border">Estado</th>
                    <th class="px-4 py-2 border">Asignado a</th>
                    <th class="px-4 py-2 border">Creado por</th>
                    <th class="px-4 py-2 border">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border">{{ $task->title }}</td>
                    <td class="px-4 py-2 border">{{ $task->description }}</td>
                    <td class="px-4 py-2 border">{{ $task->due_date }}</td>
                    <td class="px-4 py-2 border">{{ $task->status }}</td>
                    <td class="px-4 py-2 border">{{ $task->assignee->name ?? 'No asignado' }}</td>
                    <td class="px-4 py-2 border">{{ $task->creator->name ?? 'No disponible' }}</td>
                    <td class="px-4 py-2 border">
                        <a href="{{ route('tasks.edit', $task->id) }}" class="text-yellow-600 hover:text-yellow-800">Editar</a> |
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection