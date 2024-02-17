@extends('layouts.app')

@php
    $theme_name = !empty(env('DATA_INSERT_APP_THEME')) ? env('DATA_INSERT_APP_THEME') : APP_THEME();
    $out_of_stock_threshold =\App\Models\Utility::GetValueByName('out_of_stock_threshold',$theme_name);
@endphp
@section('page-title', __('Product Auto Poster'))

@section('action-button')
    <div class="text-end d-flex all-button-box justify-content-md-end justify-content-center">
        {{-- @can('Manage Variants')
            <a href="{{ route('admin.product-variant.index') }}" class="btn btn-sm btn-primary mx-1" data-toggle="tooltip"
                title="{{ __('Create Variant') }}">
                {{ __('Add Variant') }}
            </a>
        @endcan --}}

{{--        @can('Create Products')--}}
{{--            <a href="#" class="btn btn-sm btn-primary mx-1" data-ajax-popup="true" data-size="lg" data-title="Add Product"--}}
{{--               data-url="{{ route('admin.product.create') }}" data-toggle="tooltip" title="{{ __('Create Product') }}">--}}
{{--                <i class="ti ti-plus"></i>--}}
{{--            </a>--}}
{{--        @endcan--}}
    </div>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">{{ __('Facebook Auto Poster ') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <h1>
                    Login With Facebook
                </h1>
            </div>
        </div>
    </div>
@endsection

@push('custom-script1')
    <script>
        function add_more_customer_choice_option(i, name) {
            $('#customer_choice_options').append(
                '<div class="form-group"><input type="hidden" name="choice_no[]" value="' + i + '">' +
                '<label for="choice_attributes">' + name + ':</label>' +
                '<input type="text" class="form-control variant_choice" name="choice_options_' + i +
                '[]" __="{{ __('Enter choice values') }}"  data-role="tagsinput" id="variant_tag' + i +
                '" onchange="update_sku($(this).val())">' +
                '</div>');
            comman_function();
        }

        function add_more_choice_option(i, name) {

            $('#attribute_options').append(
                '<div class="card oprtion"><div class="card-body "><input type="hidden" class="abd" name="attribute_no[]" value="' +
                i + '"><input type="hidden" class="abd" name="option_no[]" value="' + i + '">' +

                '<div class="form-group row col-12">' +
                '<div class="form-group col-md-6">' +
                '<label for="choice_attributes" class="col-6">' + name + ':</label></div>' +

                '<div class="form-group col-md-6 text-end d-flex all-button-box justify-content-md-end justify-content-center">' +
                '<a href="#" class="btn btn-sm btn-primary add_attribute" data-ajax-popup="true" data-title="{{ __('Add Attribute Option') }}" data-size="md" ' +
                'data-url="{{ route('admin.product-attribute-option.create') }}/' + i + '" ' +
                'data-toggle="tooltip">' +
                '<i class="ti ti-plus">{{ __('Add Attribute option') }}</i></a></div></div>' +

                '<div class="form-group row col-12 parent-clase">' +
                '<div class="form-group col-md-6">' +
                '<div class="form-chec1k form-switch">' +
                '<input type="hidden" name="visible_attribute_' + i + '" value="0">' +
                '<input type="checkbox" class="form-check-input attribute-form-check" name="visible_attribute_' + i +
                '" id="visible_attribute" value="1">' +
                '<label class="form-check-label" for="visible_attribute"></label>' +
                '<label for="product_page_option" class=""> Visible on the product page</label></div>' +

                ' <div style="margin-top: 9px;"></div>' +

                '<div class="for-variation_data form-chec1k form-switch d-none use_for_variation" id="use_for_variation"  data-id="' +
                i + '">' +
                '<input type="hidden" name="for_variation_' + i + '" value="0">' +
                '<input type="checkbox" class="form-check-input input-options attribute-form-check enable_variation_' +
                i + '" name="for_variation_' + i + '" id="for_variation" value="1" data-id="' + i +
                '" data-enable-variation=" enable_variation_' + i + ' ">' +
                '<label class="form-check-label" for="for_variation"></label>' +
                '<label for="product_page_option" class=""> Used for variations</label></div>' +
                '</div>' +

                '<div class="form-group col-md-6">' +
                '<select class="col-6 form-control attribute attribute_option_data" name="attribute_options_' + i +
                '[]" __="{{ __('Enter choice values') }}"  data-role="" multiple id="attribute' + i +
                '" data-id="' + i + '"></select></div></div>' +

                '</div></div>');

            if ($('.enable_product_variant').prop('checked') == true) {
                $(".use_for_variation").removeClass("d-none");
            }
            $(document).ready(function() {
                $(document).on("change", ".enable_product_variant", function() {
                    $(".use_for_variation").addClass("d-none");
                    if ($(this).prop('checked') == true) {
                        $(".use_for_variation").removeClass("d-none");
                    }
                });
            });
            comman_function();
        }

        // product image ajax
        $(document).on('click', '.remove_image', function() {
            var id = $(this).attr('data-id');
            var data = {
                id: id,
            }
            $.ajax({
                url: '{{ route('admin.product.image.remove') }}',
                method: 'POST',
                data: data,
                context: this,
                success: function(response) {
                    $(this).parent().parent().remove();
                }
            });
        });

        $(document).on('change', '.product_image_update', function() {
            var form = $(this).closest('form');
            var url = form.attr('action');
            var files = $('#sub_upload_image')[0].files;
            var cover_file = $('#product_cover_upload_image')[0].files;

            var formData = new FormData(form[0]);
            formData.append('files', files);
            formData.append('cover_file', cover_file);

            $.ajax({
                url: url,
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data.response) {
                        show_toastr('{{ __('Success') }}', data.message, 'success');
                        $('.product_img').html(data.html);

                        if (data.cover_image_status == 1) {
                            $('.product_cover_img').html(data.cover_image);
                            console.log($('.cover_img' + data.product_id));
                            $('.cover_img' + data.product_id).attr('src', data.cover_image_path);
                        }
                    } else {
                        show_toastr('{{ __('Error') }}', data.message, 'error');
                    }
                }
            });
        });


        // get sub category
        $(document).on('change', '#maincategory', function() {
            var maincategory = $(this).val();
            var subcategory = $(this).attr('data-val');
            var data = {
                maincategory: maincategory,
                subcategory: subcategory
            }
            $.ajax({
                url: '{{ route('admin.get.subcategory') }}',
                method: 'POST',
                data: data,
                context: this,
                success: function(response) {
                    $('.subcategory_selct').html();
                    var select =
                        '<select class="form-control" data-role="tagsinput" id="subcategory_id" name="subcategory_id">' +
                        response.html + '</select>';
                    $('.subcategory_selct').html(select);
                    comman_function();
                    $(this).attr('data-val', '0');
                }
            });
        });
    </script>
@endpush
