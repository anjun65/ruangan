@extends('layouts.admin')


@section('title')
    Dashboard
@endsection

@section('content')
<div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
    >
    <div class="container-fluid">
        <div class="dashboard-heading">
        <h2 class="dashboard-title">Admin Dashboard</h2>
        <p class="dashboard-subtitle">
            Administrator panel
        </p>
        </div>
        <div class="dashboard-content">
        <div class="row">
            <div class="col-md-4">
            <div class="card mb-2">
                <div class="card-body">
                <div class="dashboard-card-title">
                    User
                </div>
                <div class="dashboard-card-subtitle">
                    {{ $customer }}
                </div>
                </div>
            </div>
            </div>
            <div class="col-md-4">
            <div class="card mb-2">
                <div class="card-body">
                <div class="dashboard-card-title">
                    Peminjaman Belum Kembali 
                </div>
                <div class="dashboard-card-subtitle">
                    {{-- Rp. {{ $revenue }} --}}
                </div>
                </div>
            </div>
            </div>
            <div class="col-md-4">
            <div class="card mb-2">
                <div class="card-body">
                <div class="dashboard-card-title">
                    Jumlah Peminjaman 
                </div>
                <div class="dashboard-card-subtitle">
                    {{-- {{ $transactions }} --}}
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
@endsection