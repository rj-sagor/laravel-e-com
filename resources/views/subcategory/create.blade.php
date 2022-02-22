@extends('dashborad.dashboard-master')
@section('subcategory') active @endsection

@section('content')


<div class="container">
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header bg-success"><h5>Sub category Upload</h5></div>
                <div class="card-body">

            
            
               @if(session('Insdone'))
                  <div class="alert alert-success alert-dismissible fade show t" role="alert">
                <strong>{{session('Insdone') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>              
               @endif
               
                 <form action="{{url('/subcategory/store')}}" method="post">
                     @csrf 

                     <div class="mb-3">
                         <select name="category_id" class="custom-select" >
                             <option value="">select a category</option>
                             @foreach($all_category as $category)
                             <option value="{{$category->id}}">{{$category->category_name}}</option>

                             @endforeach
                         </select>
                     </div>

                    <div class="mb-3">
                        <input type="text" name="subcategory_name"  class="form-control" placeholder="Enter your subcategory">
                    </div>
                    @error('category_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <div class="mb-3">
                        <button type="submit" class="btn btn-sm btn-success">submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>



@endsection