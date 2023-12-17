@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('tenant.index') }}">Tenants</a></li>
                <li class="breadcrumb-item"><a href="{{ route('expenses.index', $id) }}">Expenses</a></li>
                <li class="breadcrumb-item"><a href="{{ route('transaction.index', $id) }}">Transaction History</a></li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>Transaction History</div>
            </div>
            <div class="card card-body border-0 shadow table-wrapper table-responsive">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
