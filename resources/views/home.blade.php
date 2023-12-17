@extends('layouts.app')

@section('content')
    <style>
        #chartdiv {
            width: 100%;
            max-width: 100%;
            height: 500px;
        }
    </style>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Dashboard</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <h5 class="mt-3 mx-4">Rent Overview</h5>
                        <span class="mx-4">Several works need to done.</span>
                        <div class="d-flex flex-column flex-md-row justify-content-around mt-2">
                            <div class="card mb-3 mb-md-0">
                                <div class="card-header">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-door"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M14 12v.01" />
                                        <path d="M3 21h18" />
                                        <path d="M6 21v-16a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v16" />
                                    </svg>
                                    <span class="mx-3">Total Properties</span>
                                    <a href="{{ route('apartment.index') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-arrow-narrow-right" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M5 12l14 0" />
                                            <path d="M15 16l4 -4" />
                                            <path d="M15 8l4 4" />
                                        </svg></a>
                                </div>
                                <div class="card-body text-end">
                                    {{ $unitCount }}
                                </div>
                            </div>
                            <div class="card mb-3 mb-md-0">
                                <div class="card-header">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-door-off"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M3 21h18" />
                                        <path d="M6 21v-15" />
                                        <path d="M7.18 3.175c.25 -.112 .528 -.175 .82 -.175h8a2 2 0 0 1 2 2v9" />
                                        <path d="M18 18v3" />
                                        <path d="M3 3l18 18" />
                                    </svg>
                                    <span class="mx-3">Properties Rented</span>
                                    <a href="{{ route('tenant.index') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-arrow-narrow-right" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M5 12l14 0" />
                                            <path d="M15 16l4 -4" />
                                            <path d="M15 8l4 4" />
                                        </svg></a>
                                </div>
                                <div class="card-body text-end">
                                    {{ $livedInCount }}
                                </div>
                            </div>
                            <div class="card mb-md-0 mb-3">
                                <div class="card-header">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-door-enter"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M13 12v.01" />
                                        <path d="M3 21h18" />
                                        <path d="M5 21v-16a2 2 0 0 1 2 -2h6m4 10.5v7.5" />
                                        <path d="M21 7h-7m3 -3l-3 3l3 3" />
                                    </svg>
                                    <span class="mx-3">Properties Sales</span>
                                    <a href="{{ route('apartment.index') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-arrow-narrow-right" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M5 12l14 0" />
                                            <path d="M15 16l4 -4" />
                                            <path d="M15 8l4 4" />
                                        </svg></a>
                                </div>
                                <div class="card-body text-end">
                                    {{ $unitSales }}
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                    </svg>
                                    <span class="mx-3">Total Tenant</span>
                                    <a href="{{ route('tenant.index') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-arrow-narrow-right" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M5 12l14 0" />
                                            <path d="M15 16l4 -4" />
                                            <path d="M15 8l4 4" />
                                        </svg></a>
                                </div>
                                <div class="card-body text-end">
                                    {{ $tenantCount }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-6 mb-3">
                        <div class="card">
                            <div class="card-header">
                                <div id="chartdiv1"></div>
                            </div>
                            <div class="card-body">
                                Properties Rented Statistic
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <div id="chartdiv2"></div>
                            </div>
                            <div class="card-body">
                                Profit Statistic
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <!-- Highcharts Configuration -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var dataTenant = @json($livedIn);

            var seriesTenant = dataTenant.map(function(item) {
                return {
                    x: moment(item.date, 'YYYY-MM-DD').valueOf(),
                    y: item.lived_in_count
                };
            });

            Highcharts.chart('chartdiv1', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: null
                },
                xAxis: {
                    type: 'datetime',
                    labels: {
                        format: '{value:%b, %Y}'
                    },
                    title: {
                        text: 'Date'
                    }
                },
                yAxis: {
                    title: {
                        text: 'Properties Rented'
                    }
                },
                legend: {
                    enabled: false
                },
                series: [{
                    name: 'Moved In',
                    data: seriesTenant
                }],
                accessibility: {
                    enabled: true // Enable accessibility module
                }
            });

            var dataProfit = @json($profit);

            var seriesProfit = dataProfit.map(function(item) {
                return {
                    x: moment(item.date, 'YYYY-MM-DD').valueOf(),
                    y: item.profit_count
                };
            });

            Highcharts.chart('chartdiv2', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: null
                },
                xAxis: {
                    type: 'datetime',
                    labels: {
                        format: '{value:%b, %Y}' // Format the x-axis labels as abbreviated month and year
                    },
                    title: {
                        text: 'Date'
                    }
                },
                yAxis: {
                    title: {
                        text: 'Profit'
                    },
                    labels: {
                        formatter: function() {
                            return '₱ ' + this.value; // Add peso sign to yAxis labels
                        }
                    }
                },
                legend: {
                    enabled: false
                },
                tooltip: {
                    formatter: function() {
                        return '<b>' + Highcharts.dateFormat('%b %Y', this.x) + '</b><br/>' +
                            'Profit: ₱ ' + Highcharts.numberFormat(this.y, 2);
                    }
                },
                series: [{
                    name: 'Profit',
                    data: seriesProfit
                }],
                accessibility: {
                    enabled: true // Enable accessibility module
                }
            });

        });
    </script>
@endpush
