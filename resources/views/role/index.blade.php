@extends('layout.app')
@section('title', 'Role')
@section('content')
    <div class="p-8 lg:mt-0 relative overflow-x-auto ">
        @if (session('success'))
            <div role="alert" class="alert alert-success flex items-center justify-between p-4">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current mr-2" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
                <button type="button" class="ml-4 text-gray-900 hover:text-gray-900"
                    onclick="this.parentElement.style.display='none';">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        @endif
        <div class="flex justify-between my-3">
            <h1 class="text-2xl font-bold">Roles</h1>
            @can('create-role')
                <a href="{{ route('roles.create') }}" class="text-sm font-semibold underline text-blue-800 hover:underline">Add
                    new role</a>
            @endcan

        </div>

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b
                        dark:border-gray-700">

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $role->name }}
                        </th>
                        <td class="px-6 py-4">
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                @csrf @method('DELETE')
                                @can('update-role')
                                    <a href="{{ route('roles.edit', $role->id) }}"
                                        class="font-medium me-2 text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                @endcan
                                @can('delete-role')
                                    <button class="font-medium text-blue-600 dark:text-red-500 hover:underline">Delete</button>
                                @endcan
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
