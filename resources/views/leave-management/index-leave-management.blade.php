@extends('layouts.master')

@section('content')
    <livewire:leave.leave-manager />
@endsection

@push('scripts')
    @vite('resources/js/app.js')
@endpush

