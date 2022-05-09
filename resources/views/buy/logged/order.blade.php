@extends('buy.logged.main')
@section('body')


        @foreach($orders as $id => $order)
{{--                <tr>--}}
{{--                    <th scope="row">{{ $id + 1 }}</th>--}}
{{--                    <td>{{ $order->product['id'] }}</td>--}}
{{--                    <td>{{ $order->product['price'] }}</td>--}}
{{--                    <td>{{ $order->product['email'] }}</td>--}}
{{--                </tr>--}}
        @endforeach


@endsection