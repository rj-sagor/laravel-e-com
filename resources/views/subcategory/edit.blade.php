@extends('dashborad.dashboard-master')

@section('subcategory') active @endsection

@section('content')


<div class="container">
    <div class="row">
        <div class="col-lg-12 m-auto">
            <div class="card">
                <div class="card-header"><h4>subcategory update</h4></div>
                <div class="card-body">

                
               @if(session('Insdone'))
                  <div class="alert alert-success alert-dismissible fade show t" role="alert">
                <strong>{{session('Insdone') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>              
               @endif 
               
                 <form action="{{url('subcategory/update',$subcategories->id)}}" method="post">
                     @csrf 


                     <div class="mb-3">
                         <select name="category_id" class="custom-select" >
                             <option value="">select a category</option>
                             @foreach($categories as $category)
                             <option value="{{$category->id}}"{{$category->id == $subcategories->category_id ? "selected" : ""}}>{{$category->category_name}}</option>

                             @endforeach
                         </select>
                     </div>

                    <div class="mb-3">
                        <input type="text" name="subcategory_name"  class="form-control" value="{{$subcategories->subcategory_name}}" required>
                    </div>
                
                    <div class="mb-3">
                        <button type="submit" class="btn btn-sm btn-success">update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>



@endsection