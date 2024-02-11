@extends('Backend.layout.sidenav-layout')
@section('content')
    @include('Backend.Component.invoice.invoice-list')
    @include('Backend.Component.invoice.invoice-delete')
    @include('Backend.Component.invoice.invoice-details')
@endsection
