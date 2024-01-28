@extends('Backend.layout.sidenav-layout')
@section('content')
    @include('Backend.Component.customer.customer-list')
    @include('Backend.Component.customer.customer-create')
    @include('Backend.Component.customer.customer-delete')
    @include('Backend.Component.customer.customer-update')
@endsection
