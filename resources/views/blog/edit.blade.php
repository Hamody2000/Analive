
{{Form::model($blog, array('route' => array('admin.blogs.update', $blog->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data')) }}

@php
    $plan = \App\Models\Plan::find(\Auth::user()->plan);
@endphp

@if ($plan->enable_chatgpt == 'on')
<div class="d-flex justify-content-end mb-1">
    <a href="#" class="btn btn-primary me-2 ai-btn" data-size="lg" data-ajax-popup-over="true" data-url="{{ route('admin.generate',['blog']) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('Generate') }}" data-title="{{ __('Generate Content With AI') }}">
        <i class="fas fa-robot"></i> {{ __('Generate with AI') }}
    </a>
</div>
@endif

<div class="row">
    <div class="form-group col-md-12">
        {!! Form::label('', __('Title'), ['class' => 'form-label']) !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-12">
        {!! Form::label('', __('Short Description'), ['class' => 'form-label']) !!}
        {!! Form::text('short_description', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-md-12">
        {!! Form::label('', __('Content'), ['class' => 'form-label']) !!}
            <div class="form-group mt-3">
                {!! Form::textarea('content', null, ['id' => 'content', 'rows' => 8, 'class'=>'pc-tinymce-2']) !!}
            </div>
    </div>
    <div class="form-group  col-md-6">
        {!! Form::label('', __('Category'), ['class' => 'form-label']) !!}
        {!! Form::select('maincategory_id', $MainCategoryList, null, ['class' => 'form-control select category', 'data-role' => 'tagsinput', 'id' => 'category_id', 'name' =>'category','placeholder' => 'Select Option']) !!}
    </div>

    @if ($ThemeSubcategory == 1)
    <div class="form-group  col-md-6">
        {!! Form::label('', __('Sub Category'), ['class' => 'form-label']) !!}
        <div class="emp_div">
            {{ Form::select('SubCategoryList[]', [],null, array('class' => 'sub form-control select project_select multi-select','id'=>'subcategory_id' ,'multiple'=>' ','required'=>'required')) }}
        </div>
    </div>
    @endif
    <div class="form-group col-md-5">
        {!! Form::label('', __('Cover Image'), ['class' => 'form-label']) !!}
        <label for="upload_cover_image" class="image-upload bg-primary pointer w-100">
            <i class="ti ti-upload px-1"></i> {{ __('Choose file here') }}
        </label>
        <input type="file" name="cover_image" id="upload_cover_image" class="d-none">
    </div>

    <div class="modal-footer pb-0">
        <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
        <input type="submit" value="Update" class="btn btn-primary">
    </div>
</div>
{!! Form::close() !!}

<script src="{{asset('css/summernote/summernote-bs4.js')}}"></script>
    <script src="{{asset('assets/js/plugins/tinymce/tinymce.min.js')}}"></script>
    <script>
        if ($(".pc-tinymce-2").length) {
            tinymce.init({
                selector: '.pc-tinymce-2',
                toolbar: 'link image',
                plugins: 'image code',
                image_title: true,
                automatic_uploads: true,
                file_picker_types: 'image',
                file_picker_callback: function (cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function () {
                var file = this.files[0];

                var reader = new FileReader();
                reader.onload = function () {
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);
                    cb(blobInfo.blobUri(), { title: file.name });
                };
                reader.readAsDataURL(file);
                };

                input.click();
            },
                height: "400",
                content_style: 'body { font-family: "Inter", sans-serif; }'
            });
        }
        document.addEventListener('focusin', function (e) {
            if (e.target.closest('.tox-tinymce-aux, .moxman-window, .tam-assetmanager-root') !== null) {
                e.stopImmediatePropagation();
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 200,
            });
        });
    </script>

    <script type="text/javascript">
        $( ".category" ).change(function() {
            var client_id = $(this).val();
            getparent(client_id);
        });
        function getparent(bid) {
        $.ajax({
            url: `{{ url('admin/blogs/category/select')}}/${bid}`,
            // url: '{{ route('admin.blogs.category.select','bid') }}',
            type: 'GET',
            success: function (data) {
                $('#subcategory_id').remove();
                var emp_selct = `<select class="form-control select project_select multi-select" id="subcategory_id" multiple="" required="required" name="SubCategoryList[]">
                </select>`;
                $('.emp_div').html(emp_selct);
                // $('#subcategory_id').append('<option value="0"> {{__('All')}} </option>');
                $.each(data, function (i, item) {
                    $('#subcategory_id').append('<option value="' + item.id + '">' + item.name + '</option>');
                });
                new Choices('#subcategory_id', {
                        removeItemButton: true,
                    }
                );
            }
        });
        }

    </script>
<script src="{{asset('assets/js/plugins/choices.min.js')}}"></script>
<script>
    if ($(".multi-select").length > 0) {
              $( $(".multi-select") ).each(function( index,element ) {
                  var id = $(element).attr('id');
                     var multipleCancelButton = new Choices(
                          '#'+id, {
                              removeItemButton: true,
                          }
                      );
              });
         }
  </script>

@push('custom-css')
<link rel="stylesheet" href="{{asset('css/summernote/summernote-bs4.css')}}">
    <style>
        .nav-tabs .nav-link-tabs.active {
            background: none;
        }
    </style>
@endpush
