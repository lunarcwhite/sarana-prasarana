@extends('layouts.admin.master')
@section('pageTitle')
    Dashboard
@endsection
@section('pageLink')
    Dashboard
@endsection
@section('content')
<div class="row mb-3">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Peminjaman Yang Sedang Berlangssung</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$peminjaman->count()}}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-primary"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Riwayat Peminjaman</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$riwayat->count()}}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-shopping-cart fa-2x text-primary"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection