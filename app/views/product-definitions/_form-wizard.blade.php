<!-- Created by UserId -->
{{Form::hidden('user_id', $user->id)}}
<!-- Currency hard-coded to AED -->
{{Form::hidden('currency', 'AED')}}
<!-- Attributes: //Todo: add to form as input -->
{{Form::hidden('attributes', '') }}



	<div class="steps-progress">
		<div class="progress-indicator"></div>
	</div>

	<ul>
		<li class="active">
			<a href="#tab2-1" data-toggle="tab"><span>1</span>Basic Info</a>
		</li>
		<li>
			<a href="#tab2-2" data-toggle="tab"><span>2</span>Description</a>
		</li>
		<li>
			<a href="#tab2-3" data-toggle="tab"><span>3</span>Product Photos</a>
		</li>
		<li>
			<a href="#tab2-4" data-toggle="tab"><span>4</span>File Attachments</a>
		</li>
		<li>
			<a href="#tab2-5" data-toggle="tab"><span>5</span>Attributes</a>
		</li>
		<li>
			<a href="#tab2-6" data-toggle="tab"><span>6</span>Assign</a>
		</li>
	</ul>

	<div class="tab-content">
		<div class="tab-pane active" id="tab2-1">

		<div class="row">
            <h3>Basic Product Information</h3>
            <br />
            <br />
        </div>

        <div class="well">
            <div class="row">
                @if($internalUser)
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="full_name">Customer</label>
                            {{ Form::select('company_id', $companies, null, ['class'=>'form-control', 'id'=>'company_id', 'data-validate' => 'required']) }}
                        </div>
                    </div>
                @else
                    <!-- Owned by CompanyID -->
                    {{Form::hidden('company_id', $user->company->id, ['id' => 'company_id'])}}
                @endif

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="supplier_id">Supplier</label>
                        {{ Form::select('supplier_id', $suppliers, null, ['class'=>'form-control', 'id'=>'supplier_id', 'data-validate' => 'required']) }}
                    </div>
                </div>

            </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="code">Code</label>
                            {{ Form::text('code', null, ['class' => 'form-control step1', 'id' => 'code', 'data-validate' => 'required', 'placeholder' => 'Item Code, Product Code, or SKU']) }}
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="control-label" for="name">Name</label>
                            {{ Form::text('name', null, ['class' => 'form-control','id' => 'name', 'data-validate' => 'required', 'placeholder' => 'Name as it shall be cataloged in the portal']) }}
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="category">Category</label>
                            {{ Form::text('category', null, ['class'=>'form-control','id'=>'category','data-validate'=>'required','placeholder'=>'Category that this product should be classified in']) }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="uom">UOM</label>
                            {{ Form::text('uom', null, ['class'=>'form-control','id'=>'uom','data-validate'=>'required','placeholder'=>'e.g. Each, Pack, Carton']) }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">Price</label>

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span>AED</span>
                                </div>
                                {{ Form::text('price', null, ['class'=>'form-control','id'=>'price','data-validate'=>'required,number']) }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>

		</div>

		<div class="tab-pane" id="tab2-2">

            <div class="row">
                <h3>Product Desctiption <small>as it will appear in the portal</small></h3>
                <br />
                <br />
            </div>

            <div class="well">

                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label" for="street">Description - <strong>*Required</strong></label>
                            <textarea class="form-control ckeditor" data-stylesheet-url="{{ URL::asset('css/wysihtml5-color.css') }} " name="description" id="description" data-validate="minlength[10]">{{{ Input::old('description') ? Input::old('description') : '' }}}</textarea>

                        </div>
                    </div>

                </div>
                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label" for="street">Short Description</label>
                            <textarea class="form-control" name="short_description" id="short_description" data-validate="required" rows="5" placeholder="Short summary of the product">{{{ Input::old('short_description') ? Input::old('short_description') : '' }}}</textarea>
                        </div>
                    </div>

                </div>

            </div>


		</div>

		<div class="tab-pane" id="tab2-3">

            <div class="row">
                <h3>Product Photos <small>512Kb max file size per photo</small></h3>
                <br />
                <br />
            </div>

            <div class="well">

                <div class="row">

                    <!-- Add new Images -->
                    {{ Form::label('images', 'Main:', ['class' => 'col-sm-1 control-label']) }}
                    <div id="image-div0" class="form-group col-md-3">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 150px; height: 150px;" data-trigger="fileinput">
                                <img src="http://placehold.it/150&text=Product+photo" alt="...">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                            <div>
                                <span class="btn btn-info btn-file">
                                    <span class="fileinput-new">Select image</span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" name="images[]" accept="image/*" data-validate="required">
                                </span>
                                <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>
                    </div>

                    {{ Form::label('images', 'Secondary:', ['class' => 'col-sm-1 control-label']) }}
                    <div id="image-div1" class="form-group col-md-3">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 150px; height: 150px;" data-trigger="fileinput">
                                <img src="http://placehold.it/150&text=Product+photo" alt="...">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                            <div>
                                <span class="btn btn-info btn-file">
                                    <span class="fileinput-new">Select image</span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" name="images[]" accept="image/*">
                                </span>
                                <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">

                    {{ Form::label('images', 'Front:', ['class' => 'col-sm-1 control-label']) }}
                    <div id="image-div2" class="form-group col-md-3">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 150px; height: 150px;" data-trigger="fileinput">
                                <img src="http://placehold.it/150&text=Product+photo" alt="...">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                            <div>
                                <span class="btn btn-info btn-file">
                                    <span class="fileinput-new">Select image</span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" name="images[]" accept="image/*">
                                </span>
                                <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>
                    </div>


                    {{ Form::label('images', 'Back:', ['class' => 'col-sm-1 control-label']) }}
                    <div id="image-div3" class="form-group col-md-3">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 150px; height: 150px;" data-trigger="fileinput">
                                <img src="http://placehold.it/150&text=Product+photo" alt="...">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                            <div>
                                <span class="btn btn-info btn-file">
                                    <span class="fileinput-new">Select image</span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" name="images[]" accept="image/*">
                                </span>
                                <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

		</div>

		<div class="tab-pane" id="tab2-4">

			<div class="row">
                <h3>File Attachments <small>2MB max file size per attachment</small></h3>
                <br />
                <br />
            </div>
            <div class="well">
                <div id="attachment-div" class="row">
                    <div class="row">
                        <div  class="form-group">
                            <div class="col-md-6 col-md-offset-1">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <span class="btn btn-info btn-file">
                                        <span class="fileinput-new">Select files</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="attachments[]" />
                                    </span>
                                    <span class="fileinput-filename"></span>
                                    <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div id="dynamicAttachmentInput">
                    </div>

                </div>
            </div>

            <div class="row">

                <div class="form-group">
                    <div class="col-md-3">
                        <input id="add-image-input" type="button" class="btn btn-success" value="+ File" onClick="addAttachmentInput('dynamicAttachmentInput');">
                    </div>
                </div>

            </div>

		</div>

		<div class="tab-pane" id="tab2-5">

			<div class="row">
                <h3>Product Attributes</h3>
                <br />
                <br />
            </div>
			<div class="row">

                <p>To be impletmenetd</p>


			</div>

		</div>

		<div class="tab-pane" id="tab2-6">

			<div class="row">
                <h3>Assign</h3>
                <br />
                <br />
            </div>
			<div class="row">

                <!-- Assigned To -->
                <div class="form-group">
                    {{ Form::label('assigned_user_id', 'Assigned To:', ['class' =>'col-sm-3 control-label']) }}
                    <div class="col-sm-5">
                        {{--<select id="assigned_user_id" name="assigned_user_id" class="form-control">--}}

                        {{--</select>--}}

                        <select class="form-control" id="assigned_user_id" name="assigned_user_id">
                          @foreach($assignableUsersList as $index => $company)
                              {
                                <optgroup label="{{$index}}">
                                    @foreach($company as $id => $name)
                                            <option value="{{$id}}">{{$name}}</option>
                                    @endforeach
                                </optgroup>
                              }
                          @endforeach
                        </select>



                {{--        {{ Form::select('assigned_user_id', $assignableUsersList, null, ['class'=>'form-control', 'id'=>'assigned_user_id']) }}--}}
                    </div>
                </div>

                <!-- Status -->
                <div class="form-group">
                    {{ Form::label('status', 'Status:', ['class' =>'col-sm-3 control-label']) }}
                    <div class="col-sm-5">
                        {{ Form::select('status', $statuses, null, ['class'=>'form-control', 'id'=>'status']) }}
                    </div>
                </div>

                <!-- Buttons -->
                <div class="form-group">
                    {{ Form::label('', '', ['class' => 'col-sm-3 control-label']) }}
                    <div class="col-sm-5">
                        <!-- Submit button -->
                        {{ Form::submit(isset($submit)?$submit:'Submit', ['class' => 'form-control btn btn-primary']) }}
                        <!-- Cancel button -->
                        {{ link_to_route('catalogue.product-definitions.index', 'Cancel', null, array('class'=>'form-control btn btn-warning')) }}
                    </div>
                </div>


			</div>

		</div>

		<ul class="pager wizard">
			<li class="previous">
				<a href="#"><i class="entypo-left-open"></i> Previous</a>
			</li>

			<li class="next">
				<a href="#">Next <i class="entypo-right-open"></i></a>
			</li>
		</ul>
	</div>



<script type="text/javascript">

    $(document).ready(function() {


// Had to disable below validation function because it was breaking the overall validation process
// Need to look into how to add CKeditor validation using JQuery-validate.js


//        $("#rootwizard-2").validate(
//        {
//          ignore: [],
//          debug: false,
//            rules: {
//
//                description:{
//                     required: function()
//                    {
//                     CKEDITOR.instances.description.updateElement();
//                    },
//
//                     minlength:10
//                }
//            },
//            messages:
//                {
//
//                description:{
//                    required:"Please enter Text",
//                    minlength:"Please enter 10 characters"
//
//
//                }
//            }
//        });



        // Populate Assigned User select based on Supplier selection
        $("#supplier_id").change(function() {
            var $userSelect = $("#assigned_user_id");
            $userSelect.empty();
            var supplier = $("#supplier_id").val();
            if(supplier )
            $.getJSON("../cataloguing/supplier-users/" + $("#company_id").val() + '/' + $("#supplier_id").val(), function(data) {
                for (var company in data) {
                  if (data.hasOwnProperty(company)) {
                    $userSelect.append('<optgroup label="' + company + '">');

                    for (var key in data[company]) {
                      if (data[company].hasOwnProperty(key)) {
                        $userSelect.append('<option value="' + key +'">' + data[company][key] + '</option>');
                      }
                    }
                  }
                }
            });

        });

        // Populate Assigned User and Supplier select based on customer selection
        $("#company_id").change(function() {
            var $userSelect = $("#assigned_user_id");
            $userSelect.empty();
            $.getJSON("../cataloguing/customer-users/" + $("#company_id").val(), function(data) {
                for (var company in data) {
                  if (data.hasOwnProperty(company)) {
                    $userSelect.append('<optgroup label="' + company + '">');

                    for (var key in data[company]) {
                      if (data[company].hasOwnProperty(key)) {
                        $userSelect.append('<option value="' + key +'">' + data[company][key] + '</option>');
                      }
                    }
                  }
                }
            });

            var $supplierSelect = $("#supplier_id");
            $supplierSelect.empty();
            $.getJSON("../cataloguing/suppliers/" + $("#company_id").val(), function(data) {
                $supplierSelect.append('<option value="">[Select]</option>');
                $.each(data, function(index, value) {
                    $supplierSelect.append('<option value="' + index +'">' + value + '</option>');
                });
            });
        });

        $("#clear-images").click(function(event){
          event.preventDefault();
          $("#images").replaceWith("<input type='file' id='images' name='images[]' multiple />");
        });
    });

</script>

<script type="text/javascript">

    Element.prototype.remove = function() {
        this.parentElement.removeChild(this);
    }
    NodeList.prototype.remove = HTMLCollection.prototype.remove = function() {
        for(var i = 0, len = this.length; i < len; i++) {
            if(this[i] && this[i].parentElement) {
                this[i].parentElement.removeChild(this[i]);
            }
        }
    }

    $("a.detach-image").click(function(e){
          e.preventDefault();
          var confirmdelete = confirm("Are you sure to want to delete this image?");
          if (confirmdelete ==true) {
              var $id = $(this).attr('imageid');
              document.getElementById('image'+$id).style.display = 'none';
              document.getElementById('image'+$id).remove();
              $.getJSON("/images/" + $id + "/delete",function(result){});
          }
    });

    $("a.detach-attachment").click(function(e){
          e.preventDefault();
          var confirmdelete = confirm("Are you sure to want to delete this file?");
          if (confirmdelete ==true) {
              var $id = $(this).attr('attachmentid');
              document.getElementById('attachment'+$id).style.display = 'none';
              document.getElementById('attachment'+$id).remove();
              $.getJSON("/attachments/" + $id + "/delete",function(result){});
          }
    });

    var imageSerial = 1; // serial to append to new element id
    var imageCounter = 0; // current count/index of image
    var imageLimit = 5; // max amount of images allowed
    var attachmentSerial = 1; // serial to append to new element id
    var attachmentCounter = 0; // current count/index of image
    var attachmentLimit = 5; // max amount of images allowed

    function addAttachmentInput(divName){
        if ((attachmentCounter + 1) == attachmentLimit)  {
            alert("You have reached the limit of adding " + attachmentLimit + " file attachments");
        }
        else {
            var newdiv = document.createElement('div');
            var divId = 'attachment-div' + attachmentSerial;
            var inner = "<div class='form-group'>"
                + "<div class='col-md-6 col-md-offset-1'>"
                + "<div class='fileinput fileinput-new' data-provides='fileinput'>"
                + "<span class='btn btn-info btn-file'>"
                + "<span class='fileinput-new'>Select file</span><span class='fileinput-exists'>Change</span><input type='file' name='attachments[]'></span> "
                + "<span class='fileinput-filename'></span>"
                + "<a href='#' class='close fileinput-exists' data-dismiss='fileinput' style='float: none'>&times;</a>"
                + "</div></div></div>";
            newdiv.innerHTML = inner;
            document.getElementById(divName).appendChild(newdiv);
            newdiv.className = 'row';
            newdiv.id = divId;
            attachmentSerial++;
            attachmentCounter++;
        }
    }

    function addImageInput(divName){
        if ((imageCounter + 1) == imageLimit)  {
            alert("You have reached the limit of adding " + imageLimit + " images");
        }
        else {
            var newdiv = document.createElement('div');
            var divId = 'image-div' + imageSerial;
            var inner = "<label class='col-sm-3 control-label'>&nbsp;</label>"
                + "<div class='col-sm-5'>"
                + "<div class='fileinput fileinput-new' data-provides='fileinput'>"
                + "<div class='fileinput-new thumbnail' style='width: 150px; height: 150px;' data-trigger='fileinput'>"
                + "<img src='http://placehold.it/150&text=Product+photo' alt='...'></div>"
                + "<div class='fileinput-preview fileinput-exists thumbnail' style='max-width: 200px; max-height: 150px'></div>"
                + "<div><span class='btn btn-info btn-file'>"
                + "<span class='fileinput-new'>Select image</span><span class='fileinput-exists'>Change</span><input type='file' name='images[]' accept='image/*'></span> "
                + "<input type='button' class='btn btn-orange' value='Remove' onclick='deleteInput(\"" + divId + "\")' >"
                + "</div></div></div>";
            newdiv.innerHTML = inner;
            document.getElementById(divName).appendChild(newdiv);
            newdiv.className = 'form-group';
            newdiv.id = divId;
            imageSerial++;
            imageCounter++;
        }
    }

    function deleteInput(id){
        var elem = document.getElementById(id);
        elem.parentNode.removeChild(elem);
        counter--;
    }

</script>


<!-- Bottom Scripts -->


<link rel="stylesheet" href="{{URL::asset('js/selectboxit/jquery.selectBoxIt.css')}}">

<script src="{{ URL::asset('js/ckeditor/ckeditor.js') }}"></script>
<script src="{{ URL::asset('js/ckeditor/adapters/jquery.js') }}"></script>
<script src="{{ URL::asset('js/fileinput.js') }}"></script>
<script src="{{ URL::asset('js/joinable.js') }}"></script>
<script src="{{ URL::asset('js/resizeable.js') }}"></script>
<script src="{{ URL::asset('js/jquery.bootstrap.wizard.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.inputmask.bundle.min.js') }}"></script>
<script src="{{ URL::asset('js/jselectboxit/jquery.selectBoxIt.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap-datepicker.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap-switch.js') }}"></script>
<script src="{{ URL::asset('js/jquery.multi-select.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap-tour/build/js/bootstrap-tour.min.js') }}"></script>