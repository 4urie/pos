@extends('layout')

@section('content')
    <h1>Create Product</h1>

    @if ($errors->any())
        <ul style="color:red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name"><br>

        <label>Price:</label>
        <input type="text" name="price"><br>

        <label>Description:</label>
        <textarea name="description"></textarea><br>

        <button type="submit">Save</button>
    </form>
@endsection
