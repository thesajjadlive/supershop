@csrf
<div class="form-group">
    <input required type="text" name="name" value="{{ old('name',isset($category)?$category->name:null) }}" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Category Name">
</div>

@error('name')
<div class="pl-1 text-danger">{{ $message }}</div>
@enderror

<div class="form-group row">



    <div class="col-sm-6 mb-3 mb-sm-0">
        @php
            if(old("status")){
                $status = old('status');
            }elseif(isset($category)){
                $status = $category->status;
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

</div>
