@extends('admin.master')

@section('main')

<h2>Status</h2>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>Id</th>
            <th>Status</th>
            <th>Last Update</th>
            <th>Edit</th>
           
            
          </tr>
        </thead>
         <br>
        <tbody>
         
            @foreach ($statuses as $status)
          <tr>
            <td>{{$status->id}}</td>
            <td>{{$status->status}}</td>
           <td>{{$status->updated_at}}</td>

            <td style="width: 50px">
            <a class="btn btn-sm btn-info" href="{{route('admin.status.edit',['status'=>$status])}}"> <i class="fa fa-edit"></i> </a>
            </td>
        
          </tr>    
          @endforeach    
        </tbody>
      </table>
    </div>

@endsection

