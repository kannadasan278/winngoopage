@php
    $merchantPrice = $merchantPrice ?? null;
@endphp

<form action="{{ $route }}" method="POST">
    @csrf
    @if ($method === 'PUT')
        @method('PUT')
    @endif
    <div class="form-group col-6">
        <label for="type">Type</label>
        <input type="text" class="form-control" id="type" name="type" value="{{ old('type', $merchantPrice->type ?? '') }}" required>
    </div>
    <div class="form-group col-6">
        <label for="range">Range</label>
        <input type="text" class="form-control" id="range" name="range" value="{{ old('range', $merchantPrice->range ?? '') }}">
    </div>
    <div class="form-group col-6">
        <label for="price">Price</label>
        <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price', $merchantPrice->price ?? '') }}" required>
    </div>
    <div class="form-group col-6">
        <label for="vat">VAT</label>
        <input type="number" step="0.01" class="form-control" id="vat" name="vat" value="{{ old('vat', $merchantPrice->vat ?? '') }}" required>
    </div>
    <div class="form-group col-6">
        <label for="total_price">Total Price</label>
        <input type="number" step="0.01" class="form-control" id="total_price" name="total_price" value="{{ old('total_price', $merchantPrice->total_price ?? '') }}" required>
    </div><br><br>
    <button type="submit" class="btn btn-success">Submit</button>
    <a href="{{ route('admin.merchant-prices.index') }}" class="btn btn-secondary">Cancel</a>
</form>
