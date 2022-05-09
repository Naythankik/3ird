@extends('sell.logged_in.main')
@section('body')

    @if(session('deleted'))
        <p class="alert alert-success w-25">{{ session('deleted') }}</p>
    @endif

    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Brand</th>
            <th scope="col">price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Created at</th>
            <th scope="col">Category</th>
            <th scope="col">Action</th>

        </tr>
        </thead>
        <tbody>
        @foreach($products as $id => $product)
            <tr>
                <th scope="row">{{ $id + 1 }}</th>
                <td class="fw-light fs-6">{{ $product->name }}</td>
                <td>{{ $product->brand }}</td>
                <td><span>&#8358; </span>{{ number_format($product->price).".00" }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->created_at }}</td>
                <td>{{ $product->category }}</td>
                <td>
                    <a href="/products/{{ $product->id }}/edit" class="btn btn-success py-1" style="width: 75px">Edit</a>
                    <form action="products/{{ $product->id }}" method="post" class="mt-2" >
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

@endsection