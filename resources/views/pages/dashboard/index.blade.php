@extends('pages.dashboard.layouts.template')

@section('content')
    <div class="content">
        <h1 class="mb-4">Dashboard</h1>
        <p>Welcome to the admin dashboard</p>

        <div class="row mt-3">
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Total Users</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $totalUsers }}</h5>
                        <p class="card-text">Registered users</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Total Books</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $totalBooks }}</h5>
                        <p class="card-text">Books available</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header">Total Sales</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $totalSales }}</h5>
                        <p class="card-text">Completed sales</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Total Revenue</div>
                    <div class="card-body">
                        <h5 class="card-title">Rp. {{ number_format($totalRevenue, 2) }}</h5>
                        <p class="card-text">Total earnings</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Recent Sales</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Book</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recentSales as $sale)
                                    <tr>
                                        <td>{{ $sale->user->username }}</td>
                                        <td>{{ $sale->book->title }}</td>
                                        <td>{{ $sale->quantity }}</td>
                                        <td>Rp. {{ number_format($sale->total, 2) }}</td>
                                        <td>{{ $sale->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Books Sold by Category</div>
                    <div class="card-body">
                        <div id="categorySalesChart"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Sales Status Comparison</div>
                    <div class="card-body">
                        <div id="salesStatusPieChart"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Books Count by Category</div>
                    <div class="card-body">
                        <div id="bookChart"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Monthly Sales</div>
                    <div class="card-body">
                        <div id="monthlySalesChart"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Top Users by Spending</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Total Spending</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($topUsers as $user)
                                    <tr>
                                        <td>{{ $user->username }}</td>
                                        <td>Rp. {{ number_format($user->total_spent, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Books Sold by Category Chart
            var categorySalesData = @json(array_values($categorySales));
            var categorySalesLabels = @json(array_keys($categorySales));
            var bookCountsData = @json(array_values($bookCounts));
            var bookCountsLabels = @json(array_keys($bookCounts));

            var categorySalesOptions = {
                chart: {
                    type: 'bar',
                    height: 350
                },
                series: [{
                    name: 'Books Sold',
                    data: categorySalesData
                }],
                xaxis: {
                    categories: categorySalesLabels
                },
                yaxis: {
                    title: {
                        text: 'Books Sold'
                    }
                }
            };

            var categorySalesChart = new ApexCharts(document.querySelector("#categorySalesChart"), categorySalesOptions);
            categorySalesChart.render();

            var bookCountsOptions = {
                chart: {
                    type: 'bar',
                    height: 350
                },
                series: [{
                    name: 'Number of Books',
                    data: bookCountsData
                }],
                xaxis: {
                    categories: bookCountsLabels
                },
                yaxis: {
                    title: {
                        text: 'Number of Books'
                    }
                }
            };

            var bookCountsChart = new ApexCharts(document.querySelector("#bookChart"), bookCountsOptions);
            bookCountsChart.render();

            // Sales Status Comparison Pie Chart
            var salesStatusOptions = {
                chart: {
                    type: 'pie',
                    height: 350
                },
                series: [{{ $pendingSalesCount }}, {{ $completedSalesCount }}],
                labels: ['Pending Sales', 'Completed Sales'],
                colors: ['#FFC107', '#28A745']
            };

            var salesStatusPieChart = new ApexCharts(document.querySelector("#salesStatusPieChart"), salesStatusOptions);
            salesStatusPieChart.render();

            // Monthly Sales Time Series Chart
            var monthlySalesData = @json(array_values($monthlySales));
            var monthlySalesLabels = @json(array_keys($monthlySales));

            var monthlySalesOptions = {
                chart: {
                    type: 'line',
                    height: 350
                },
                series: [{
                    name: 'Total Sales',
                    data: monthlySalesData
                }],
                xaxis: {
                    categories: monthlySalesLabels,
                    type: 'datetime',
                    labels: {
                        format: 'MMM yyyy'
                    }
                },
                yaxis: {
                    title: {
                        text: 'Total Sales'
                    }
                }
            };

            var monthlySalesChart = new ApexCharts(document.querySelector("#monthlySalesChart"), monthlySalesOptions);
            monthlySalesChart.render();
        });
    </script>
@endsection



