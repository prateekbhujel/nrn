@extends('admin.layouts.master')

@section('title', 'Users Lists')

@section('content')
    <div class="section-header">
        <h1>Users Lists</h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm border-0">
                <div class="card-header text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">User Data</h4>
                    <a href="#" class="btn btn-info btn-sm">
                        <i class="fas fa-plus"></i>
                        Add New User
                    </a>
                </div>
                <div class="card-body">
                    {{ $dataTable->table(['class' => 'table table-striped table-hover']) }}
                </div>
            </div>
        </div>
    </div>
    
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
