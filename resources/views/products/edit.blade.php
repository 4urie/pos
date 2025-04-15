@extends('layout')

@section('content')
    <h1>Edit Product</h1>

    @if ($errors->any())
        <ul style="color:red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Name:</label>
        <input type="text" name="name" value="{{ $product->name }}"><br>

        <label>Price:</label>
        <input type="text" name="price" value="{{ $product->price }}"><br>

        <label>Description:</label>
        <textarea name="description">{{ $product->description }}</textarea><br>

        <button type="submit">Update</button>
    </form>
@endsection
