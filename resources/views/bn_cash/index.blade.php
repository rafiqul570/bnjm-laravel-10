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
<div class="card pd-20 pd-sm-40">
    <h3 class="text-dark pb-3">All Cash</h3>
     <div class="table-responsive">
       <table id="datatable1" class="table table-striped table-info">
         <thead>
           <tr>
             <th class="wd-10p">SL NO</th>
             <th class="wd-20p">Date</th>
             <th class="wd-20p">Income</th>
             <th class="wd-20p">Expense</th>
             <th class="wd-20p">action</th>
           </tr>
         </thead>

         <tbody>
            @foreach ($allCash as $key => $data)
           <tr>
             <td>{{++$key}}</td>
             <td>{{$data->date}}</td>
             <td>{{$data->income}}</td>
             <td>{{$data->expense}}</td>
             <td>
                <a href="">Edit</a> ||
                <a href="">Delete</a>
             </td>
           </tr>
           @endforeach
         </tbody>
      </table>
     </div>
   </div>

@endsection
