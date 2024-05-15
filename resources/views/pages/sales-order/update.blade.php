<!-- Modal -->
<div class="modal fade" id="formUpdate{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="formUpdate{{ $item->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('sales-order.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="formUpdate{{ $item->id }}Label">
                        Update Sales Order
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date" placeholder="Input Date"
                                    name="date" required value="{{ $item->date }}" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="target_date">Target Date</label>
                                <input type="date" class="form-control" id="target_date"
                                    placeholder="Input Target Date" name="target_date" required
                                    value="{{ $item->target_date }}" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="customer">Customer</label>
                                <input type="text" class="form-control" id="customer" placeholder="Input Customer"
                                    name="customer" required value="{{ $item->customer }}" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="additional_fee">Additional Price</label>
                                <input type="number" class="form-control" id="additional_fee"
                                    placeholder="Input Additional Price" name="additional_fee" required
                                    value="{{ $item->additional_fee }}" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="note">Note</label>
                                <textarea class="form-control" id="note" placeholder="Note..." name="note" required>{{ $item->note }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
