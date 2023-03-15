@extends('admin.layouts.dashboard')
@section('title')
  Users Edit
@endsection
@section('breadcrumbs')
  {{-- {{ Breadcrumbs::render('add_category') }} --}}
@endsection
@section('content')
<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-body">
            <form action="{{ route('users.update',1) }}" method="POST">
               @csrf
               @method('PUT')
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
               <!-- name -->
               <div class="form-group">
                  <label for="input_user_name" class="font-weight-bold">
                     Name
                  </label>
                  <input id="input_user_name" value="{{ $user->name }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="" disabled />
                  <!-- error message -->
                  @error('name')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                        @enderror
               </div>
               <div class="form-group">
                  <label for="input_user_email" class="font-weight-bold">
                     Email
                  </label>
                  <input id="input_user_email"  value="{{ $user->email }}" name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder=""
                     autocomplete="email" disabled />
                  <!-- error message -->
                  @error('email')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                        @enderror
               </div>
               
               <div class="form-group">
                  <label for="input_old_password" class="font-weight-bold">
                     Old Password
                  </label>
                  <input id="input_old_password"   name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" value="{{ old('old_password') }}" />
                  <!-- error message -->
                  @error('old_password')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                        @enderror
               </div>
               
                <div class="form-group">
                  <label for="input_new_password" class="font-weight-bold">
                     New Password
                  </label>
                  <input id="input_new_password"  name="new_password" type="password"  class="form-control @error('new_password') is-invalid @enderror" value="{{ old('new_password') }}"/>
                  <!-- error message -->
                  @error('new_password')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                        @enderror
               </div>
                <div class="form-group">
                  <label for="input_confirm_password" class="font-weight-bold">
                     Confirm Password
                  </label>
                  <input id="input_confrm_password"   name="new_password_confirmation" type="password" class="form-control @error('confirm_password') is-invalid @enderror" />
                  <!-- error message -->
                  @error('new_password_confirmation')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                        @enderror
               </div>
               
               </div>
               <!-- password -->
               <div class="float-right">
                  <a class="btn btn-warning px-4 mx-2" href="">
                     Back
                  </a>
                  <button type="submit" class="btn btn-primary float-right px-4">
                     Save
                  </button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection
@push('css-external')
  <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2-bootstrap4.min.css') }}"> 
@endpush
@push('javascript-external')
  <script  src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
@endpush
@push('javascript-internal')
@endpush