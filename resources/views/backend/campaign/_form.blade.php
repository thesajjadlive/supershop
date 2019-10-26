@csrf
<div class="form-group">
    <input required type="text" name="name" value="{{ old('name',isset($campaign)?$campaign->name:null) }}" class="form-control @error('name') is-invalid @enderror" id="exampleInputCode" placeholder="Campaign Name">
</div>
@error('name')
<div class="pl-1 text-danger">{{ $message }}</div>
@enderror


<div class="form-group">
    <label>Campaign Details</label>
    <textarea name="details" id="" cols="84" rows="5"  class="form-control form-control-line @error('details') is-invalid @enderror">{{ old('details',isset($campaign)?$campaign->details:null) }}</textarea>
</div>
@error('details')
<div class="pl-1 text-danger">{{ $message }}</div>
@enderror


<div class="form-group">
    <input name="date" value="{{ old('date',isset($campaign)?$campaign->date:null) }}" class=" form-control datetimepicker form-control-line @error('date') is-invalid @enderror " type="date">
</div>
@error('date')
<div class="pl-1 text-danger">{{ $message }}</div>
@enderror


<div class="form-group">
    <input name="file_path"  class="form-control form-control-line @error('file') is-invalid @enderror" type="file">
</div>
@error('file')
<div class="pl-1 text-danger">{{ $message }}</div>
@enderror
