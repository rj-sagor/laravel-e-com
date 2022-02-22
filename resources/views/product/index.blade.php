@extends('dashborad.dashboard-master')

@section('product') active @endsection

@section('content')


<div class="container">
    <div class="row">
       

        <div class="col-lg-12 m-auto">
            <div class="card">
                <div class="card-header m-auto">
                    <div class="card-title"><h3>Product list</h3></div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                       
                    <thead>
                        <th>sl</th>
                        <th>product name</th>
                        <th>old price</th>
                        <th>new price</th>
                        <th>product image</th>
                        <th>Short discription</th>
                        <th>category name</th>
                        <th>Subcategory name</th>
                        <th>sku Number</th>
                       
                        <th>created at</th>
                        <th>action</th>
                    </thead>
                    <tbody>
                        @forelse($all_product as $product)
                          <tr>
                             <td>{{$loop->index}}</td>
                             <td>{{$product->product_name}}</td>
                             <td>{{$product->old_price}}</td>
                             <td>{{$product->new_price}}</td>
                             <td>
                                 <img src="{{asset('uploads/product_image')}}/{{ $product->product_image }} " alt="not found" width="50px" height="50px">
                             </td>
                             <td>{{$product->short_description}}</td>
                           
                             
                             <td>{{$product->riletiontoCategory->category_name}}</td>
                             <td>{{$product->riletionTosSubcategory->subcategory_name}}</td>
                             <td>{{$product->sku_number}}</td>
                             
                             <td>{{$product->created_at->format('d-m-y')}}</td>
                             <td>
                                 <a href="" class="btn btn-sm btn-warning">Edit</a>
                                 <a href=""class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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