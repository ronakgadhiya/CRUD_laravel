@extends('layouts.app')
@section('main')
    <div class="container">
        <div class="text-right">
            <a href="product/create" class="btn btn-dark mt-2">New Product</a>
        </div>
        <table class="table table-hover mt-3">
            <thead>
                <tr>
                    <th>Sr no.</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td><a href="product/{{ $product->id }}/show" class = "text-dark">{{ $product->name }}</a></td>
                    <td>{{ $product->description }}</td>
                    <td><img src="products/{{ $product->image }}" class="rounded-circle" alt="" width="50" height="50"></td>
                    <td>
                        <a href="product/{{ $product->id }}/edit" class="btn btn-dark">Edit</a>
                        <a href="product/{{ $product->id }}/delete" class="btn btn-dark">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
@endsection
