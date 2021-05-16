@extends('admin.master')

@section('main')
<div class="row mt-5">
  <div class="col-md-12 card p-3">
<h2>Admins</h2>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>id</th>
            <th>UserName</th>
            <th>email</th>
            <th>Country</th>
            <th>Tel</th>
            <th>Is_Admin</th>
            
          </tr>
        </thead>
         
        <tbody>   
          @foreach ($admins as $admin)
            
           
          <tr>
            <td>{{$admin->id}}</td>
           <td>{{$admin->name}}</td>
           <td>{{$admin->email}}</td>
           <td>{{$admin->country}}</td>
           <td>{{$admin->tel}}</td>         
          <td>
             

         <form action="{{route('admin.Alladmins.update',['id'=>$admin->id])}}" method="post">                 
              @csrf
              @method('PUT')         
            <button type="submit" class="btn btn-sm btn-danger "><i class="fa fa-edit"></i> Remove Admin</button>
       </form></td>
      

          </tr>    
             @endforeach 
        </tbody>
      </table>
    </div>
  </div>  
</div>
@endsection