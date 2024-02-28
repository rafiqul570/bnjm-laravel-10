@extends('admin.layouts.template')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
</head>
<body>
<div class="row">
  <div class="col-md-12">
   <div class="card pd-20 pd-sm-40 form-layout form-layout-5 text-light bg-dark">
     <h3 class="">Add Subscriber</h3>
       <form action="{{route('bn_subscriber.store')}}" method="POST">
          @csrf
            <div class="row row-xs mg-t-20">
              <label class="col-sm-2 form-control-label"><span class="tx-danger">*</span> Name:</label>
              <div class="col-sm-10 mg-t-10 mg-sm-t-0">
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="চাঁদাদাতার নাম">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
              </div>
            </div>

            <div class="row row-xs mg-t-20">
              <label class="col-sm-2 form-control-label"><span class="tx-danger">*</span> Amount:</label>
              <div class="col-sm-10 mg-t-10 mg-sm-t-0">
                <input type="text" name="amount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="চাঁদার পরিমান">
                <x-input-error :messages="$errors->get('amount')" class="mt-2" />
              </div>
            </div>

            <div class="row row-xs mg-t-20">
              <label class="col-sm-2 form-control-label"><span class="tx-danger">*</span> Phone:</label>
              <div class="col-sm-10 mg-t-10 mg-sm-t-0">
                <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="মোবাইল">
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
              </div>
            </div>

            <div class="row row-xs mg-t-20">
              <label class="col-sm-2 form-control-label"><span class="tx-danger">*</span> Password:</label>
              <div class="col-sm-10 mg-t-10 mg-sm-t-0">
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" required autocomplete="new-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
              </div>
            </div>

            <div class="row row-xs mg-t-20">
                <label class="col-sm-2 form-control-label"><span class="tx-danger">*</span> Confirm Password:</label>
                <div class="col-sm-10 mg-t-10 mg-sm-t-0">
                  <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" required autocomplete="new-password">
                  <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
              </div>

            <div class="row row-xs mg-t-30">
                <div class="col-sm-12 d-flex justify-content-end">
                  <div class="form-layout-footer">
                    <button class="btn btn-info mg-r-5">Add Subscriber</button>
                  </div><!-- form-layout-footer -->
                </div><!-- col-8 -->
              </div>
           </form>
          </div><!-- card -->
        </div>
       </div>

       <script src="https://code.jquery.com/jquery-3.7.1.js" ></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

       <script>
        @if (Session::has('success'))
            toastr.success("{{Session::get('success')}}");
        @endif
       </script>

    </body>
  </html>

@endsection
