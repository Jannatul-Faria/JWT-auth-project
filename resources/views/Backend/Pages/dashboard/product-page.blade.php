@extends('layout.sidenav-layout')
@section('content')
    @include('Backend.Component.product.product-list')
    @include('Backend.Component.product.product-delete')
    @include('Backend.Component.product.product-create')
    @include('Backend.Component.product.product-update')
@endsection
