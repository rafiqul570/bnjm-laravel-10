@extends('admin.layouts.template')
@section('content')
<div class="row mb-4 row11">
    <div class="col-md-12">
    <div class="card p-2 bg-info">
     <h6 class="text-light">বাৎসরিক হিসাব দেখতে সাল নির্বাচন করুণ<span style="color: red">*</span> </h6>
       <form action="{{route('bn_cash.search')}}" method="GET">
         <table width="100%">
              <td width="100%" class="">
               <div class="form-group">
                <select class="form-control" id="year" name="year">
                  <option selected>সাল নির্বাচন করুণ</option>
                  @foreach ($group as $data)
                  <option value="{{$data->year}}">{{$data->year}}</option>
                  @endforeach
                </select>
               </div>
              </td>
              <td width="10%">
            <input class="btn btn-info" type="submit" value="Search" style="margin-top: -20px">
          </td>
        </tr>
      </table>
    </form>
   </div>
  </div>
 </div>

 <div class="card p-2 bg-info">
         <h6 class="text-light">মাসিক হিসাব দেখার জন্য সাল ও মাস নির্বাচন করুণ <span style="color: red">*</span> </h6> 
        <form action="{{route('bn_cash.search')}}" method="GET">
          <table width="100%">
            <tr>
              <td width="45%" class="">
               <div class="form-group"> 
               <select class="form-control" id="year" name="year">
                  <option selected>সাল নির্বাচন করুণ</option>
                  @foreach ($group as $data)
                  <option value="{{$data->year}}">{{$data->year}}</option>
                  @endforeach
                </select>
               </div>
  
              </td>
              <td width="45%" class="">
               <div class="form-group"> 
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
              </td>
              <td width="10%">
                <input class="btn btn-info" type="submit" name="submit" value="Search" style="margin-top: -20px">
              </td>
            </tr>
          </table>
        </form>
       </div>



       <div class="card mt-4">
     <h6 class="text-dark p-3">All Cash</h6>
    <table class="table table-responsive table-success table-bordered">
        <thead>
        <tr>
        <th class="wd-10p">SL</th>
        <th class="wd-10p">তারিখ</th>
        <th class="wd-40p">বিবরণ</th>
        <th class="wd-20p">আয়</th>
        <th class="wd-20p">ব্যয়</th>
        </tr>
        </thead>
        <tbody>
        @php 
        $totalincome = 0; 
        $totalexpense = 0; 
        @endphp
        @foreach ($allCash as $key => $data)
        @php 
       
        $totalincome = $totalincome + $data->income;
        $totalexpense = $totalexpense + $data->expense;
        $balance = $totalincome - $totalexpense
        @endphp
        <tr>
        <td>{{++$key}}</td>
        <td>{{$data->date}}</td>
        <td>{{$data->description}}</td>
        <td>{{$data->income}}</td>
        <td>{{$data->expense}}</td>
        </tr>
        @endforeach
        <!-- Total -->
        <tr>
          <td colspan="3" class="text-right text-success"><h5>Total :</h5></td>
          <td colspan="" class="text-success">{{$totalincome}}</td>
          <td colspan="" class="text-success">{{$totalexpense}}</td>
        </tr>

        <tr>
          <td colspan="2" class="text-right text-success"><h5>Total Income :</h5></td>
          <td colspan="" class="text-success">{{$totalincome}}</td>
        </tr>

        <tr>
          <td colspan="2" class="text-right text-success"><h5>Total Expense :</h5></td>
          <td colspan="" class="text-success">{{$totalexpense}}</td>
        </tr>

        <tr>
          <td colspan="2" class="text-right text-success"><h5>Balance :</h5></td>
          <td colspan="" class="text-success">{{$balance}}</td>
        </tr>
        </tbody>
    </table>
</div>
@endsection