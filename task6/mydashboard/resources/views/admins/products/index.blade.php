@extends('admins.layouts.app')
@section('title','All Products')
@section('css')
@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}" />
@endsection
@section('content')
    <div class="col-12">
        @if (session('success'))
            <div class="alert text-center alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Bordered Table</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>

                <th>#</th>
                <th>name</th>
                <th>code</th>
                <th>quantity</th>
                <th>price</th>
                <th>status</th>
                <th>brand</th>
                <th>sub category</th>
                <th>creation date</th>
                <th>update date</th>
                <th>operations</th>

              </tr>
            </thead>
            <tbody>
                @foreach ( $allproducts as $product )
                <tr>



                <td>{{$product->id}}</td>
                <td>{{$product->name_en}}</td>
                <td>{{$product->code}}</td>
                 @if($product->quantity>=10){
                    <td class="text-success"> {{$product->quantity}}</td>
                 }
                 @elseif ($product->quantity==0){
                    <td class="text-danger"> {{$product->quantity}}</td>


                 }
                 @elseif ($product->quantity>0 &&$product->quantity<10){
                    <td class="text-warning"> {{$product->quantity}}</td>

                 }
                 @endif


               {{--  <td @class ([ 'text-success' =>$product->quantity>=10,
                            'text-danger' =>$product->quantity==0,
                    'text-warning'=>$product->quantity>0 AND $product->quantity<10 ])>
                 {{$product->quantity}}</td> --}}
                <td>{{$product->price}} EGP</td>
                <td><span
                    @class([
                        'badge',
                        'bg-success' => $product->status==1,
                        'bg-danger' => $product->status==0,
                    ])>{{ $product->status == 1 ? 'Active' : 'Not Active' }}</span>
                <td>{{$product->brand_name_en}}</td>
                <td>{{$product->subcategory_name_en}}</td>
                <td>{{$product->created_at}}</td>
                <td>{{$product->updated_at}}</td>
                <td>
                    <a class="btn btn-outline-primary  btn-sm" href="{{route('dashboard.products.edit',['id'=>$product->id])}}">Edit</a>
                    <a class="btn btn-outline-primary  btn-sm" href="">Delete</a>
                </td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
          <ul class="pagination pagination-sm m-0 float-right">
            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
          </ul>
        </div>

@endsection
