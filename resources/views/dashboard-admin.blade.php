@extends('layouts.base')

@section('header')
<div class="section-header">
    <h1>Dashboard</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('management') }}">Dashboard</a></div>

    </div>
  </div>
@endsection
