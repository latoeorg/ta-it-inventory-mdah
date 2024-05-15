<!-- Modal -->
<div class="modal fade" id="formUpdate{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="formUpdate{{ $item->id }}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('purchase-order-item.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="purchase_order_id" value="{{ $purchaseOrder->id }}">

                <div class="modal-header">
                    <h5 class="modal-title" id="formUpdate{{ $item->id }}Label">
                        Edit Item
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="purchaseOrder">Purchase Order</label>
                        <input type="text" class="form-control" id="purchaseOrder" disabled
                            value="Purchase Order #00{{ $purchaseOrder->id }}" />
                    </div>
                    <div class="form-group">
                        <label for="item_id">Item</label>
                        <select name="item_id" id="item_id" class="form-control" required>
                            <option value="">-- Select Item --</option>
                            @foreach ($list_items as $i)
                                <option value="{{ $i->id }}" {{ $i->id == $item->item_id ? 'selected' : '' }}>
                                    {{ $i->name }} - {{ $i->price }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" id="quantity" placeholder="Input Quantity"
                            name="quantity" required value="{{ $item->quantity }}" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn bg-navy">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
