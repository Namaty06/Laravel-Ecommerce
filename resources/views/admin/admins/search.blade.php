@extends('admin.master')

@section('main')
<div class="row mt-5">
  <div class="col-md-12 card p-3">
<h2>Customers</h2>
<div class="col-sm-10 mt-3 mb-3" >
  <form action="{{route('admin.searchuser')}}" method="get">
    <div class="input-group">

        <input id="search-input" placeholder="Search Users :" name="email" type="search" id="form1" class="form-control "  />                
       
       <button id="search-button" type="submit" class="btn btn-info">
          <i class="fas fa-search"></i>
        </button>
      </div>
      
    </form>
</div> 
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
           
            <th>UserName</th>
            <th>email</th>
            <th>Country</th>
            <th>Tel</th>
            <th>Admin</th>
            
          </tr>
        </thead>
         
        <tbody>   
       
            
           
          <tr>
            
           <td>{{$user->name}}</td>
           <td>{{$user->email}}</td>
           <td>{{$user->country}}</td>
           <td>{{$user->tel}}</td>

         <form action="{{route('admin.Alladmins.update',['id'=>$user->id])}}" method="post">   
          <td> 
             
              @csrf
              @method('PUT')

          <button class="btn btn-sm btn-primary " type="submit"><i class="fa fa-edit"></i> Add Admin</button>
        
        </td>
      </form>

          </tr>    
             
        </tbody>
      </table>
    </div>
  </div>  
</div>
@endsection