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
        <h6 class="tx-uppercase tx-bold tx-14 mg-b-30">Add Chada</h6>
        <form action="{{route('bn_chada.store')}}" method="POST">
        @csrf
        <div class="row row-xs">
          <label class="col-sm-2 form-control-label"><span class="tx-danger">*</span> Name:</label>
          <div class="col-sm-10 mg-t-10 mg-sm-t-0">
            <select class="form-control select2" name="user_id" data-placeholder="Choose one"
            data-parsley-class-handler="#slWrapper"
            data-parsley-errors-container="#slErrorContainer" required>
              <option selected>নাম নিরবাচন করুন</option>
              @foreach ($allSubscriber as $data)
              <option value="{{$data->id}}">{{$data->name}}</option>
              @endforeach
            </select>
          </div>
        </div><!-- row -->
        <div class="row row-xs mg-t-20">
          <label class="col-sm-2 form-control-label"><span class="tx-danger">*</span> Date:</label>
          <div class="col-sm-10 mg-t-10 mg-sm-t-0">
            <input type="date" class="form-control" name="date">
            <x-input-error :messages="$errors->get('date')" class="mt-2" />
          </div>
        </div>

        <div class="row row-xs mg-t-20">
            <label class="col-sm-2 form-control-label"><span class="tx-danger">*</span> Month:</label>
            <div class="col-sm-10 mg-t-10 mg-sm-t-0">
                <select class="form-control" name="month" id="month">
                    <option disabled selected>মাস নির্বাচন করুণ</option>
                    <option value="January">জানুয়ারি</option>
                    <option value="February">ফেব্রুয়ারি</option>
                    <option value="March">মার্চ</option>
                    <option value="April">এপ্রিল</option>
                    <option value="may">মে</option>
                    <option value="Jun">জুন</option>
                    <option value="July">জুলাই</option>
                    <option value="August">আগষ্ট</option>
                    <option value="September">সেপ্টেম্বর</option>
                    <option value="October">অক্টোবর</option>
                    <option value="November">নভেম্বর</option>
                    <option value="Desember">ডিসেম্বর</option>
                    </select>
            </div>
          </div>

          <div class="row row-xs mg-t-20">
            <label class="col-sm-2 form-control-label"><span class="tx-danger">*</span> Year:</label>
            <div class="col-sm-10 mg-t-10 mg-sm-t-0">
                <select class="form-control" name="year" id="year">
                <option disabled selected>সাল নির্বাচন করুণ</option>
                <?php date_default_timezone_set("Asia/Dhaka");?>
                <option value="<?php echo date('Y')?>"><?php echo date('Y')?></option>
                </select>
            </div>
          </div>

          <div class="row row-xs mg-t-20">
            <label class="col-sm-2 form-control-label"><span class="tx-danger">*</span> Amount:</label>
            <div class="col-sm-10 mg-t-10 mg-sm-t-0">
              <input type="number" class="form-control" name="amount">
              <x-input-error :messages="$errors->get('amount')" class="mt-2" />
            </div>
          </div>

        <div class="row row-xs mg-t-30">
            <div class="col-sm-12 d-flex justify-content-end">
              <div class="form-layout-footer">
                <button class="btn btn-info mg-r-5">Add Chada</button>
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
