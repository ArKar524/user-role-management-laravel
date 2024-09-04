@extends('layout.app')
@section('title', 'Role | Edit')
@section('content')
    <div class="p-8 mt-5 lg:mt-0 overflow-x-auto">
        <form action="{{ route('roles.update', $role->id) }}" method="post" class="mx-auto">
            @csrf @method('PUT')
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="name" id="name" value="{{ $role->name }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-900 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="name"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Name
                </label>
                <div class="mt-5">
                    <label class="text-lg font-bold">Role and Permission</label>
                    @foreach ($features as $feature)
                        <div class="grid lg:grid-cols-4 grid-col-3 gap-2 p-2 border-t border-gray-600 font-medium">
                            <div>
                                {{ $feature->name }}
                            </div>
                            <div class="flex col-span-3">
                                @foreach ($feature->permissions as $permission)
                                    <div>
                                        <div class="flex items-center mb-4">
                                            <input id="{{ $permission->id }}" value="{{ $permission->id }}"
                                                name="permissions[]" type="checkbox"
                                                @foreach ($role->rolePermissions as $item)
                                                        @if ($item->id == $permission->id)
                                                            @checked(true) @endif @endforeach
                                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded dark:bg-gray-700 dark:border-gray-600">
                                            <label for="{{ $permission->id }}"
                                                class="ms-2 me-3 text-normal font-medium text-gray-900 dark:text-gray-800">
                                                {{ $permission->name }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <button type="submit" name="create-role"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit
            </button>
        </form>
    </div>
@endsection
