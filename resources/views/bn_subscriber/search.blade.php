@extends('user.layouts.template')
@section('content')
<div class="row mb-4 row11">
    <div class="col-md-12">
    <div class="card p-2 bg-info">
     <h6 class="text-light">বাৎসরিক হিসাব দেখতে সাল নির্বাচন করুণ<span style="color: red">*</span> </h6>
       <form action="{{route('bn_chada.search')}}" method="GET">
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
<div class="card">
    <a href="{{route('redirects')}}"><h6 class="text-dark p-3">All Chada</h6></a>
    <table class="table table-responsive table-success table-striped">
        <thead>
        <tr>
        <th class="wd-10p">SL</th>
        <th class="wd-20p">তারিখ</th>
        <th class="wd-20p">সাল</th>
        <th class="wd-20p">টাকা</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($allChada as $key => $data)
        <tr>
        <td>{{++$key}}</td>
        <td>{{$data->date}}</td>
        <td>{{$data->year}}</td>
        <td>{{$data->amount}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
