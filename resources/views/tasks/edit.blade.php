@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-semibold mb-6">Editar Tarea</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
            <input type="text" name="title" id="title" value="{{ $task->title }}" class="w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
            <textarea name="description" id="description" rows="4" class="w-full p-2 border border-gray-300 rounded-md" required>{{ $task->description }}</textarea>
        </div>

        <div class="mb-4">
            <label for="due_date" class="block text-sm font-medium text-gray-700">Fecha de vencimiento</label>
            <input type="date" name="due_date" id="due_date" value="{{ $task->due_date }}" class="w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Estado</label>
            <select name="status" id="status" class="w-full p-2 border border-gray-300 rounded-md">
                <option value="pendiente" {{ $task->status == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="en progreso" {{ $task->status == 'en progreso' ? 'selected' : '' }}>En progreso</option>
                <option value="completada" {{ $task->status == 'completada' ? 'selected' : '' }}>Completada</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="assigned_to" class="block text-sm font-medium text-gray-700">Asignado a</label>
            <select name="assigned_to" id="assigned_to" class="w-full p-2 border border-gray-300 rounded-md">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $task->assigned_to == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600">Actualizar Tarea</button>
    </form>
</div>
@endsection