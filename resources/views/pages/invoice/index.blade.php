@extends('layouts.app') @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Invoices</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @include('includes.error-card')
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="defaultTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>Customer</th>
                                        <th>Status</th>
                                        <th class="text-right">Additional Fee</th>
                                        <th class="text-right">Subtotal</th>
                                        <th class="text-right">Total Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>
                                                <a href="{{ route('invoice.show', $item->id) }}">
                                                    #00{{ $item->id }}
                                                </a>
                                            </td>
                                            <td>{{ $item->date }}</td>
                                            <td>{{ $item->customer }}</td>
                                            <td>
                                                @include('includes.badge', ['status' => $item->status])
                                            </td>
                                            <td class="rupiah-format text-right">{{ $item->additional_fee }}</td>
                                            <td class="rupiah-format text-right">{{ $item->subtotal }}</td>
                                            <td class="rupiah-format text-right">{{ $item->total_amount }}</td>
                                            <td>
                                                <a href="{{ route('invoice.show', $item->id) }}" class="btn btn-primary">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="/invoice/print/{{ $item->id }}" class="btn btn-info"
                                                    target="_blank">
                                                    <i class="fa fa-print"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
