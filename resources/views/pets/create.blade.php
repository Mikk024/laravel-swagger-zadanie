@extends('layouts/app')


@section('content')
    @if (session('success'))
        <p class="bg-green-300 text-green-800 text-center py-12">{{ session('success') }}</p>
    @endif
    @if (session('error'))
        <p class="bg-red-300 text-red-800 text-center py-12">{{ session('error') }}</p>
    @endif
    <div class="mt-8 px-32 flex justify-center">
        <form action="{{ route('pet-store') }}" method="post" class="space-y-4">
            @csrf
            <div>
                <label for="category">Id:</label>
                <input type="text" name="id" class="bg-gray-100 border px-4">
                @error('id')
                    <p class="text-red-500 font-bold">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="category">Category:</label>
                <input type="text" name="category" class="bg-gray-100 border px-4">
                @error('category')
                    <p class="text-red-500 font-bold">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" class="bg-gray-100 border px-4">
                @error('name')
                    <p class="text-red-500 font-bold">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="tags">Tags:</label>
                <input type="text" name="tags" class="bg-gray-100 border px-4">
                @error('tags')
                    <p class="text-red-500 font-bold">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="status">Status:</label>
                <select name="status" class="bg-gray-100 border px-4 py-2">
                    <option value="pending">pending</option>
                    <option value="available">available</option>
                    <option value="sold">sold</option>
                </select>
                @error('status')
                    <p class="text-red-500 font-bold">{{ $message }}</p>
                @enderror
            </div>

            <button class="text-white bg-black px-4 py-2">Add Pet</button>
        </form>
    </div>
@endsection