@extends('layout.sidenav-layout')
@section('content')
    @include('Backend.Component.category.category-list')
    @include('Backend.Component.category.category-delete')
    @include('Backend.Component.category.category-create')
    @include('Backend.Component.category.category-update')
@endsection
