
    {{-- CSS assets in head section --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dropzone.css') }}">
    <script src="{{ asset('assets/js/dropzone.js') }}"></script>
    <style>
        .dropzoneDragArea {
            background-color: #fbfdff;
            border: 1px dashed #c0ccda;
            border-radius: 6px;
            padding: 60px;
            text-align: center;
            margin-bottom: 15px;
            cursor: pointer;
        }
        .dropzone{
            box-shadow: 0px 2px 20px 0px #f2f2f2;
            border-radius: 10px;
        }
    </style>

@if(isset($model))
    {{ Form::model($model, ['url' => route('dashboard.secondhand.update', $model->id), 'method' => 'PUT','files' => true]) }}
@else
    {{ Form::open(['url' => route('dashboard.secondhand.store'), "name"=>"demoform", "id"=>"demoform", 'method' => 'post', 'files' => true, 'enctype'=>"multipart/form-data", 'class' => 'dropzone']) }}
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
                    {!! Form::label('condition', ' Condition:', ['class' => 'form-label']) !!}
                    {!! Form::select('condition',getCondition(),null, ['class' => 'form-control' ,'id' => 'condition', "onchange" => "Cond()"]) !!}
                    {!! $errors->first('name', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('sub_category', 'Sub Category:', ['class' => 'form-label']) !!}
                    {!! Form::select('sub_category', getSubCategory(),null, ['class' => 'form-control','id' => 'subCategory', "onchange" => "change('sub_category')"]) !!}
                    {!! $errors->first('sub_category', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6 col-lg-6" id="nobel">
                <div class="form-group">
                    {!! Form::label('nobel_category', 'Novel Category:', ['class' => 'form-label']) !!}
                    {!! Form::select('nobel_category',getNobelCategory(),null, ['class' => 'form-control']) !!}
                    {!! $errors->first('name', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6 col-lg-6" id="level">
                <div class="form-group">
                    {!! Form::label('level', 'Level:', ['class' => 'form-label']) !!}
                    {!! Form::select('level', getLevelCategory(), null, ['class' => 'form-control','id' => 'levelCat', "onchange" => "change('level')"]) !!}
                    {!! $errors->first('level', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-6" id="university">
                <div class="form-group">
                    {!! Form::label('university', 'University:', ['class' => 'form-label']) !!}
                    {!! Form::select('university',getUniversityCategory(),null, ['class' => 'form-control']) !!}
                    {!! $errors->first('university', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
            @if ($role === "administrator")
            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('status', 'Status:', ['class' => 'form-label']) !!}
                    {!! Form::select('status', getActiveInactiveStatus(), null, ['class' => 'form-control']) !!}
                    {!! $errors->first('status', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
                @endif

        </div>
        <div class="row" id="publication">
            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('publication', 'Publication:', ['class' => 'form-label']) !!}
                    {!! Form::text('publication',null, ['class' => 'form-control']) !!}
                    {!! $errors->first('publication', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
{{--            <div class="col-md-6 col-lg-6" id="faculty">--}}
{{--                <div class="form-group">--}}
{{--                    {!! Form::label('faculty', 'Faculty:', ['class' => 'form-label']) !!}--}}
{{--                    {!! Form::select('faculty',$faculty->pluck('display_name','name'),null, ['class' => 'form-control','id' => 'fac', "onchange" => "change('faculty')"]) !!}--}}
{{--                    {!! $errors->first('faculty', '<div class="text-danger">:message</div>') !!}--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="col-md-6 col-lg-6" id="bachelorfaculty">
                <div class="form-group">
                    {!! Form::label('faculty', 'Faculty:', ['class' => 'form-label']) !!}
                    {!! Form::select('faculty',getLevelWiseFacultyCategory('bachelor'),null, ['class' => 'form-control faculty','id' => 'bachelorfac', "onchange" => "change('faculty')"]) !!}
                    {!! $errors->first('faculty', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6 col-lg-6" id="masterfaculty">
                <div class="form-group">
                    {!! Form::label('faculty', 'Faculty:', ['class' => 'form-label']) !!}
                    {!! Form::select('faculty',getLevelWiseFacultyCategory('master'),null, ['class' => 'form-control faculty','id' => 'masterfac', "onchange" => "change('faculty')"]) !!}
                    {!! $errors->first('faculty', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6 col-lg-6" id="entrancefaculty">
                <div class="form-group">
                    {!! Form::label('faculty', 'Faculty:', ['class' => 'form-label']) !!}
                    {!! Form::select('faculty',getEntranceCategory(),null, ['class' => 'form-control faculty','id' => 'entrancefac', "onchange" => "change('faculty')"]) !!}
                    {!! $errors->first('faculty', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6 col-lg-6" id="2faculty">
                <div class="form-group">
                    {!! Form::label('faculty', 'Faculty:', ['class' => 'form-label']) !!}
                    {!! Form::select('faculty',getNebCategory(),null, ['class' => 'form-control faculty','id' => '2fac']) !!}
                    {!! $errors->first('faculty', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6 col-lg-6" id="pclfaculty">
                <div class="form-group">
                    {!! Form::label('faculty', 'Faculty:', ['class' => 'form-label']) !!}
                    {!! Form::text('faculty',null, ['class' => 'form-control','id' => 'pclfac']) !!}
                    {!! $errors->first('faculty', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row" id="semester">
            <div class="col-md-6 col-lg-6" id="sem">
                <div class="form-group">
                    {!! Form::label('semester', 'Semester:', ['class' => 'form-label']) !!}
                    {!! Form::select('semester',$semester->pluck('display_name','name'),null, ['class' => 'form-control' ,'id' => 'sems']) !!}
                    {!! $errors->first('semester', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6 col-lg-6" id="year">
                <div class="form-group">
                    {!! Form::label('semester', 'Year:', ['class' => 'form-label']) !!}
                    {!! Form::select('semester',getYear(),null, ['class' => 'form-control' ,'id' => 'years']) !!}
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
                    {!! Form::label('price', 'MRP:', ['class' => 'form-label']) !!}
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

            @if ($role === "administrator")
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        {!! Form::label('discount', 'Discount:', ['class' => 'form-label']) !!}
                        {!! Form::number('discount',null, ['class' => 'form-control','required']) !!}
                        {!! $errors->first('price', '<div class="text-danger">:message</div>') !!}
                    </div>
                </div>
                @else
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        {!! Form::label('discount', 'Discount:', ['class' => 'form-label']) !!}
                        {!! Form::number('discount',null, ['class' => 'form-control',"readonly",'id'=>'discount']) !!}
                        {!! $errors->first('price', '<div class="text-danger">:message</div>') !!}
{{--                        <small>Discount percent is based on book condition. For more info please read <span style="color: #ff682c" onclick="document.getElementById('id01').style.display='block'"> terms and condition </span></small>--}}
                    </div>
                </div>
            @endif
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
        <div class="row">
            <div class="col-md-12">
                <div id="dropzoneDragArea" name="files[]" class="dz-default dz-message dropzoneDragArea">
                    <i class="fas fa-cloud-upload"></i>
                    <span>Drag and Drop <br>or<br> click here to upload image</span>
                </div>
                <div class="dropzone-previews"></div>
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

<div id="id01" class="w3-modal">
    <div class="w3-modal-content">
        <div class="w3-container">
            <div class="modal-header">
                <span class="w3-button w3-display-topright"  onclick="document.getElementById('id01').style.display='none'" >&times;</span>
                <h2 style="color: #ff682c">Terms And Condition</h2>
            </div>
            <div class="modal-body">
                {!!html_entity_decode($terms->content)!!}
            </div>
        </div>
        </div>
    </div>
</div>
</div>


@push('scripts')

    <script>
        Dropzone.autoDiscover = false;
        // Dropzone.options.demoform = false;
        let token = $('meta[name="csrf-token"]').attr('content');
        $(function() {
            var myDropzone = new Dropzone("div#dropzoneDragArea", {
                paramName: "file",
                url: "{{ url('/file-upload') }}",
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                previewsContainer: 'div.dropzone-previews',
                addRemoveLinks: true,
                autoProcessQueue: true,
                uploadMultiple: true,
                parallelUploads: 1,
                maxFiles: 3,
                params: {
                    _token: token
                },
                success: function(response)
                {
                    console.log(response);
                },
                error: function(response)
                {
                    return false;
                }
            });
            alert(myDropzone);
        });
    </script>
    <script>
        function change(type) {
            switch(type) {
                case 'sub_category':
                        var sub_category=document.getElementById("subCategory").value;
                          switch (sub_category) {
                              case 'nepali_novel':
                              case 'novel':
                                  $("#university").hide();
                                  $("#publication").hide();
                                  $("#semester").hide();
                                  $('#level').hide();
                                  $("#nobel").show();
                                  $("#entrancefaculty").hide();
                                  break;
                              case 'loksewa-examination':
                                      $("#university").hide();
                                      $("#semester").hide();
                                      $('#level').hide();
                                      $("#nobel").hide();
                                      $("#faculty").hide();
                                      $("#entrancefaculty").hide();
                                      $("#masterfaculty").hide();
                                      $("#2faculty").hide();
                                  break;
                                  case 'entrance-examination':
                                      $("#nobel").hide();
                                      $("#semester").hide();
                                      $('#2fac').attr('name', 'nothing');
                                      $("#fac").attr('name', 'nothing');
                                      $("#pclfac").attr('name', 'nothing');
                                      $("#entrancefac").attr('name', 'faculty');
                                      $("#faculty").hide();
                                      $("#2faculty").hide();
                                      $("#pclfaculty").hide();
                                      $("#entrancefaculty").show();
                                      $("#level").hide();
                                      break;
                              default:
                                  $("#nobel").hide();
                                  $("#university").show();
                                  $("#publication").show();
                                  $("#semester").show();
                                  $("#level").show();
                                  $("#faculty").show();
                                  $("#entrancefaculty").hide();
                                  break;
                          }
                    break;
               case 'faculty':
                   var levelCat = document.getElementById("levelCat").value;
                   var faculty =  document.querySelector('.faculty').value;
                   if (levelCat === "bachlor") {
                       if (faculty === "BBS") {
                           $('#years').attr('name', 'semester');
                           $("#sems").attr('name', 'nothing');
                           $("#sem").hide();
                           $("#year").show();
                       } else {
                           $('#sems').attr('name', 'semester');
                           $("#years").attr('name', 'nothing');
                           $("#year").hide();
                           $("#sem").show();
                       }
                   }else{
                       $('#sems').attr('name', 'semester');
                       $("#years").attr('name', 'nothing');
                       $("#year").hide();
                       $("#sem").show();
                   }
                   break;
               case 'level':
                       var levelCat = document.getElementById("levelCat").value;
                       if (levelCat=="+2" || levelCat=="10"){
                           $('#2fac').attr('name', 'faculty');
                           $("#pclfac").attr('name', 'nothing');
                           $("#entrancefac").attr('name', 'nothing');
                           $("#bachelorfac").attr('name', 'nothing');
                           $("#masterfac").attr('name', 'nothing');
                           $("#bachelorfaculty").hide();
                           $("#masterfaculty").hide();
                           $("#entrancefaculty").hide();
                           $("#faculty").hide();
                           $("#2faculty").show();
                           $("#pclfaculty").hide();
                           $('#years').attr('name', 'semester');
                           $("#sems").attr('name', 'nothing');
                           $("#sem").hide();
                           $("#year").show();
                       }else if (levelCat==="pcl" || levelCat==="foreign_writer") {
                           $('#2fac').attr('name', 'nothing');
                           $("#pclfac").attr('name', 'faculty');
                           $("#entrancefac").attr('name', 'nothing');
                           $("#bachelorfac").attr('name', 'nothing');
                           $("#masterfac").attr('name', 'nothing');
                           $("#bachelorfaculty").hide();
                           $("#masterfaculty").hide();
                           $("#entrancefaculty").hide();
                           $("#faculty").hide();
                           $("#2faculty").hide();
                           $("#pclfaculty").show();
                           $('#years').attr('name', 'semester');
                           $("#sems").attr('name', 'nothing');
                           $("#sem").hide();
                           $("#year").show();
                       }else if (levelCat == "bachelor"){
                           $('#2fac').attr('name', 'nothing');
                           $("#bachelorfac").attr('name', 'faculty');
                           $("#masterfac").attr('name', 'nothing');
                           $("#pclfac").attr('name', 'nothing');
                           $("#entrancefac").attr('name', 'nothing');
                           $("#entrancefaculty").hide();
                           $("#bachelorfaculty").show();
                           $("#masterfaculty").hide();
                           $("#2faculty").hide();
                           $("#pclfaculty").hide();
                           var faculty =  document.querySelector('.faculty').value;
                           if(faculty==="BBS"){
                               $('#years').attr('name', 'semester');
                               $("#sems").attr('name', 'nothing');
                               $("#sem").hide();
                               $("#year").show();
                           }else{
                               $('#sems').attr('name', 'semester');
                               $("#years").attr('name', 'nothing');
                               $("#year").hide();
                               $("#sem").show();
                           }
                       } else if (levelCat == "master"){
                           $('#2fac').attr('name', 'nothing');
                           $("#bachelorfac").attr('name', 'nothing');
                           $("#masterfac").attr('name', 'faculty');
                           $("#pclfac").attr('name', 'nothing');
                           $("#entrancefac").attr('name', 'nothing');
                           $("#entrancefaculty").hide();
                           $("#bachelorfaculty").hide();
                           $("#masterfaculty").show();
                           $("#2faculty").hide();
                           $("#pclfaculty").hide();
                           $('#sems').attr('name', 'semester');
                           $("#years").attr('name', 'nothing');
                           $("#year").hide();
                           $("#sem").show();
                       }
                       else{
                           $("#bachelorfac").attr('name', 'faculty');
                           $("#masterfac").attr('name', 'nothing');
                           $("#2fac").attr('name', 'nothing');
                           $("#pclfac").attr('name', 'nothing');
                           $("#entrancefac").attr('name', 'nothing');
                           $("#entrancefaculty").hide();
                           $("#2faculty").hide();
                           $("#faculty").show();
                           $("#pclfaculty").hide();
                           $('#sems').attr('name', 'semester');
                           $("#years").attr('name', 'nothing');
                           $("#year").hide();
                           $("#sem").show();
                       }
                   break;
            }

        }
    </script>
    <script>
        CKEDITOR.replace( 'ckeditor', {
//        filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
//        filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
        } );
        $( document ).ready(function() {
            var sub_category=document.getElementById("subCategory").value;
            switch (sub_category) {
                case 'nepali_novel':
                case 'novel':
                    $("#university").hide();
                    $("#publication").hide();
                    $("#semester").hide();
                    $('#level').hide();
                    $("#nobel").show();
                    $("#entrancefaculty").hide();
                    break;
                case 'loksewa-examination':
                    $("#university").hide();
                    $("#semester").hide();
                    $('#level').hide();
                    $("#nobel").hide();
                    $("#faculty").hide();
                    $("#entrancefaculty").hide();
                    break;
                case 'entrance-examination':
                    $("#nobel").hide();
                    $("#semester").hide();
                    $('#2fac').attr('name', 'nothing');
                    $("#bachelorfac").attr('name', 'nothing');
                    $("#pclfac").attr('name', 'nothing');
                    $("#masterfac").attr('name', 'nothing');
                    $("#entrancefac").attr('name', 'faculty');
                    $("#masterfaculty").hide();
                    $("#faculty").hide();
                    $("#2faculty").hide();
                    $("#pclfaculty").hide();
                    $("#entrancefaculty").show();
                    $("#level").hide();
                    break;
                case 'coursebook':
                        $("#nobel").hide();
                    var levelCat = document.getElementById("levelCat").value;
                    if (levelCat=="+2" || levelCat=="10"){
                        $('#2fac').attr('name', 'faculty');
                        $("#pclfac").attr('name', 'nothing');
                        $("#entrancefac").attr('name', 'nothing');
                        $("#bachelorfac").attr('name', 'nothing');
                        $("#masterfac").attr('name', 'nothing');
                        $("#bachelorfaculty").hide();
                        $("#masterfaculty").hide();
                        $("#entrancefaculty").hide();
                        $("#faculty").hide();
                        $("#2faculty").show();
                        $("#pclfaculty").hide();
                        $('#years').attr('name', 'semester');
                        $("#sems").attr('name', 'nothing');
                        $("#sem").hide();
                        $("#year").show();
                    }else if (levelCat==="pcl" || levelCat==="foreign_writer") {
                        $('#2fac').attr('name', 'nothing');
                        $("#pclfac").attr('name', 'faculty');
                        $("#entrancefac").attr('name', 'nothing');
                        $("#bachelorfac").attr('name', 'nothing');
                        $("#masterfac").attr('name', 'nothing');
                        $("#bachelorfaculty").hide();
                        $("#masterfaculty").hide();
                        $("#entrancefaculty").hide();
                        $("#faculty").hide();
                        $("#2faculty").hide();
                        $("#pclfaculty").show();
                        $('#years').attr('name', 'semester');
                        $("#sems").attr('name', 'nothing');
                        $("#sem").hide();
                        $("#year").show();
                    }else if (levelCat == "bachelor"){
                        $('#2fac').attr('name', 'nothing');
                        $("#bachelorfac").attr('name', 'faculty');
                        $("#masterfac").attr('name', 'nothing');
                        $("#pclfac").attr('name', 'nothing');
                        $("#entrancefac").attr('name', 'nothing');
                        $("#entrancefaculty").hide();
                        $("#bachelorfaculty").show();
                        $("#masterfaculty").hide();
                        $("#2faculty").hide();
                        $("#pclfaculty").hide();

                    } else if (levelCat == "master"){
                        $('#2fac').attr('name', 'nothing');
                        $("#bachelorfac").attr('name', 'nothing');
                        $("#masterfac").attr('name', 'faculty');
                        $("#pclfac").attr('name', 'nothing');
                        $("#entrancefac").attr('name', 'nothing');
                        $("#entrancefaculty").hide();
                        $("#bachelorfaculty").hide();
                        $("#masterfaculty").show();
                        $("#2faculty").hide();
                        $("#pclfaculty").hide();
                    }
                    else{
                        $("#bachelorfac").attr('name', 'faculty');
                        $("#masterfac").attr('name', 'nothing');
                        $("#2fac").attr('name', 'nothing');
                        $("#pclfac").attr('name', 'nothing');
                        $("#entrancefac").attr('name', 'nothing');
                        $("#entrancefaculty").hide();
                        $("#2faculty").hide();
                        $("#faculty").show();
                        $("#pclfaculty").hide();
                        $('#sems').attr('name', 'semester');
                        $("#years").attr('name', 'nothing');
                        $("#year").hide();
                        $("#sem").show();
                    }
                        break;
                default:
                    $("#nobel").hide();
                    $("#university").show();
                    $("#publication").show();
                    $("#semester").show();
                    $("#level").show();
                    $("#faculty").show();
                    $("#entrancefaculty").hide();
                    break;
            };

        });
        $(document).ready(function () {
            var condition=document.getElementById("condition").value;
            var discount=document.getElementById("discount");
            if(condition==="brand_new"){
                discount.value="40"
            }else if(condition==="near_fine"){
                discount.value="50"
            }
            else if(condition==="average"){
                discount.value="60"
            }
            else if(condition==="poor"){
                discount.value="70"
            }

        });
        function Cond() {
            var condition=document.getElementById("condition").value;
            var discount=document.getElementById("discount");
            if(condition==="brand_new"){
              discount.value="40"
            }else if(condition==="near_fine"){
                discount.value="50"
            }
            else if(condition==="average"){
                discount.value="60"
            }
            else if(condition==="poor"){
                discount.value="70"
            }
        }
        // $(document).ready(function(){
        //     var fileIdCounterOnload = 0;
        //     var filesToUpload = [];
        //     var fileIdCounter = 0;
        //     $('#product_image').on('change', function(evt){ //on file input change
        //         if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        //         {
        //             for (var i = 0; i < evt.target.files.length; i++) {
        //                 fileIdCounter++;
        //
        //                 var file = evt.target.files[i];
        //                 var fileId = "file" + fileIdCounter;
        //
        //                 filesToUpload.push({
        //                     id: fileId,
        //                     file: file
        //                 });
        //             }
        //             var data = $(this)[0].files; //this file data
        //
        //             $.each(data, function (index, file) { //loop though each file
        //                 if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
        //                     var fRead = new FileReader(); //new filereader
        //                     fRead.onload = (function (file) { //trigger function on successful read
        //                         return function (e) {
        //                             fileIdCounterOnload++;
        //
        //                             var fileIdOnload = "file" + fileIdCounterOnload;
        //                             var img = $("<li class=\"pip\"  data-fileid=\"" + fileIdOnload + "\">" +
        //                                 "<img class=\'thumb\' src=\"" + e.target.result + "\">" +
        //                                 "<i class=\"fa fa-times-circle fa-2x remove removeFile\"  data-fileid=\"" + fileIdOnload + "\"></i> " +
        //                                 "</li>");
        //
        //                             $('#thumb-output').append(img) //append image to output element
        //                             $(".remove").click(function () {
        //
        //                                 var fileId = $(this).parent(".pip").data("fileid");
        //
        //                                 // loop through the files array and check if the name of that file matches FileName
        //                                 // and get the index of the match
        //                                 for (var i = 0; i < filesToUpload.length; ++i) {//here will start compare them
        //                                     if (filesToUpload[i].id === fileId) {
        //                                         filesToUpload.splice(i, 1);// delete a file from list.
        //                                     }
        //                                 }
        //                                 $(this).parent(".pip").remove();// remove file from view .
        //                             });
        //
        //                         };
        //
        //                     })(file);
        //                     fRead.readAsDataURL(file); //URL representing the file's data.
        //                 }
        //             });
        //         }else{
        //             alert("Your browser doesn't support File API!"); //if File API is absent
        //         }
        //
        //     });
        // });

    </script>
    <script>
        $(document).ready(function () {
            var dropIndex;
            $("#thumb-output").sortable({
                update: function(event, ui) {
                    dropIndex = ui.item.index();
                }
            });
        });
    </script>

    <script>
        window.onclick = function(event) {
            if (event.target == id01) {
                id01.style.display = "none";
            }
        }
    </script>
@endpush
