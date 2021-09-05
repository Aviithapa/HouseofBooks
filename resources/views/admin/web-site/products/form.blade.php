
@if(isset($model))
    {{ Form::model($model, ['url' => route('dashboard.products.update', $model->id), 'method' => 'PUT','files' => true]) }}
@else
    {{ Form::open(['url' => route('dashboard.products.store'), 'method' => 'post', 'files' => true, 'enctype'=>"multipart/form-data"]) }}
@endif
<style>
    /* The Modal (background) */
    .w3-modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width : 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .w3-modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    /* The Close Button */
    .w3-button {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .w3-button:hover,
    .w3-button:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }
    span:hover{
        cursor: pointer;
    }

    .modal-header {
        padding: 2px 16px;
    }

    .modal-body {padding: 2px 16px;}

    .modal-footer {
        padding: 2px 16px;
    }

    /* Add Animation */
    @-webkit-keyframes slideIn {
        from {bottom: -300px; opacity: 0}
        to {bottom: 0; opacity: 1}
    }

    @keyframes slideIn {
        from {bottom: -300px; opacity: 0}
        to {bottom: 0; opacity: 1}
    }

    @-webkit-keyframes fadeIn {
        from {opacity: 0}
        to {opacity: 1}
    }

    @keyframes fadeIn {
        from {opacity: 0}
        to {opacity: 1}
    }
    .pip {
        display: inline-block;
        position: relative;
    }
    .remove {
        position: absolute;
        top: 0;
        color: red;
    }
</style>

