@extends('admins.layouts.app')
@section('title','Edit Products')
@section('content')
@extends('admins.layouts.app')
@section('title', 'Edit Product')
@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Product Information</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{route('dashboard.products.update')}}" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-6">
                            <label for="name_ar">Product Name(AR) </label>
                            <input type="text" name="name_ar" class="form-control" id="name_ar"value="{{$product->name_ar}}"/>
                        </div>
                        <div class="col-6">
                            <label for="name_en">Product Name(EN)</label>
                            <input type="text" name="name_en" class="form-control" id="name_en"value="{{$product->name_en}}"/>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-4">
                            <label for="code">Code</label>
                            <input type="number" name="code" class="form-control" id="code" value="{{$product->code}}"/>
                        </div>
                        <div class="col-4">
                            <label for="price">Price</label>
                            <input type="number" name="price" class="form-control" id="price"value="{{$product->price}}" />
                        </div>
                        <div class="col-4">
                            <label for="quantity">Quantity</label>
                            <input type="number" name="quantity" class="form-control" id="quantity" value="{{$product->quantity}}"/>
                        </div>
                    </div>
                        <div class="form-row">
                            <div class="col-4">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Not Active</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="brand_id">Brand</label>
                                <select name="brand_id" id="brand_id" class="form-control">

                                          @foreach ($brands as $brand)
                                    <option @selected($product->brand_id==$brand->id) value="{{$brand->name_en}}">{{$brand->name_en}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-4">
                                <label for="subcategory_id">Sub Category</label>
                                <select name="subcategory_id" id="subcategory_id" class="form-control">

                                    @foreach ( $subcategories as $subcategory)
                                    <option @selected($product->subcategory_id==$subcategory->id) value="{{$subcategory->name_en}}" >{{$subcategory->name_en}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-6">
                                <label for="details_ar"> Details(AR)</label>
                                <textarea name="details_ar" class="form-control" id="details_ar" > {{$product->details_ar}}</textarea>
                            </div>
                                <div class="col-6">
                                    <label for="details_en"> Details(EN)</label>
                                    <textarea name="details_en" class="form-control" id="details_en" > {{$product->details_en}}</textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-4">
                                    <label for="image">
                                        <img src=" {{  $product->image }}" style="cursor: pointer" alt="{{$product->name_en}}"
                                            class="w-100">
                                    </label>
                                    <input type="file" name="image" id="image" class="d-none">
                                </div>
                            </div>
                        </div>

                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
            </form>
        </div>
    </div>

@endsection

@endsection
