@extends('admin.layout.app')

@section('content')
    @include('admin.partials.common.page-title', ['page_title' => 'Product View'])
    <style>
        .modals {
            z-index:1;
            display:none;
            padding-top:10px;
            position:fixed;
            left:0;
            top:0;
            width:100%;
            height:100%;
            overflow:auto;
            background-color:rgb(0,0,0);
            background-color:rgba(0,0,0,0.8)
        }

        .modals-content{
            margin: auto;
            display: block;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }


        .modal-hover-opacity {
            opacity:1;
            filter:alpha(opacity=100);
            -webkit-backface-visibility:hidden
        }

        .modal-hover-opacity:hover {
            opacity:0.60;
            filter:alpha(opacity=60);
            -webkit-backface-visibility:hidden
        }


        .close {
            text-decoration:none;float:right;font-size:24px;font-weight:bold;color:white
        }
        .container1 {
            width:200px;
            display:inline-block;
        }
        .modal-content, #caption {

            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
        }


        @-webkit-keyframes zoom {
            from {-webkit-transform:scale(0)}
            to {-webkit-transform:scale(1)}
        }

        @keyframes zoom {
            from {transform:scale(0)}
            to {transform:scale(1)}
        }
    </style>
    <div class="container" style="margin-top: 30px">
        <div class="row-fluid">
            <div class="span12">
                <div class="grid simple ">
                    <div class="grid-body ">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                    <?php $picture = explode(",", $product->image);
                                    for($i=0;$i<count($picture);$i++) {?>
                                    <img  src="{{ asset('/storage/product_image/'.$picture[$i]) }}"  style="width: 200px;cursor:pointer" onclick="onClick(this)" class="modal-hover-opacity"/>
                                    <?php }?>
                            </div>
                            <div id="modal01" class="modals" onclick="this.style.display='none'">
                                <span class="close">&times;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                <div class="modals-content">
                                    <img id="img01" style="max-width:100%">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                {{ Form::model($product, ['url' => route('dashboard.product.approve', $product->id), 'method' => 'PUT','files' => true]) }}
                                <input type="hidden" value="active" name="status" id="status">
                                <button type="submit" class="btn btn-success btn-lg btn-mini">
                                    <i class="fa fa-check"></i>Approve
                                </button>
                                {{ Form::close() }}
                                <br>
                                @include('admin.partials.common.delete-modal', ['data' => $product, 'name' => 'dashboard.product', 'hard_delete' => true])
                                <br>
                                <br>
                                <a href="{{ route('dashboard.products.edit', $product->id)}}"><button type="submit" class="btn btn-success btn-lg btn-mini">
                                        <i class="fa fa-eye"></i>Edit
                                    </button></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                         <h1>{{$product->name}}</h1>
                        <h3><span>Category : {{$product->category}}</span></h3>
                        <h3><span>Condition : {{$product->condition}}</span></h3>
                        <h3> <span>Sub Category :{{$product->sub_category}}</span></h3>
                        <h3><span>Status : {{$product->status}}</span><br></h3>
                        <h3><span>Nobel Category : {{$product->nobel_category}}</span><br></h3>
                        <h3><span>University : {{$product->university}}</span><br></h3>
                        <h3> <span>Publication : {{$product->publication}}</span><br></h3>
                        <h3> <span>Semester : {{$product->semester}}</span><br></h3>
                        <h3>  <span>Edition : {{$product->edition}}</span><br></h3>
                        <h3>  <span>Price : {{$product->price}}</span><br></h3>
                        <h3>  <span>Quantity : {{$product->quantity}}</span><br></h3>
                        <h3>   <span>Description : </span><br></h3>
                        <span>{!! html_entity_decode($product->description) !!}</span>
                        <h3>   <span>Short Description :</span><br></h3>
                         <span>{!! html_entity_decode($product->excerpt) !!}</span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                            <h1>User Details</h1>
                            <h3><span>{{$user->name}}</span><br></h3>
                             <h3><span>{{$user->phone_number}}</span><br></h3>
                             <h3> <span>{{$user->email}}</span><br></h3>
                             <h3><span>{{$user->address}}</span><br></h3>
                            </div>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function onClick(element) {
            document.getElementById("img01").src = element.src;
            document.getElementById("modal01").style.display = "block";
        }
    </script>

@endpush
