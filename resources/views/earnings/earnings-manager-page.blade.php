@extends('layouts.master')

@section('content')
<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12">
        <div class="box p-5">
            <h2 class="text-lg font-medium mb-4">Earnings Management</h2>
            <livewire:earnings.earnings-manager />
        </div>
    </div>
</div>
@endsection


