@extends('layouts.app') @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Invoice #000{{ $salesOrder->id }}</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="invoice p-3 mb-3">
                    @include('includes.invoice-print')

                    <div class="row no-print">
                        <div class="col-12">
                            <a href="/invoice/print/{{ $salesOrder->id }}" rel="noopener" target="_blank"
                                class="btn btn-default float-right"><i class="fas fa-print"></i> Print</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
