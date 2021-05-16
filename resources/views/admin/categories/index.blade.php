@extends('admin.master')

@section('main')

<h2>My Categories</h2>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>id</th>
            <th>title</th>
            <th>Last Update</th>
            
            <th>Edit</th>
            <th>Delete</th>
            
          </tr>
        </thead>
         <br>
        <tbody>
         
            @foreach ($categories as $category)
          <tr>
              <td>{{$category->id}} </td>
            <td>{{$category->title}}</td>
          
            <td>{{$category->updated_at}}</td>

            <td style="width: 50px">
            <a class="btn btn-sm btn-info" href="{{route('admin.categories.edit',['category'=>$category])}}"> <i class="fa fa-edit"></i> </a>
            </td>
            <td>
              <form action="{{route('admin.categories.destroy',['category'=>$category])}}" method="POST">
            @csrf
            @method('Delete')
               
                <button type="submit"   class="btn btn-sm btn-danger">
                    <i style="font-size:16px" class="fa fa-trash"></i>
                </button>
           
           </form>
              </td>
          </tr>    
          @endforeach    
        </tbody>
      </table>
    </div>

@endsection