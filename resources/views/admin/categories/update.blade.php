@extends('admin.master')

@section('main')


<h1 class="h2 mt-5 mb-3">Dashboard</h1>
<form action="{{route('admin.categories.update',['category'=>$category])}}" method="POST">
    @method('PUT')
   @csrf
      <div class="col-md-6 mb-3">
        <label for="validationCustom01"> Title :</label>
        <br>
        <input type="text" value="{{$category->title}}" class="form-control " id="validationCustom01" placeholder="Title"  name="title" required>
      </div>
       
    <button class="btn btn-success" type="submit">Update Category</button>
  </form>
   
    
@endsection