@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Product Section</span>
      </nav>

      <div class="sl-pagebody">
      
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

      <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Update Product 
            <a href="{{ route('product.index')}}" class="btn btn-success btn-sm pull-right">All Products</a>
          </h6>
          <p class="mg-b-20 mg-sm-b-30">Product Update Form</p>
        <form method="post" action="{{ route('product.update',$product->id)}}">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_name" value="{{$product->product_name}}">
                </div>
              </div><!-- col-6 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_code" value="{{$product->product_code}}">
                </div>
              </div><!-- col-6 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_quantity" value="{{$product->product_quantity}}">
                </div>
              </div><!-- col-6 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Discount: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="discount_price" value="{{$product->discount_price}}">
                </div>
              </div><!-- col-6 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="category_id">
                    <option label="Choose category"></option>
                    @foreach($category as $row)
                        <option value="{{$row->id}}" <?php if($row->id == $product->category_id){
                        echo "selected"; } ?> > {{$row->category_name}} </option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Subcategory: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="subcategory_id">
                  @foreach($subcategory as $row)
                        <option value="{{$row->id}}" <?php if($row->id == $product->subcategory_id){
                        echo "selected"; } ?> > {{$row->subcategory_name}} </option>
                  @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_size" id="product_size" value="{{$product->product_size}}" data-role="tagsinput">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Colour: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_color" id="product_color" value="{{$product->product_color}}" data-role="tagsinput">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Selling Price: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="selling_price" value="{{$product->selling_price}}" >
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Product Details: <span class="tx-danger">*</span></label>
                  <textarea class="form-control" id="summernote" name="product_details" >
                    {{$product->product_details}}
                  </textarea>
                </div>
              </div><!-- col-12 -->
            </div><!-- row -->

            <hr><br><br>
            <br><br>

            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit">Submit Form</button>
              <a class="btn btn-default icon-btn" href="{{url('admin/product')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </div><!-- card -->
        </form>
        </div>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Update Files</h6>
            <form method="post" action="{{ route('product.file.update')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <label class="form-control-label">Image: <span class="tx-danger">*</span></label>
                        <label class="custom-file">
                            <input type="file" id="image_one" name="image_one" class="custom-file-input" onchange="readURL1(this);"> 
                            <span class="custom-file-control"></span>
                            <img src="#" id="one">
                        </label>
                    </div><!-- col-6 -->
                    <div class="col-lg-6 col-sm-6">
                        <img src="{{ asset('public/media/product/'.$product->image_one)}}" style="width: 80px; height: 80px;"> 
                    </div>
                </div><!-- row -->
                <button class="btn btn-sm btn-warning" type="submit">Update Photos</button>
            </form>
            </div>
        </div>


    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('select[name="category_id"]').on('change',function(){
                var category_id = $(this).val();
                if (category_id) {
                    
                    $.ajax({
                    url: "{{ url('/get/subcategory/') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) { 
                    var d =$('select[name="subcategory_id"]').empty();
                    $.each(data, function(key, value){
                    
                    $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.subcategory_name + '</option>');

                    });
                    },
                    });

                }else{
                    alert('danger');
                }

            });
        });
    </script>

    <script type="text/javascript">
        function readURL1(input){
            if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#one')
                .attr('src', e.target.result)
                .width(80)
                .height(80);
            };
            reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection
