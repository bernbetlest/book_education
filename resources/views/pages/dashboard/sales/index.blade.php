@extends('pages.dashboard.layouts.template')

@section('content')
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-truncate" style="max-width: 500px;">All Sales</h1>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Book</th>
                        <th>Status</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $sale)
                        <tr>
                            <td>{{ $sale->user->username }}</td>
                            <td>{{ $sale->book->title }}</td>
                            <td>{{ $sale->status }}</td>
                            <td>{{ $sale->created_at }}</td>
                            <td class="">
                                <a href="{{ route('sales.show', $sale->id) }}" class="btn btn-info btn-sm mr-1">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection