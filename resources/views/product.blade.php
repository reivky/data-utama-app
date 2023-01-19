@extends('layouts.app')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Products</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Products</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <livewire:product-component />

    </main>
    <!-- End #main -->
@endsection
