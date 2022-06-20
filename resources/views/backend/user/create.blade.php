@extends('backend.master')

@section('content')
    <div class="br-pagetitle">
        <i class="icon ion-person-stalker"></i>
        <div>
            <h4>Add User</h4>
            <p class="mg-b-0">
                <a href="{{ url('admin/dashboard') }}">Dashboard</a>
                / <a href="{{ url('admin/user/index') }}">Manage User</a> / Register User /
            </p>
        </div>
    </div>
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="row">
                @if($page == 'create' || $page == 'edit')
                <div class="col-md-12">
                    <form action="{{ $page == 'edit' ? url('admin/user/update/') : url('admin/user/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">avatar</label>
                            <input type="file" name="avatar" required value="" class="form-control" onchange="imagePreview(event)">
                            <img src="" id="pre-logo" class="my-3" />
                            @if(!empty($user->avatar))
                                <img src="{{ asset('/user/'.$user->avatar) }}" height="100" width="100"/>
                            @endif
                            @if ($errors->has('avatar'))
                                <div class="text-danger">{{ $errors->first('avatar') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" value="" class="form-control" placeholder="User name" required>
                            @if ($errors->has('name'))
                                <div class="text-danger">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">email</label>
                            <input type="email" name="email" value="" class="form-control" placeholder="User email" required>
                            @if ($errors->has('email'))
                                <div class="text-danger">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">phone</label>
                            <input type="text" name="phone" value="" class="form-control" placeholder="User phone" required>
                            @if ($errors->has('phone'))
                                <div class="text-danger">{{ $errors->first('phone') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">password</label>
                            <input type="password" name="password" value="" class="form-control" placeholder="User password" required>
                            @if ($errors->has('password'))
                                <div class="text-danger">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">address</label>
                            <input type="text" name="address" value="" class="form-control" placeholder="User address" required>
                            @if ($errors->has('address'))
                                <div class="text-danger">{{ $errors->first('address') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            
                            <label class="text">Division</label>
                            <select name="division" id="" class="form-control" required>
                                <option value="Dhaka">Dhaka</option>
                                <option value="Barishal">Barishal</option>
                                <option value="Chattogram">Chattogram</option>
                                <option value="Khulna">Khulna</option>
                                <option value="Rajshahi">Rajshahi</option>
                                <option value="Rangpur">Rangpur</option>
                                <option value="Mymensingh">Mymensingh</option>
                                <option value="Sylhet">Sylhet</option>
                            </select>


                            @if ($errors->has('division'))
                                <p class="text-danger text-right text-capitalize">{{ $errors->first('division') }}</p>
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
