@extends('layout.app')
@section('title', 'User')
@section('content')
    <div class="p-8 mt-5 lg:mt-0 relative overflow-x-auto ">
        <div class="flex justify-between my-3">
            @can('read-user')
                <a href="/users">
                @endcan
                <div class="card bg-base-100 w-80    shadow-xl">
                    <div class="card-body flex flex-row items-center justify-between">
                        <h2 class="card-title">Users</h2>
                        <div class="flex ">
                            <p class="font-bold text-lg">{{ $users }}</p>
                        </div>
                    </div>
                </div>
                @can('read-user')
                </a>
            @endcan
        </div>



    </div>
@endsection
