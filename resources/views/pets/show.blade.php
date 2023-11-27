@extends('layouts/app')


@section('content')
    @if (session('success'))
        <p class="bg-green-300 text-green-800 text-center py-12">{{ session('success') }}</p>
    @endif
    @if (session('error'))
        <p class="bg-red-300 text-red-800 text-center py-12">{{ session('error') }}</p>
    @endif
    <div class="mt-10 text-center">
        <p>Get Pet by id</p>
        <form action="" method="GET">
            <input name="id" type="number" min="1" class="outline">
            <label for="id">Pet Id</label>
            <button class="bg-black text-white px-4 py-2">Get Pet</button>
        </form>
        @if($pet)
            <div>
                <p class="text-xl font-bold">Pet ID: {{ $pet->id }}</p>
                <p class="text-xl font-bold">Pet name: {{ $pet->name }}</p>
                <div class="flex justify-center space-x-8">
                    <form action="{{ route('pet-destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{ $pet->id }}">
                        <button class="bg-red-500 px-4 py-2 rounded-md text-white hover:bg-red-700">Delete</button>
                    </form>
                    <a href="{{ route('pet-edit', ['id' => $pet->id]) }}" class="bg-green-500 px-4 py-2 rounded-md hover:bg-green-700 text-white">Edit</a>
                </div>
            </div>
        @else
            <div>
                <p class="text-xl font-bold">There is no pet with this id</p>
            </div>
        @endif
    </div>
@endsection