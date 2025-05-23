@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Edit Post</h5>
    <div class="card-body">
    <form method="post" action="{{route('settings.update')}}"  enctype="multipart/form-data">
        @csrf 
        {{-- @method('PATCH') --}}
        <div class="form-group">
          <label for="short_des" class="col-form-label">Short Description <span class="text-danger">*</span></label>
          <textarea class="form-control" id="quote" name="short_des">{{$data->short_des ?? ''}}</textarea>
          @error('short_des')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="description" class="col-form-label">Description <span class="text-danger">*</span></label>
          <textarea class="form-control" id="description" name="description">{{$data->description ?? ''}}</textarea>
          @error('description')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="inputPhoto" class="col-form-label">Logo <span class="text-danger">*</span></label>
            @if(isset($data->logo))
            <img id="holder1" src="{{asset($data->logo)}}" style="margin-top:15px;max-height:100px;">
            @else
            <img id="holder1" src="" style="margin-top:15px;max-height:100px;">
            @endif
          <input  class="form-control" type="file" name="logo">
        
        <div id="holder1" style="margin-top:15px;max-height:100px;"></div>

          @error('logo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <!-- <label for="inputPhoto" class="col-form-label">Photo <span class="text-danger">*</span></label>
          @if(isset($data->photo))
            <img id="holder" src="{{asset($data->photo)}}" style="margin-top:15px;max-height:100px;">
          @else
            <img id="holder" src="" style="margin-top:15px;max-height:100px;">

          @endif
          <input  class="form-control" type="file" name="photo" >
          <div id="holder" style="margin-top:15px;max-height:100px;"></div>
              @error('photo')
              <span class="text-danger">{{$message}}</span>
              @enderror
          </div> -->

        <div class="form-group">
          <label for="address" class="col-form-label">Address <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="address" required value="{{$data->address ?? ''}}">
          @error('address')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="email" class="col-form-label">Email <span class="text-danger">*</span></label>
          <input type="email" class="form-control" name="email" required value="{{$data->email ?? ''}}">
          @error('email')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="phone" class="col-form-label">Phone Number <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="phone" required value="{{$data->phone ?? ''}}">
          @error('phone')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="primary_color" class="col-form-label">Primary Color</label>
          <input type="color" class="form-control" name="primary_color" value="{{ $data->primary_color ?? '#3490dc' }}">
        </div>

        <div class="form-group">
          <label for="secondary_color" class="col-form-label">Secondary Color</label>
          <input type="color" class="form-control" name="secondary_color" value="{{ $data->secondary_color ?? '#ffed4a' }}">
        </div>

        <div class="form-group">
          <label for="background_color" class="col-form-label">Background Color</label>
          <input type="color" class="form-control" name="background_color" value="{{ $data->background_color ?? '#ffffff' }}">
        </div>

        <div class="form-group">
          <label for="text_color" class="col-form-label">Text Color</label>
          <input type="color" class="form-control" name="text_color" value="{{ $data->text_color ?? '#000000' }}">
        </div>

        <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">Update</button>
        </div>
      </form>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

@endpush
@push('scripts')
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script>
  
    $(document).ready(function() {
    $('#summary').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
    });

    $(document).ready(function() {
      $('#quote').summernote({
        placeholder: "Write short Quote.....",
          tabsize: 2,
          height: 100
      });
    });
    $(document).ready(function() {
      $('#description').summernote({
        placeholder: "Write detail description.....",
          tabsize: 2,
          height: 150
      });
    });
</script>
@endpush