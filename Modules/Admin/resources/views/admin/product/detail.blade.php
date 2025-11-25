@extends('admin::admin.index')
@section('content')
    <div class="row" style="min-height: 650px">
        <div class="col-12">
            <div class="car my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                      <h6 class="text-white text-capitalize ps-3">Chi tiết sản phẩm</h6>
                          <button class="btn  ">
                              <a class="text-white" href="{{route('product.index')}}">Quay lại</a>
                          </button>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="mt-2" style="margin-left: 15px">
                        <h4>Mã sản phẩm</h4>
                        <span>{{$products->id}}</span>
                    </div>
                    <div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Loại sản phẩm</h4>
                        <span>{{$category->name ?? 'N/A'}}</span>
                    </div>
                    <div class="mt-2" style="margin-left: 15px">
                        <h4>Tên sản phẩm</h4>
                        <span>{{$products->name}}</span>
                    </div>
                    <div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Ảnh sản phẩm</h4>
                        <img src="{{URL::to('/')}}/images/{{$products->image}}" alt="" width="200px">
                    </div>
                    <div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Giá sản phẩm</h4>
                        <span>{{number_format($products->price)}} VNĐ</span>
                    </div>
                    <div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Giá giảm</h4>
                        <span>{{$products->discount ? number_format($products->discount) . ' VNĐ' : 'N/A'}}</span>
                    </div>
                    <div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Màu sắc</h4>
                        <span>{{$products->color ?? 'N/A'}}</span>
                    </div>
                    <h4>Số lượng</h4>
                    {{-- @dd($quantities) --}}
                    @foreach($quantities as $q)
                    <div class="info_group mt-2" style="margin-left: 15px">
                        <span>Size {{$q->size_name}}: {{$q->pivot->quantity}}</span>
                    </div>
                    @endforeach
                    <div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Mô tả</h4>
                        <span>{{$products->description ?? 'N/A'}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection