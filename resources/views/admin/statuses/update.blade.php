@extends('admin.master')

@section('main')


<h1 class="h2 mt-5 mb-3">Dashboard</h1>
<form action="{{route('admin.status.update',['status'=>$status])}}" method="POST">
    @method('PUT')
   @csrf
      <div class="col-md-6 mb-3">
        <label for="validationCustom01"> Status :</label>
        <br>
        <input type="text" value="{{$status->status}}" class="form-control " id="validationCustom01" placeholder="status"  name="status" required>
      </div>
       
    <button class="btn btn-success" type="submit">Update Status</button>
  </form>
   
    
@endsection