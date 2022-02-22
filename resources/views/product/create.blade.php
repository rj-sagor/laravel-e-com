@extends('dashborad.dashboard-master')
@section('product') active @endsection

@section('content')


<div class="container">
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header"><h5>Add product</h5></div>
                <div class="card-body">

               
               
                 <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                     @csrf 

                    <div class="mb-3">
                        <label for="form-label text-uppercase">product name</label>
                        <input type="text" name="product_name"  class="form-control">
                  
                    @error('product_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    </div>

                    <div class="mb-3">
                        <label for="form-label text-uppercase">Old price</label>
                        <input type="text" name="old_price"  class="form-control">
                   
                    @error('old_price')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    </div>

                    <div class="mb-3">
                        <label for="form-label text-uppercase">new price</label>
                        <input type="text" name="new_price"  class="form-control">
                
                    @error('new_price')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    </div>

                    <div class="mb-3">
                        <label for="form-label text-uppercase">category_id</label>
                        <select name="category_id" class="custom-select" id="CatID">
                            @foreach($all_categories as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                        </select>
                        
                
                    @error('category_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    </div>

                    <div class="mb-3">
                        <label for="form-label text-uppercase">subcategory_id</label>
                        <select name="sub_category_id" class="custom-select" id="subcatId">
                        @foreach($all_subcategory as $subcategory)
                        <option value="{{$subcategory->id}}">{{$subcategory->subcategory_name}}</option>
                        @endforeach
                        </select>
                        
                
                    @error('category_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    </div>


                    <div class="mb-3">
                        <label for="form-label text-uppercase ">Shor description</label>
                        <textarea name="short_description" class="form-control"></textarea>
                
                    @error('new_price')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    </div>

                   
                   
                    <div class="mb-3">
                        <label for="form-label text-uppercase">product Image</label>
                        <input type="file" name="product_image"  class="form-control">
                
                    @error('product')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    </div>

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

@section('footer')
<script>
    $(document).ready(function(){
        $('#CatID').select2();
        $('#subcatId').select2();
    });
</script>

@endsection
`









                    

                    