<link rel="stylesheet" href="https://vendor/jquery/jquery-ui/jquery-ui.css">
<div class="grid simple ">
    <div class="grid-body">
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
        <div class="row" id="faculty">
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
            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('university', 'University:', ['class' => 'form-label']) !!}
                    {!! Form::select('university',getUniversityCategory(),null, ['class' => 'form-control']) !!}
                    {!! $errors->first('university', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row" id="publication">
            <div class="col-md-6 col-lg-6" id="sem">
                <div class="form-group">
                    {!! Form::label('semester', 'Semester:', ['class' => 'form-label']) !!}
                    {!! Form::select('semesters',$semester->pluck('display_name','name'),null, ['class' => 'form-control','id' => 'sems']) !!}
                    {!! $errors->first('semester', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6 col-lg-6" id="year">
                <div class="form-group">
                    {!! Form::label('semester', 'Year:', ['class' => 'form-label']) !!}
                    {!! Form::select('year',getYear(),null, ['class' => 'form-control','id' => 'years']) !!}
                    {!! $errors->first('semester', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    {!! Form::label('publication', 'Publication:', ['class' => 'form-label']) !!}
                    {!! Form::text('publication',null, ['class' => 'form-control']) !!}
                    {!! $errors->first('publication', '<div class="text-danger">:message</div>') !!}
                </div>
            </div>

        </div>
        <div class="row">
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
                            <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        {!! Form::label('discount', 'Discount:', ['class' => 'form-label']) !!}
                        {!! Form::number('discount',null, ['class' => 'form-control',"readonly",'id'=>'discount']) !!}
                        {!! $errors->first('price', '<div class="text-danger">:message</div>') !!}
{{--                        <small>Discount percent is based on book condition. For more info please read <span style="color: #ff682c" onclick="document.getElementById('id01').style.display='block'"> terms and condition </span></small>--}}
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
            <h4>Upload Multiple Image</h4>
            <h4>At least 3 Image Required</h4>
            <div class="tools">
                <a href="javascript:;" class="collapse"></a>
            </div>
        </div>

        <div class="grid-body ">
            <div class="row" >
                <div class="col-md-12 col-lg-12">
                </div>
                <div id="thumb-output">

                    @if(isset($model))
                               <?php $picture = explode(",", $model->image);
                                 for($i=0;$i<count($picture);$i++) {?>
                                   <img src="{{ asset('/storage/product_image/'.$picture[$i]) }}" style="height:120px; width:200px"/>
                                 <?php }?>

                    @endif

                </div>
                <div class="form-group col-md-12 col-lg-12">
                    {!! Form::label('slider', 'Image:') !!}
                    <small>Size: 1600*622 px</small><br>
                    <strong>Image Order: Front Page, Back Page , Edition Page</strong><br>
                    <small class="danger">By uploading your books you  agree with our <span style="color: #ff682c" onclick="document.getElementById('id01').style.display='block'">terms and condition</span></small>
                    <input type="file" id="product_image" name="files[]" multiple>
                    <small id="slider_help_text" class="help-block"></small>
                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0"
                         aria-valuemax="100"
                         aria-valuenow="0">
                        <div id="product_image_progress" class="progress-bar progress-bar-success"
                             style="width: 0%">
                        </div>
                    </div>

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
    @include('admin.partials.common.file-upload');
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script src="https://vendor/jquery/jquery-3.2.1.min.js"></script>


    <script src="https://vendor/jquery/jquery-ui/jquery-ui.js" type="text/javascript"></script>

    <script>
        function change(type) {
           switch (type) {
               case 'sub_category':
                   var sub_category=document.getElementById("subCategory").value;
                   switch (sub_category) {
                       case 'nepali_novel':
                       case 'novel':
                           $("#faculty").hide();
                           $("#level").hide();
                           $("#publication").hide();
                           $("#sem").hide();
                           $("#year").hide();
                           $("#nobel").show();
                           break;
                           case 'coursebook':
                           case 'question-bank-and-solution':
                           case 'medical-examination':
                               $("#faculty").show();
                               $("#level").show();
                               $("#publication").show();
                               $("#university").show();
                               var level=document.getElementById("levelCat").value;
                                 switch (level) {
                                     case 'bachelor':
                                         $("#faculty").show();
                                         $('#2fac').attr('name', 'nothing');
                                         $("#bachelorfac").attr('name', 'faculty');
                                         $("#pclfac").attr('name', 'nothing');
                                         $("#masterfac").attr('name', 'nothing');
                                         $("#entrancefac").attr('name', 'nothing');
                                         $("#masterfaculty").hide();
                                         $("#2faculty").hide();
                                         $("#pclfaculty").hide();
                                         $("#entrancefaculty").hide();
                                         $("#bachelorfaculty").show();
                                         $("#sem").show();
                                         $("#year").hide();
                                         break;
                                         case 'master':
                                             $("#faculty").show();
                                             $('#2fac').attr('name', 'nothing');
                                             $("#bachelorfac").attr('name', 'nothing');
                                             $("#pclfac").attr('name', 'nothing');
                                             $("#masterfac").attr('name', 'faculty');
                                             $("#entrancefac").attr('name', 'nothing');
                                             $("#masterfaculty").show();
                                             $("#2faculty").hide();
                                             $("#pclfaculty").hide();
                                             $("#entrancefaculty").hide();
                                             $("#bachelorfaculty").hide();
                                             $("#sem").show();
                                             $("#year").hide();
                                             break;
                                             case '+2':
                                                 $("#faculty").show();
                                                 $('#2fac').attr('name', 'faculty');
                                                 $("#bachelorfac").attr('name', 'nothing');
                                                 $("#pclfac").attr('name', 'nothing');
                                                 $("#masterfac").attr('name', 'nothing');
                                                 $("#entrancefac").attr('name', 'nothing');
                                                 $("#masterfaculty").hide();
                                                 $("#2faculty").show();
                                                 $("#pclfaculty").hide();
                                                 $("#entrancefaculty").hide();
                                                 $("#bachelorfaculty").hide();
                                                 $("#sem").hide();
                                                 $("#year").show();
                                                 break;

                                                 case 'pcl':
                                                     $("#faculty").show();
                                                     $('#2fac').attr('name', 'nothing');
                                                     $("#pclfac").attr('name', 'faculty');
                                                     $("#entrancefac").attr('name', 'nothing');
                                                     $("#bachelorfac").attr('name', 'nothing');
                                                     $("#masterfac").attr('name', 'nothing');
                                                     $("#bachelorfaculty").hide();
                                                     $("#masterfaculty").hide();
                                                     $("#entrancefaculty").hide();
                                                     $("#2faculty").hide();
                                                     $("#pclfaculty").show();
                                                     $('#years').attr('name', 'semester');
                                                     $("#sems").attr('name', 'nothing');
                                                     $("#sem").hide();
                                                     $("#year").show();
                                                     break;
                                 }
                               break;
                       case 'loksewa-examination':
                           $("#other_books").show();
                           $("#nobel").hide();
                           $("#university").hide();
                           $("#semester").hide();
                           $('#level').hide();
                           $("#best_selling").hide();
                           $("#faculty").hide();
                           $("#entrancefaculty").hide();
                           $("#masterfaculty").hide();
                           $("#bachelorfaculty").hide();
                           $("#2faculty").hide();
                           $("#sem").hide();
                           $("#year").hide();
                           break;

                           case 'entrance-examination':
                               $("#university").show();
                               $("#other_books").show();
                               $("#nobel").hide();
                               $("#best_selling").hide();
                               $("#semester").hide();
                               $('#2fac').attr('name', 'nothing');
                               $("#bachelorfac").attr('name', 'nothing');
                               $("#pclfac").attr('name', 'nothing');
                               $("#entrancefac").attr('name', 'faculty');
                               $("#faculty").show();
                               $("#2faculty").hide();
                               $("#pclfaculty").hide();
                               $("#bachelorfaculty").hide();
                               $("#masterfaculty").hide();
                               $("#sem").hide();
                               $("#year").hide();
                               $("#entrancefaculty").show();
                               $("#level").hide();
                               break;
                   }
                   break;
               case 'level':
                   var level=document.getElementById("levelCat").value;
                   switch (level) {
                       case 'bachelor':
                           $("#faculty").show();
                           $('#2fac').attr('name', 'nothing');
                           $("#bachelorfac").attr('name', 'faculty');
                           $("#pclfac").attr('name', 'nothing');
                           $("#masterfac").attr('name', 'nothing');
                           $("#entrancefac").attr('name', 'nothing');
                           $("#masterfaculty").hide();
                           $("#2faculty").hide();
                           $("#pclfaculty").hide();
                           $("#entrancefaculty").hide();
                           $("#bachelorfaculty").show();
                           $("#sem").show();
                           $("#year").hide();
                           break;
                       case 'master':
                           $("#faculty").show();
                           $('#2fac').attr('name', 'nothing');
                           $("#bachelorfac").attr('name', 'nothing');
                           $("#pclfac").attr('name', 'nothing');
                           $("#masterfac").attr('name', 'faculty');
                           $("#entrancefac").attr('name', 'nothing');
                           $("#masterfaculty").show();
                           $("#2faculty").hide();
                           $("#pclfaculty").hide();
                           $("#entrancefaculty").hide();
                           $("#bachelorfaculty").hide();
                           $("#sem").show();
                           $("#year").hide();
                           break;
                       case '+2':
                           $("#faculty").show();
                           $('#2fac').attr('name', 'faculty');
                           $("#bachelorfac").attr('name', 'nothing');
                           $("#pclfac").attr('name', 'nothing');
                           $("#masterfac").attr('name', 'nothing');
                           $("#entrancefac").attr('name', 'nothing');
                           $("#masterfaculty").hide();
                           $("#2faculty").show();
                           $("#pclfaculty").hide();
                           $("#entrancefaculty").hide();
                           $("#bachelorfaculty").hide();
                           $("#sem").hide();
                           $("#year").show();
                           break;

                       case 'pcl':
                           $("#faculty").show();
                           $('#2fac').attr('name', 'nothing');
                           $("#pclfac").attr('name', 'faculty');
                           $("#entrancefac").attr('name', 'nothing');
                           $("#bachelorfac").attr('name', 'nothing');
                           $("#masterfac").attr('name', 'nothing');
                           $("#bachelorfaculty").hide();
                           $("#masterfaculty").hide();
                           $("#entrancefaculty").hide();
                           $("#2faculty").hide();
                           $("#pclfaculty").show();
                           $('#years').attr('name', 'semester');
                           $("#sems").attr('name', 'nothing');
                           $("#sem").hide();
                           $("#year").show();
                           break;
                   }
                   break;
                   case 'faculty':
                        var fac = document.getElementById("bachelorfac").value;
                        if (fac === "BBS"){
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
                       break

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
                            $("#faculty").hide();
                            $("#level").hide();
                            $("#publication").hide();
                            $("#sem").hide();
                            $("#year").hide();
                            $("#nobel").show();
                            break;
                        case 'coursebook':
                        case 'question-bank-and-solution':
                        case 'medical-examination':
                            $("#nobel").hide();
                            $("#faculty").show();
                            $("#level").show();
                            $("#publication").show();
                            $("#university").show();
                            var level = document.getElementById("levelCat").value;
                            switch (level) {
                                case 'bachelor':
                                    $("#faculty").show();
                                    $('#2fac').attr('name', 'nothing');
                                    $("#bachelorfac").attr('name', 'faculty');
                                    $("#pclfac").attr('name', 'nothing');
                                    $("#masterfac").attr('name', 'nothing');
                                    $("#entrancefac").attr('name', 'nothing');
                                    $("#masterfaculty").hide();
                                    $("#2faculty").hide();
                                    $("#pclfaculty").hide();
                                    $("#entrancefaculty").hide();
                                    $("#bachelorfaculty").show();
                                    $("#sem").show();
                                    $("#year").hide();
                                    break;
                                case 'master':
                                    $("#faculty").show();
                                    $('#2fac').attr('name', 'nothing');
                                    $("#bachelorfac").attr('name', 'nothing');
                                    $("#pclfac").attr('name', 'nothing');
                                    $("#masterfac").attr('name', 'faculty');
                                    $("#entrancefac").attr('name', 'nothing');
                                    $("#masterfaculty").show();
                                    $("#2faculty").hide();
                                    $("#pclfaculty").hide();
                                    $("#entrancefaculty").hide();
                                    $("#bachelorfaculty").hide();
                                    $("#sem").show();
                                    $("#year").hide();
                                    break;
                                case '+2':
                                    $("#faculty").show();
                                    $('#2fac').attr('name', 'faculty');
                                    $("#bachelorfac").attr('name', 'nothing');
                                    $("#pclfac").attr('name', 'nothing');
                                    $("#masterfac").attr('name', 'nothing');
                                    $("#entrancefac").attr('name', 'nothing');
                                    $("#masterfaculty").hide();
                                    $("#2faculty").show();
                                    $("#pclfaculty").hide();
                                    $("#entrancefaculty").hide();
                                    $("#bachelorfaculty").hide();
                                    $("#sem").hide();
                                    $("#year").show();
                                    break;

                                case 'pcl':
                                    $("#faculty").show();
                                    $('#2fac').attr('name', 'nothing');
                                    $("#pclfac").attr('name', 'faculty');
                                    $("#entrancefac").attr('name', 'nothing');
                                    $("#bachelorfac").attr('name', 'nothing');
                                    $("#masterfac").attr('name', 'nothing');
                                    $("#bachelorfaculty").hide();
                                    $("#masterfaculty").hide();
                                    $("#entrancefaculty").hide();
                                    $("#2faculty").hide();
                                    $("#pclfaculty").show();
                                    $('#years').attr('name', 'semester');
                                    $("#sems").attr('name', 'nothing');
                                    $("#sem").hide();
                                    $("#year").show();
                                    break;

                                default:
                                    $("#faculty").show();
                                    $('#2fac').attr('name', 'nothing');
                                    $("#bachelorfac").attr('name', 'faculty');
                                    $("#pclfac").attr('name', 'nothing');
                                    $("#masterfac").attr('name', 'nothing');
                                    $("#entrancefac").attr('name', 'nothing');
                                    $("#masterfaculty").hide();
                                    $("#2faculty").hide();
                                    $("#pclfaculty").hide();
                                    $("#entrancefaculty").hide();
                                    $("#bachelorfaculty").show();
                                    $("#sem").show();
                                    $("#year").hide();
                                    break;
                            }
                            break;
                        case 'loksewa-examination':
                            $("#other_books").show();
                            $("#nobel").hide();
                            $("#university").hide();
                            $("#semester").hide();
                            $('#level').hide();
                            $("#best_selling").hide();
                            $("#faculty").hide();
                            $("#entrancefaculty").hide();
                            $("#masterfaculty").hide();
                            $("#bachelorfaculty").hide();
                            $("#2faculty").hide();
                            $("#sem").hide();
                            $("#year").hide();
                            break;
                        case 'entrance-examination':
                            $("#other_books").show();
                            $("#nobel").hide();
                            $("#best_selling").hide();
                            $("#semester").hide();
                            $('#2fac').attr('name', 'nothing');
                            $("#bachelorfac").attr('name', 'nothing');
                            $("#pclfac").attr('name', 'nothing');
                            $("#entrancefac").attr('name', 'faculty');
                            $("#faculty").show();
                            $("#2faculty").hide();
                            $("#pclfaculty").hide();
                            $("#bachelorfaculty").hide();
                            $("#masterfaculty").hide();
                            $("#sem").hide();
                            $("#year").hide();
                            $("#entrancefaculty").show();
                            $("#level").hide();
                            $("#university").show();
                            break;
                    }
                    var level=document.getElementById("levelCat").value;
                    switch (level) {
                        case 'bachelor':
                            $("#faculty").show();
                            $('#2fac').attr('name', 'nothing');
                            $("#bachelorfac").attr('name', 'faculty');
                            $("#pclfac").attr('name', 'nothing');
                            $("#masterfac").attr('name', 'nothing');
                            $("#entrancefac").attr('name', 'nothing');
                            $("#masterfaculty").hide();
                            $("#2faculty").hide();
                            $("#pclfaculty").hide();
                            $("#entrancefaculty").hide();
                            $("#bachelorfaculty").show();
                            $("#sem").show();
                            $("#year").hide();
                            break;
                        case 'master':
                            $("#faculty").show();
                            $('#2fac').attr('name', 'nothing');
                            $("#bachelorfac").attr('name', 'nothing');
                            $("#pclfac").attr('name', 'nothing');
                            $("#masterfac").attr('name', 'faculty');
                            $("#entrancefac").attr('name', 'nothing');
                            $("#masterfaculty").show();
                            $("#2faculty").hide();
                            $("#pclfaculty").hide();
                            $("#entrancefaculty").hide();
                            $("#bachelorfaculty").hide();
                            $("#sem").show();
                            $("#year").hide();
                            break;
                        case '+2':
                            $("#faculty").show();
                            $('#2fac').attr('name', 'faculty');
                            $("#bachelorfac").attr('name', 'nothing');
                            $("#pclfac").attr('name', 'nothing');
                            $("#masterfac").attr('name', 'nothing');
                            $("#entrancefac").attr('name', 'nothing');
                            $("#masterfaculty").hide();
                            $("#2faculty").show();
                            $("#pclfaculty").hide();
                            $("#entrancefaculty").hide();
                            $("#bachelorfaculty").hide();
                            $("#sem").hide();
                            $("#year").show();
                            break;

                        case 'pcl':
                            $("#faculty").show();
                            $('#2fac').attr('name', 'nothing');
                            $("#pclfac").attr('name', 'faculty');
                            $("#entrancefac").attr('name', 'nothing');
                            $("#bachelorfac").attr('name', 'nothing');
                            $("#masterfac").attr('name', 'nothing');
                            $("#bachelorfaculty").hide();
                            $("#masterfaculty").hide();
                            $("#entrancefaculty").hide();
                            $("#2faculty").hide();
                            $("#pclfaculty").show();
                            $('#years').attr('name', 'semester');
                            $("#sems").attr('name', 'nothing');
                            $("#sem").hide();
                            $("#year").show();
                            break;
                    }



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

            var fac = document.getElementById("bachelorfac").value;
            if (fac === "BBS"){
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
        $(document).ready(function(){
            var fileIdCounterOnload = 0;
            var filesToUpload = [];
            var fileIdCounter = 0;
            $('#product_image').on('change', function(evt){ //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                {
                    for (var i = 0; i < evt.target.files.length; i++) {
                        fileIdCounter++;
                        var file = evt.target.files[i];
                        var fileId = "file" + fileIdCounter;

                        filesToUpload.push({
                            id: fileId,
                            file: file
                        });
                        console.log(filesToUpload)
                    }
                    var data = $(this)[0].files; //this file data
                    console.log(data)

                    $.each(data, function (index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type


                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function (file) { //trigger function on successful read
                                return function (e) {
                                    fileIdCounterOnload++;

                                    var fileIdOnload = "file" + fileIdCounterOnload;
                                    var img = $("<li class=\"pip\"  data-fileid=\"" + fileIdOnload + "\">" +
                                        "<img class=\'thumb\' src=\"" + e.target.result + "\">" +
                                        "<i class=\"fa fa-times-circle fa-2x remove removeFile\"  data-fileid=\"" + fileIdOnload + "\"></i> " +
                                        "</li>");

                                    $('#thumb-output').append(img) //append image to output element
                                    $(".remove").click(function () {

                                        var fileId = $(this).parent(".pip").data("fileid");

                                        // loop through the files array and check if the name of that file matches FileName
                                        // and get the index of the match
                                        for (var i = 0; i < filesToUpload.length; ++i) {//here will start compare them
                                            if (filesToUpload[i].id === fileId) {
                                                filesToUpload.splice(i, 1);// delete a file from list.
                                            }
                                        }
                                        $(this).parent(".pip").remove();// remove file from view .
                                    });

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

    <script type="text/javascript">
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone(".dropzone",{
            maxFilesize: 3,  // 3 mb
            acceptedFiles: ".jpeg,.jpg,.png,.pdf",
        });
        myDropzone.on("sending", function(file, xhr, formData) {
            formData.append("_token", CSRF_TOKEN);
        });
    </script>
@endpush
