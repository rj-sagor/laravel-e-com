@extends('dashborad.dashboard-master')

@section('subcategory') active @endsection

@section('content')


<div class="container">
    <div class="row">
       

        <div class="col-lg-12 m-auto">
            <div class="card">
                <div class="card-header m-auto">
                    <div class="card-title"><h3>Subcategory list</h3></div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">

                    @if(session('Insdone'))
                  <div class="alert alert-success ">
                <strong>{{session('Insdone') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>              
               @endif
                       
                    <thead>
                        <th>sl</th>
                        <th>Subcategory name</th>
                        <th>Category name</th>
                        <th>status</th>
                        <th>create_at</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @forelse($all_subcategory as $subcategories)
                          <tr>
                             <td>{{$loop->index}}</td>
                             <td>{{$subcategories->subcategory_name}}</td>
                             <td>{{$subcategories->subcategoryTocategory->category_name}}</td>
                             <td>
                                 @if($subcategories->status== '1') 
                                 <button class="btn btn-success btn-sm">active</button>
                                 @else
                                 <button class="btn btn-warning btn-sm">>deactive</button>
                                 @endif
                             </td>
                             <td>{{$subcategories->created_at->format('d-m-y')}}</td>
                            
                             <td>
                                 <a href="{{url('/subcategory/edit',$subcategories->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                 <a href="{{route('delete.category',$subcategories->id)}}"class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                             </td>
                          </tr>
                          @empty
                          <tr>
                          <td class="text-danger  text-center" colspan="10">no data added yet</td>
                          </tr>
                         

                        @endforelse
                    </tbody>

                    </table>
                
                </div>
            </div>
        </div>
    </div>
</div>



@endsection