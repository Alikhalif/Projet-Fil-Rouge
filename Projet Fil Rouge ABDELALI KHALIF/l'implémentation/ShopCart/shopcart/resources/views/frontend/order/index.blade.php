@extends('layouts.app')

@section('title', 'Orders')

@section('content')

@if ($orders->count() > 0)

<div class="row p-3 m-3 rounded shadow">
    <div class="row my-5">
        <h3 class="fs-4 mb-3">Recent Orders</h3>
        <div class="col">
            <table class="table bg-white rounded shadow-sm  table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="50">#</th>
                        <th scope="col">date</th>
                        <th scope="col">status</th>
                        <th scope="col">payment_mode</th>
                        <th scope="col">totale</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach($orders as $orde)
                        <tr>
                            <th scope="row">{{ $orde->id }}</th>
                            <td>{{ $orde->created_at }}</td>
                            <td>{{ $orde->status }}</td>
                            <td>{{ $orde->payment_mode }}</td>
                            <td>${{ $orde->totale }}</td>
                            <td>
                                <a href="{{ url('order/'.$orde->id) }}" class="btn btn-sm btn-success">View</a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <div>{{ $categories->links() }}</div> --}}
        </div>
    </div>
</div>

@else
    <div class="text-center h3 border m-5 mx-auto p-4 rounded shadow w-50 ">No orders</div>
@endif

@endsection
