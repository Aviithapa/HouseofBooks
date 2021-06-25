
@if(isset($model))
    {{ Form::model($model, ['url' => route('dashboard.products.update', $model->id), 'method' => 'PUT','files' => true]) }}
@else
    {{ Form::open(['url' => route('dashboard.products.store'), 'method' => 'post', 'files' => true, 'enctype'=>"multipart/form-data"]) }}
@endif


<div class="grid simple ">
    <div class="grid-body ">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('name', 'Book Name:', ['class' => 'form-label']) !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('name', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('category', ' Category:', ['class' => 'form-label']) !!}
                    {!! Form::select('category',$category->pluck('name','slug'),null, ['class' => 'form-control']) !!}
                    {!! $errors->first('name', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('sub_category', 'Sub Category:', ['class' => 'form-label']) !!}
                    {!! Form::select('sub_category', getSubCategory(),null, ['class' => 'form-control','id' => 'subCategory', "onchange" => "run()"]) !!}
                    {!! $errors->first('sub_category', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6 col-lg-6" id="nobel">
                <div class="form-group">
                    {!! Form::label('nobel_category', 'Nobel Category:', ['class' => 'form-label']) !!}
                    {!! Form::select('nobel_category',getNobelCategory(),null, ['class' => 'form-control']) !!}
                    {!! $errors->first('name', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row" id="university">
            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('university', 'University:', ['class' => 'form-label']) !!}
                    {!! Form::select('university',array('null'=>'-- Select --','TU' => 'Tribhuwan University ', 'PU' => 'Pokhara University ','PBU'=>'Purbanchal University'),null, ['class' => 'form-control']) !!}
                    {!! $errors->first('university', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('level', 'Level:', ['class' => 'form-label']) !!}
                    {!! Form::select('level', getLevelCategory(), null, ['class' => 'form-control']) !!}
                    {!! $errors->first('level', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row" id="publication">
            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('publication', 'Publication:', ['class' => 'form-label']) !!}
                    {!! Form::select('publication',getPublicationCategory(),null, ['class' => 'form-control']) !!}
                    {!! $errors->first('publication', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('faculty', 'Faculty:', ['class' => 'form-label']) !!}
                    {!! Form::select('faculty',$faculty->pluck('display_name','name'),null, ['class' => 'form-control']) !!}
                    {!! $errors->first('faculty', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row" id="semester">
            <div class="col-md-6 col-lg-6" >
                <div class="form-group">
                    {!! Form::label('semester', 'Semester:', ['class' => 'form-label']) !!}
                    {!! Form::select('semester',$semester->pluck('display_name','name'),null, ['class' => 'form-control']) !!}
                    {!! $errors->first('semester', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('edition', 'Edition:', ['class' => 'form-label']) !!}
                    {!! Form::text('edition',null, ['class' => 'form-control']) !!}
                    {!! $errors->first('edition', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('author', 'Author:', ['class' => 'form-label']) !!}
                    {!! Form::text('author',null, ['class' => 'form-control']) !!}
                    {!! $errors->first('author', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('price', 'Price:', ['class' => 'form-label']) !!}
                    {!! Form::number('price',null, ['class' => 'form-control','required']) !!}
                    {!! $errors->first('price', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('quantity', 'Quantity:', ['class' => 'form-label']) !!}
                    {!! Form::number('quantity',null, ['class' => 'form-control','required']) !!}
                    {!! $errors->first('quantity', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('discount', 'Discount:', ['class' => 'form-label']) !!}
                    {!! Form::number('discount',null, ['class' => 'form-control','required']) !!}
                    {!! $errors->first('price', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('excerpt', 'Short Description:', ['class' => 'form-label']) !!}
                    {!! Form::textarea('excerpt',null, ['class' => 'form-control ckeditor','id'=>'ckeditor']) !!}
                    {!! $errors->first('excerpt', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('description', 'Description:', ['class' => 'form-label']) !!}
                    {!! Form::textarea('description',null, ['class' => 'form-control ckeditor','id'=>'ckeditor']) !!}
                    {!! $errors->first('description', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="grid simple ">
        <div class="grid-title">
            <h4>Image</h4>
            <div class="tools">
                <a href="javascript:;" class="collapse"></a>
            </div>
        </div>

        <div class="grid-body ">
            <div class="row" >
                <div class="col-md-12 col-lg-12">
                </div>
                <div id="thumb-output"></div>
                <div class="form-group col-md-12 col-lg-12">
                    {!! Form::label('slider', 'Image:') !!}
                    <small>Size: 1600*622 px</small>
                    <input type="file" id="product_image" name="files[]" multiple>
                    <small id="slider_help_text" class="help-block"></small>
                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0"
                         aria-valuemax="100"
                         aria-valuenow="0">
                        <div id="product_image_progress" class="progress-bar progress-bar-success"
                             style="width: 0%">
                        </div>
                    </div>
                    <input type="hidden" id="product_image_path" name="product_image" class="form-control"
                           value="{{isset($model)?$model->image:''}}"/>
                    {!! $errors->first('image', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>


        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <input type="submit" value="Save" class="btn btn-primary"/>
            <a href="{{URL::previous()}}" class="btn btn-danger">Cancel</a>
        </div>
    </div>
</div>


{{ Form::close() }}


@push('scripts')
    @include('admin.partials.common.file-upload');
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'ckeditor', {
//        filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
//        filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
        } );
        $( document ).ready(function() {
            $("#nobel").hide();
            $("#best_selling").hide();
        });
        function run() {
            var sub_category=document.getElementById("subCategory").value;
            if(sub_category==="nobel"){
                $("#university").hide();
                $("#publication").hide();
                $("#semester").hide();
                $("#nobel").show();
            }else{
                $("#nobel").hide();
                $("#university").show();
                $("#publication").show();
                $("#semester").show();
            }
        }

        $(document).ready(function(){
            $('#product_image').on('change', function(){ //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                {

                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file){ //loop though each file
                        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file){ //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element
                                    $('#thumb-output').append(img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                }else{
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });

    </script>
@endpush
