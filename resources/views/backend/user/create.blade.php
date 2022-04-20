@extends('backend.master')

@section('content')
    <div class="br-pagetitle">
        <i class="icon ion-person-stalker"></i>
        <div>
            <h4>Add Category</h4>
            <p class="mg-b-0">
                <a href="{{ url('admin/dashboard') }}">Dashboard</a>
                / <a href="{{ url('admin/category/index') }}">Manage Category</a> / Add Category /
            </p>
        </div>
    </div>
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="row">
                @if($page == 'create' || $page == 'edit')
                <div class="col-md-12">
                    <form action="{{ $page == 'edit' ? url('admin/category/update/'.$category->id) : url('admin/category/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{ $category->name ?? old('name') }}" class="form-control" placeholder="Category name" required>
                            @if ($errors->has('name'))
                                <div class="text-danger">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="image" value="" class="form-control" onchange="imagePreview(event)">
                            <img src="" id="pre-logo"/>
                            @if(!empty($category->image))
                                <img src="{{ asset('/category/'.$category->image) }}" height="100" width="100"/>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-teal mt-3">Submit</button>
                        </div>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div><!-- br-pagebody -->
@endsection

@push('script')
    <script>
        function imagePreview(e){
            if (e.target.files[0]) {
                let image = e.target.files[0];
                if(image['type'] === 'image/jpeg' || image['type'] === 'image/png' || image['type'] === 'image/webp' || image['type'] === 'image/gif'){
                    let reader = new FileReader();
                    reader.onload = function ()
                    {
                        let output = document.getElementById('pre-logo');
                        output.src = reader.result;
                        output.style.display = "block";
                        output.style.width = "10%";
                    }
                    reader.readAsDataURL(event.target.files[0]);
                }else{
                   alert('This is not image file. Please input e valid image.');
                }
            }
        }
    </script>
@endpush
