@csrf
<section>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Product Name :</label>
                <input required name="name" type="text" value="{{ old('name',isset($product)?$product->name:null) }}"  class="form-control form-control-line @error('name') is-invalid @enderror" id="name">
            </div>
            @error('name')
            <div class="pl-1 text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            @php
                if(old("category_id")){
                    $category_id = old('category_id');
                }elseif(isset($product)){
                    $category_id = $product->category_id;
                }else{
                    $category_id = null;
                }
            @endphp
            <div class="form-group">
                <label for="category_id">Category :</label>
                <select required class="form-control  form-control-line @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                    <option value="">Select Category</option>
                    @foreach($categories as $id=>$category)
                        <option @if($category_id == $id) selected @endif value="{{ $id }}">{{ $category }}</option>
                    @endforeach
                </select>
            </div>
            @error('category_id')
            <div class="pl-1 text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <div class="form-group">
                @php
                    if(old("brand_id")){
                        $brand_id = old('brand_id');
                    }elseif(isset($product)){
                        $brand_id = $product->brand_id;
                    }else{
                        $brand_id = null;
                    }
                @endphp
                <label for="brand_id">Brand :</label>
                <select required class="form-control  form-control-line @error('brand_id') is-invalid @enderror" name="brand_id" id="brand_id">
                    <option value="">Select Brand</option>
                    @foreach($brands as $id=>$value)
                        <option @if($brand_id == $id) selected @endif value="{{ $id }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            @error('brand_id')
            <div class="pl-1 text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="color">Color :</label>
                <input name="color" type="text" value="{{ old('color',isset($product)?$product->color:null) }}"  class="form-control form-control-line @error('color') is-invalid @enderror" id="color">
            </div>
            @error('color')
            <div class="pl-1 text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="size">Size :</label>
                <input name="size" type="text" value="{{ old('size',isset($product)?$product->size:null) }}"  class="form-control form-control-line @error('size') is-invalid @enderror" id="size">
            </div>
            @error('size')
            <div class="pl-1 text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="price">Price :</label>
                <input required name="price" type="number" step=".01" value="{{ old('price',isset($product)?$product->price:null) }}"  class="form-control form-control-line @error('price') is-invalid @enderror" id="price">
            </div>
            @error('price')
            <div class="pl-1 text-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="stock">Stock :</label>
                <input required name="stock" type="number" value="{{ old('stock',isset($product)?$product->stock:null) }}"  class="form-control form-control-line @error('stock') is-invalid @enderror" id="stock">
            </div>
            @error('stock')
            <div class="pl-1 text-danger">{{ $message }}</div>
            @enderror


            <div class="form-group">
                @php
                    if(old("status")){
                        $status = old('status');
                    }elseif(isset($product)){
                        $status = $product->status;
                    }else{
                        $status = null;
                    }
                @endphp
                <label for="default">Status</label>
                <br>
                <input name="status" type="radio" value="active" id="active" @if($status =='active') checked @endif >
                <label for="active">Active</label>
                <input name="status" type="radio" value="inactive" id="inactive" @if($status =='inactive') checked @endif >
                <label for="inactive">Inactive</label>
            </div>
            @error('status')
            <div class="pl-1 text-danger">{{ $message }}</div>
            @enderror


            <div class="form-group">
                @php
                    if(old("is_featured")){
                        $is_featured = old('is_featured');
                    }elseif(isset($product)){
                        $is_featured = $product->is_featured;
                    }else{
                        $is_featured = null;
                    }
                @endphp
                <label for="default">Is Featured?</label>
                <br>
                <input name="is_featured" type="checkbox" value="1" @if($is_featured == 1) checked @endif> <label
                    for="active">Yes</label>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="description">Product Details :</label>
                <textarea name="description" rows="5" class="form-control form-control-line @error('description') is-invalid @enderror" id="description">{{ old('description',isset($product)?$product->description:null) }}</textarea>
            </div>
            @error('description')
            <div class="pl-1 text-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="image">Images</label>
                <br>
                <input  type="file" name="images[]" id="image" multiple class="form-control form-control-line @error('images.*') is-invalid @enderror" @if(@!isset($product)) required @endif>
                <br>
                <br>

                <div>
                    @if(isset($product) && count($product->product_image))
                        @foreach($product->product_image as $image)
                            <div class="d-inline position-relative dbutton">
                                <img style="max-height: 80px; max-width: 30%;" src="{{ asset($image->file_path) }}" alt="">
                                <a href="{{ route('product.delete.image',$image->id) }}" class="btn float-right"> X </a>
                            </div>
                        @endforeach
                    @endif
                </div>
                @error('images.*')
                <div class="pl-1 text-danger">{{ $message }}</div>
                @enderror

            </div>
        </div>
    </div>
</section>


@push('custom-css')
    <style>
        .dbutton .btn {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #555;
            color: white;
            font-size: 8px;
            padding: 5px 8px;
            border-radius: 3px;
        }

        .dbutton .btn:hover {
            background-color: red;
    </style>
@endpush
