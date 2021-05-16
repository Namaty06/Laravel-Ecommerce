@extends('admin.master')

@section('main')


<h1 class="h2 mt-5 mb-3">Dashboard</h1>
<form action="{{route('admin.status.store')}}" method="POST">
   @csrf
      <div class="col-md-4 mb-3">
        <label for="validationCustom01"> Status :</label>
        <br>
        <input type="text" class="form-control " id="validationCustom01" placeholder="Status"  name="status" required>
      </div>
       
    <button class="btn btn-primary" type="submit">ADD Status</button>
  </form>
   
    
@endsection
