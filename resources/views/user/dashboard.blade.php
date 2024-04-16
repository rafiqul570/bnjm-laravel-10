@extends('user.layouts.template')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pd-20 pd-sm-40 form-layout form-layout-5 py-2">
                <h3 class="text-dark text-center pb-3">{{ Auth::user()->name }}</h3>
                <div class="table-responsive">
                    <table id="dataTable" class="table align-middle table-bordered">
                     <thead>
                       <tr class="table-success">
                         <th class="wd-20p text-center">SL</th>
                         <th class="wd-20p text-center">Year</th>
                         <th class="wd-20p text-center">Month</th>
                         <th class="wd-20p text-center">Date</th>
                         <th class="wd-20p text-center">Amount</th>
                       </tr>
                     </thead>

                     <tbody>
                        @foreach ($allChada as $key => $data)
                       <tr>
                         <td class="text-center">{{++$key}}</td>
                         <td class="text-center">{{$data->year}}</td>
                         <td class="text-center">{{$data->month}}</td>
                         <td class="text-center">{{$data->date}}</td>
                         <td class="text-center">{{$data->amount}}</td>
                       </tr>
                       @endforeach
                     </tbody>
                  </table>
                  <div>
                    {{-- {{ $allChada->links() }} --}}
                  </div>
                 </div>
               </div>
        </div>
    </div>
</div>

@endsection
