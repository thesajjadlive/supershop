@csrf
<div class="form-group">
    <input required type="text" name="code" value="{{ old('code',isset($coupon)?$coupon->code:null) }}" class="form-control @error('code') is-invalid @enderror" id="exampleInputCode" placeholder="Coupon Code">
</div>
@error('code')
<div class="pl-1 text-danger">{{ $message }}</div>
@enderror


<div class="form-group">
    <input required type="text" name="value" value="{{ old('value',isset($coupon)?$coupon->value:null) }}" class="form-control @error('value') is-invalid @enderror" id="exampleInputCode" placeholder="Coupon Value">
</div>
@error('value')
<div class="pl-1 text-danger">{{ $message }}</div>
@enderror


<div class="form-group">
    <input required type="text" name="min_limit" value="{{ old('min_limit',isset($coupon)?$coupon->min_limit:null) }}" class="form-control @error('min_limit') is-invalid @enderror" id="exampleInputCode" placeholder="Minimum Limit">
</div>
@error('min_limit')
<div class="pl-1 text-danger">{{ $message }}</div>
@enderror
