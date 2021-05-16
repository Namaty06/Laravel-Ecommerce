@extends('admin.master')

@section('main')
<div class="row mt-5">
  <div class="col-md-12 card p-3">
<h2>Customers</h2>
<div class="col-sm-10 mt-3 " >
  <form action="{{route('admin.searchuser')}}" method="get">
<label for="">Email :</label>
    <div class="input-group mb-3">
      
      <input id="search-input" placeholder="Search Users :" name="search" type="email" id="form1" class="form-control "  />
    <button id="search-button" type="submit" class="btn btn-primary">
      <i class="fas fa-search"></i>
    </button>
     
    </form>
</div> 
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>id</th>
            <th>UserName</th>
            <th>email</th>
            <th>Country</th>
            <th>Tel</th>
            <th>Admin</th>
            
          </tr>
        </thead>
         
        <tbody>   
          @foreach ($users as $admin)
            
           
          <tr>
            <td>{{$admin->id}}</td>
           <td>{{$admin->name}}</td>
           <td>{{$admin->email}}</td>
           <td>{{$admin->country}}</td>
           <td>{{$admin->tel}}</td>

         <form action="{{route('admin.Alladmins.update',['id'=>$admin->id])}}" method="post">   
          <td> 
             
              @csrf
              @method('PUT')

          <button class="btn btn-sm btn-primary " type="submit"><i class="fa fa-edit"></i> Add Admin</button>
        
        </td>
      </form>

          </tr>    
             @endforeach 
        </tbody>
      </table>
    </div>
  </div>  
</div>
@endsection