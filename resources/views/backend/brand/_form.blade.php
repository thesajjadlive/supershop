@csrf
<div class="form-group">
    <input required type="text" name="name" value="{{ old('name',isset($brand)?$brand->name:null) }}" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Brand Name">
</div>

@error('name')
<div class="pl-1 text-danger">{{ $message }}</div>
@enderror

<div class="form-group row">



    <div class="col-sm-6 mb-3 mb-sm-0">
        @php
            if(old("status")){
                $status = old('status');
            }elseif(isset($brand)){
                $status = $brand->status;
            }else{
                $status = null;
            }
        @endphp
        &nbsp;
        &nbsp;
        <label class="radio-inline"><input type="radio" value="active" name="status" @if($status =='active') checked @endif>Active</label> &nbsp;
        <label class="radio-inline"><input type="radio" value="inactive" name="status" @if($status =='inactive') checked @endif>Inactive</label>

        @error('status')
        <div class="pl-1 text-danger">{{ $message }}</div>
        @enderror
    </div>


    <div class="col-sm-6 mb-3 mb-sm-0">

    <div class="form-group">
        <label for="logo">Logo :</label>
        <input required class="form-control" name="logo" type="file" id="logo">
    </div>
    @error('logo')
    <div class="pl-1 text-danger">{{ $message }}</div>
    @enderror

    </div>


    <div class="col-sm-12 mb-3 mb-sm-0">
    <div class="form-group">
        <label for="details">Brand Details :</label>
        <textarea required name="details" rows="5" class="form-control form-control-line @error('details') is-invalid @enderror" id="details">{{ old('details',isset($brand)?$brand->details:null) }}</textarea>
    </div>
    @error('details')
    <div class="pl-1 text-danger">{{ $message }}</div>
    @enderror
    </div>

</div>
