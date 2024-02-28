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
      <div class="col-md-6 mb-4">
        <div class="card pl-3">
          <h5 class="text-center mb-5 pt-2">ADD INCOME</h5>
          <form action="{{route('bn_cash.store')}}" method="POST">
            @csrf
          <div class="form-group row">
          <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">তারিখ</label>
          <div class="col-sm-8">
            <input type="date" class="form-control form-control-sm" name="date" id="colFormLabelSm">
            <x-input-error :messages="$errors->get('date')" class="mt-2" />
          </div>
          </div>

          <div class="form-group row">
          <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">মাস</label>
          <div class="col-sm-8">
            <select class="form-control" id="month" name="month">
              <option>মাস নির্বাচন করুণ</option>
              <option value="Jan">January</option>
              <option value="Feb">February</option>
              <option value="Mar">March</option>
              <option value="Apr">April</option>
              <option value="May">May</option>
              <option value="Jun">June</option>
              <option value="Jul">July</option>
              <option value="Aug">August</option>
              <option value="Sep">September</option>
              <option value="Oct">October</option>
              <option value="Nov">November</option>
              <option value="Dec">December</option>
            </select>
          </div>
          </div>
          
          <div class="form-group row">
          <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">সাল</label>
          <div class="col-sm-8">
                <select class="form-control" name="year" id="year">
                <option disabled selected>সাল নির্বাচন করুণ</option>
                <?php date_default_timezone_set("Asia/Dhaka");?>
                <option value="<?php echo date('Y')?>"><?php echo date('Y')?></option>
                </select>
            </div>
          </div>
          
          <div class="form-group row">
          <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">আয়ের বিবরণ</label>
          <div class="col-sm-8">
            <select class="form-control" id="select1" name="description">
              <option>আয়ের খাত নির্বাচন করুণ</option>
              <option value="চাঁদা">চাঁদা</option>
              <option value="বাক্সা কালেকশন">বাক্সা কালেকশন</option>
              <option value="বিবিধ">বিবিধ</option>
            </select>
          </div>
          </div>

        <div class="form-group row">
          <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">আয় (টাকা)</label>
          <div class="col-sm-8">
            <input type="number" class="form-control form-control-sm" name="income" id="colFormLabelSm" placeholder="টাকার পরিমান">
            <x-input-error :messages="$errors->get('income')" class="mt-2" />
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-8">
            <input type="hidden" class="form-control form-control-sm" name="expense" id="colFormLabelSm" value="00">
          </div>
        </div>


        <div class="form-layout-footer mg-t-30 mg-r-5 tx-right pb-5">
        <button type="submit" class="btn btn-primary mg-r-5" name="submit" style="cursor: pointer;">Submit</button>
        <button class="btn btn-danger" style="cursor: pointer;">Cancel</button>
      </div><!-- form-layout-footer -->   
      </form>

      <div class="mt-4 pb-3">
        <h5>প্রয়োজনে আয়ের খাত যোগ করুন</h5>
        <input type="text" id="val1">
          <button class="btn btn-info mt-3 btn-block" onclick="insertValue1();">Add</button>
      </div>
        </div>
      </div>
      

    <div class="col-md-6">
        <div class="card pl-3">
          <h5 class="text-center mb-5 pt-2">ADD EXPENSE</h5>
          <form action="{{route('bn_cash.store')}}" method="POST">
            @csrf
          <div class="form-group row">
          <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">তারিখ</label>
          <div class="col-sm-8">
            <input type="date" class="form-control form-control-sm" name="date" id="colFormLabelSm">
            <x-input-error :messages="$errors->get('date')" class="mt-2" />
          </div>
          </div>

          <div class="form-group row">
          <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">মাস</label>
          <div class="col-sm-8">
            <select class="form-control" id="month" name="month">
              <option>মাস নির্বাচন করুণ</option>
              <option value="Jan">January</option>
              <option value="Feb">February</option>
              <option value="Mar">March</option>
              <option value="Apr">April</option>
              <option value="May">May</option>
              <option value="Jun">June</option>
              <option value="Jul">July</option>
              <option value="Aug">August</option>
              <option value="Sep">September</option>
              <option value="Oct">October</option>
              <option value="Nov">November</option>
              <option value="Dec">December</option>
            </select>
          </div>
          </div>

          <div class="form-group row">
          <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">সাল</label>
          <div class="col-sm-8">
                <select class="form-control" name="year" id="year">
                <option disabled selected>সাল নির্বাচন করুণ</option>
                <?php date_default_timezone_set("Asia/Dhaka");?>
                <option value="<?php echo date('Y')?>"><?php echo date('Y')?></option>
                </select>
            </div>
          </div>
          
        <div class="form-group row">
          <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">ব্যয়ের বিবরণ</label>
          <div class="col-sm-8">
            <select class="form-control" id="select2" name="description">
              <option>ব্যয়ের খাত নির্বাচন করুণ</option>
              <option value="ইমাম সাহেবের বেতন">ইমাম সাহেবের বেতন</option>
              <option value="খাদেমের বেতন">খাদেমের বেতন</option>
              <option value="বিদ্যুৎ বিল">বিদ্যুৎ বিল</option>
              <option value="বিবিধ">বিবিধ</option>
            </select>
          </div>
          </div>

        <div class="form-group row">
          <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">ব্যয় (টাকা)</label>
          <div class="col-sm-8">
            <input type="number" class="form-control form-control-sm" name="expense" id="colFormLabelSm" placeholder="টাকার পরিমান">
            <x-input-error :messages="$errors->get('expense')" class="mt-2" />
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-8">
            <input type="hidden" class="form-control form-control-sm" name="income" id="colFormLabelSm" value="00">
          </div>
        </div>


        <div class="form-layout-footer mg-t-30 mg-r-5 tx-right pb-5">
        <button type="submit" class="btn btn-primary mg-r-5" name="submit" style="cursor: pointer;">Submit</button>
        <button class="btn btn-danger" style="cursor: pointer;">Cancel</button>
      </div><!-- form-layout-footer -->  
      </form>
      <div class="mt-4 pb-3">
        <h5>প্রয়োজনে ব্যয়ের খাত যোগ করুন</h5>
        <input type="text" id="val2">
          <button class="btn btn-info mt-3 btn-block" onclick="insertValue2();">Add</button>
      </div>
      </div>
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
