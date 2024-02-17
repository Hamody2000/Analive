
<?php
    $logo= get_file('uploads/logo');
    $theme_name = !empty(APP_THEME()) ? APP_THEME() : '';
    $company_favicon= \App\Models\Utility::getValByName('company_favicon');
    $cust_darklayout = \App\Models\Utility::GetValueByName('cust_darklayout',$theme_name);
    $cust_theme_bg = \App\Models\Utility::GetValueByName('cust_theme_bg',$theme_name);
    $SITE_RTL = \App\Models\Utility::GetValueByName('SITE_RTL',$theme_name);
    $settings = \App\Models\Setting::where('store_id',getCurrentStore())->where('theme_id', $theme_name)->pluck('value', 'name')->toArray();
    $store_id = \App\Models\Store::where('id', getCurrentStore())->first();
    $Tax = \App\Models\Tax::select('tax_name', 'tax_type', 'tax_amount', 'id')->where('store_id', $store_id->id)->where('theme_id', $store_id->theme_id)->get();
    $color = 'theme-3';
    if (!empty($settings['color'])) {
        $color = $settings['color'];
    }
?>
<?php $__env->startSection('page-title', __('POS')); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><?php echo e(__('POS')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid px-2">
        <?php $lastsegment = request()->segment(count(request()->segments())) ?>

            <div class="mt-2 row">
                <div class="col-lg-7">
                    <div class="sop-card card mb-0">
                        <div class="card-header p-2">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h3 class="mb-0 p-2">Product Section</h3>
                                </div>
                                <div class="search-bar-left col-md-6">
                                    <form class="mb-0">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ti ti-search"></i></span>
                                            </div>
                                            <input id="searchproduct" type="text" data-url="<?php echo e(route('admin.search.products')); ?>" placeholder="<?php echo e(__('Search Product')); ?>" class="form-control pr-4 rounded-right">
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="card-body p-2">
                            <div class="right-content">
                                <div class="button-list b-bottom catgory-pad mb-4">
                                    <div class="form-row m-0" id="categories-listing">
                                    </div>
                                </div>
                                <div class="product-body-nop">
                                    <div class="form-row row" id="product-listing">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 ps-lg-0">
                    <div class="card m-0 h-100">
                        <div class="card-header p-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="mb-0 p-2">Billing Section</h3>
                                </div>
                                <div class="col-md-6">
                                    <?php echo e(Form::select('customer_id',$customers,'', array('class' => 'form-control select customer_select','id'=>'customer','required'=>'required'))); ?>

                                    <?php echo e(Form::hidden('vc_name_hidden', '',['id' => 'vc_name_hidden'])); ?>

                                    <input type="hidden" id="store_id" value="<?php echo e(\Auth::user()->current_store); ?>">
                                    <input type="hidden" id="theme_id" value="<?php echo e($theme_name); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="card-body carttable cart-product-list carttable-scroll d-flex flex-column h-100 justify-content-between" id="carthtml" style="flex: 1;">
                            <?php $total = 0 ?>
                            <div class="table-responsive">
                                <table class="table pos-table">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th class="text-left"><?php echo e(__('Name')); ?></th>
                                        <th class="text-center"><?php echo e(__('QTY')); ?></th>
                                        <th><?php echo e(__('Tax')); ?></th>
                                        <th class="text-center"><?php echo e(__('Price')); ?></th>
                                        <th class="text-center"><?php echo e(__('Sub Total')); ?></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody id="tbody">
                                    <?php if(session($lastsegment) && !empty(session($lastsegment)) && count(session($lastsegment)) > 0): ?>
                                        <?php $__currentLoopData = session($lastsegment); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $product = \App\Models\Product::find($details['id']);
                                                $image_url = !empty($product->cover_image_path) ? $product->cover_image_path : 'default.jpg';
                                                $total = $total + (float) $details['total_orignal_price'];
                                            ?>
                                            <?php if(\Auth::user()->current_store == $product->store_id): ?>
                                                <tr data-product-id="<?php echo e($id); ?>" id="product-id-<?php echo e($id); ?>">
                                                    <td class="cart-images">
                                                        <img alt="Image placeholder" src="<?php echo e(get_file($image_url)); ?>" class="card-image avatar rounded-circle-sale shadow hover-shadow-lg">
                                                    </td>
                                                    <td class="text-left name"><?php echo e($details['name']); ?></td>
                                                    <td>
                                                        <span class="quantity buttons_added">
                                                            <input type="button" value="-" class="minus">
                                                            <input type="number" step="1" min="1" max="" name="quantity"
                                                                title="<?php echo e(__('Quantity')); ?>" class="input-number"
                                                                data-url="<?php echo e(url('admin/update-cart/')); ?>" data-id="<?php echo e($id); ?>"
                                                                size="4" value="<?php echo e($details['quantity']); ?>" style="width:50px;">
                                                            <input type="button" value="+" class="plus">
                                                        </span>
                                                    </td>

                                                    <td class=" cart-summary-table">
                                                        <?php $__currentLoopData = $Tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key1 => $value1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <span class="badge badge-primary"> <?php echo e($value1->tax_name); ?> <?php echo e($value1->tax_amount); ?>%</span><br>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </td>

                                                    <td class="price text-center"><?php echo e(SetNumberFormat($details['orignal_price'])); ?></td>

                                                    <td class="text-center">
                                                        <span class="total_orignal_price"><?php echo e(SetNumberFormat($details['total_orignal_price'])); ?></span>
                                                    </td>
                                                    <td>
                                                        <?php echo Form::open(['method' => 'DELETE','class'=>'mb-0', 'route' => ['admin.remove-from-cart'],'id' => 'delete-form-'.$id]); ?>

                                                        <button type="button" class="show_confirm btn btn-sm btn-danger p-2">
                                                            <i class="ti ti-trash"></i>
                                                        </button>
                                                        <input type="hidden" name="session_key" value="<?php echo e($lastsegment); ?>">
                                                        <input type="hidden" name="id" value="<?php echo e($id); ?>">
                                                        <?php echo Form::close(); ?>

                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <tr class="text-center no-found">
                                            <td colspan="7"><?php echo e(__('No Data Found.!')); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="total-section mt-3">
                                <div class="row align-items-center">
                                    <div class="col-md-6 col-12">
                                        <div class="left-inner ">
                                        <div class="d-flex text-end justify-content-end align-items-center">
                                            <span class="input-group-text bg-transparent"><?php echo e(SetNumberFormat()); ?></span>
                                            <?php echo e(Form::number('discount',null, array('class' => ' form-control discount','required'=>'required','placeholder'=>__('Discount')))); ?>

                                            <?php echo e(Form::hidden('discount_hidden', '',['id' => 'discount_hidden'])); ?>

                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="right-inner mt-3">
                                            <div class="d-flex text-end justify-content-md-end  justify-content-flex-start">
                                                <h6 class="mb-0 text-dark"><?php echo e(__('Sub Total')); ?> :</h6>
                                                <h6 class="mb-0 text-dark subtotal_price" id="displaytotal"><?php echo e(SetNumberFormat($total)); ?></h6>
                                            </div>

                                        <div class="d-flex align-items-center justify-content-md-end  justify-content-flex-start">
                                            <h6 class=""><?php echo e(__('Total')); ?> :</h6>
                                            <h6 class="totalamount" ><?php echo e(SetNumberFormat($total)); ?></h6>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between pt-3" id="btn-pur">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Pos')): ?>
                                        <button type="button" class="btn btn-primary rounded"  data-ajax-popup="true" data-size="xl"
                                                data-align="centered" data-url="<?php echo e(route('admin.pos.create')); ?>" data-title="<?php echo e(__('POS Invoice')); ?>"
                                                <?php if(session($lastsegment) && !empty(session($lastsegment)) && count(session($lastsegment)) > 0): ?> <?php else: ?> disabled="disabled" <?php endif; ?>>
                                            <?php echo e(__('PAY')); ?>

                                        </button>
                                    <?php endif; ?>
                                    <div class="tab-content btn-empty text-end">
                                        <?php echo Form::open(['method' => 'post', 'route' => ['admin.empty-cart'],'id' => 'delete-form-emptycart']); ?>

                                        <a href="#" class="btn btn-danger show_confirm rounded m-0"  ><?php echo e(__('Empty Cart')); ?>

                                        </a>
                                        <input type="hidden" name="session_key" value="<?php echo e($lastsegment); ?>" id="empty_cart">
                                        <?php echo Form::close(); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
<?php $__env->stopSection(); ?>

<!-- Required Js -->
<script src="<?php echo e(asset('js/jquery-3.6.0.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/bootstrap-notify.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/simplebar.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery.form.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/feather.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/bootstrap-switch-button.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/plugins/apexcharts.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/simple-datatables.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/notifier.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/pages/ac-notification.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/sweetalert2.all.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/choices.min.js')); ?><?php echo e("?".time()); ?>"></script>


<!-- Apex Chart -->
<script src="<?php echo e(asset('assets/js/plugins/apexcharts.min.js')); ?>"></script>

<?php if($message = Session::get('success')): ?>
    <script>
        show_toastr('<?php echo e(__('Success')); ?>', '<?php echo $message; ?>', 'success')
    </script>
<?php endif; ?>

<?php if($message = Session::get('error')): ?>
    <script>
        show_toastr('<?php echo e(__('Error')); ?>', '<?php echo $message; ?>', 'error')
    </script>
<?php endif; ?>
<?php echo $__env->yieldPushContent('script-page'); ?>

<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $( document ).ready(function() {

        $( "#vc_name_hidden" ).val($('.customer_select').val());
        $( "#discount_hidden").val($('.discount').val());

        $(function () {
            getProductCategories();

        });

        if ($('#searchproduct').length > 0) {
            var url = $('#searchproduct').data('url');
            var store_id = $( "#store_id" ).val();
            searchProducts(url,'','0',store_id);
        }

        
        $( '.customer_select' ).change(function() {
            $( "#vc_name_hidden" ).val($(this).val());
        });

        $(document).on('click', '#clearinput', function (e) {
            var IDs = [];
            $(this).closest('div').find("input").each(function () {
                IDs.push('#' + this.id);
            });
            $(IDs.toString()).val('');
        });

        $(document).on('keyup', 'input#searchproduct', function () {
            var url = $(this).data('url');
            var value = this.value;
            var cat = $('.cat-active').children().data('cat-id');
            var store_id = $( "#store_id" ).val();
            searchProducts(url, value,cat,store_id);
        });


        function searchProducts(url, value,cat_id,store_id = '0') {
            var session_key = $('#empty_cart').val();
            $.ajax({
                type: 'GET',
                url: url,
                data: {
                    'search': value,
                    'cat_id': cat_id,
                    'store_id' : store_id,
                    'session_key': session_key
                },
                success: function (data) {
                    $('#product-listing').html(data);
                }
            });
        }

        function getProductCategories() {
            $.ajax({
                type: 'GET',
                url: '<?php echo e(route('admin.product.categories')); ?>',
                success: function (data) {

                    $('#categories-listing').html(data);
                }
            });
        }

        $(document).on('click', '.toacart', function () {

            var sum = 0
            $.ajax({
                url: $(this).data('url'),

                success: function (data) {

                    if (data.code == '200') {

                        $('#displaytotal').text(addCommas(data.product.total_orignal_price));
                        $('.totalamount').text(addCommas(data.product.total_orignal_price));

                        if ('carttotal' in data) {
                            $.each(data.carttotal, function (key, value) {
                                $('#product-id-' + value.id + ' .total_orignal_price').text(addCommas(value.total_orignal_price));
                                sum += value.total_orignal_price;
                            });
                            $('#displaytotal').text(addCommas(sum));

                            $('.totalamount').text(addCommas(sum));

                       $('.discount').val('');
                        }

                        $('#tbody').append(data.carthtml);
                        $('.no-found').addClass('d-none');
                        $('.carttable #product-id-' + data.product.id + ' input[name="quantity"]').val(data.product.quantity);
                        $('#btn-pur button').removeAttr('disabled');
                        $('.btn-empty button').addClass('btn-clear-cart');

                        }
                },
                error: function (data) {
                    data = data.responseJSON;
                    show_toastr('<?php echo e(__("Error")); ?>', data.error, 'error');
                }
            });
        });

        $(document).on('change keyup', '#carthtml input[name="quantity"]', function (e) {
            e.preventDefault();
            var ele = $(this);
            var sum = 0;
            var quantity = ele.closest('span').find('input[name="quantity"]').val();
            var discount = $('.discount').val();
            var session_key = $('#empty_cart').val();
            if(quantity != 0 && quantity != null)
            {
                $.ajax({
                    url: ele.data('url'),
                    method: "patch",
                    data: {
                        id: ele.attr("data-id"),
                        quantity: quantity,
                        discount:discount,
                        session_key: session_key
                    },
                    success: function (data) {

                        if (data.code == '200') {

                            if (quantity == 0) {
                                ele.closest(".row").hide(250, function () {
                                    ele.closest(".row").remove();
                                });
                                if (ele.closest(".row").is(":last-child")) {
                                    $('#btn-pur button').attr('disabled', 'disabled');
                                    $('.btn-empty button').removeClass('btn-clear-cart');
                                }
                            }

                            $.each(data.product, function (key, value) {
                                sum += value.total_orignal_price;
                                $('#product-id-' + value.id + ' .total_orignal_price').text(addCommas(value.total_orignal_price));
                            });

                            $('#displaytotal').text(addCommas(sum));
                            console.log(sum, data);
                            if(discount <= sum){
                                $('.totalamount').text(data.discount);
                            }
                            else{
                                $('.totalamount').text(addCommas(0));
                            }
                        }
                    },
                    error: function (data) {
                        data = data.responseJSON;
                        show_toastr('<?php echo e(__("Error")); ?>', data.error, 'error');
                    }
                });
            }
        });

        $(document).on('click', '.remove-from-cart', function (e) {
            e.preventDefault();

            var ele = $(this);
            var sum = 0;

            if (confirm('<?php echo e(__("Are you sure?")); ?>')) {
                ele.closest(".row").hide(250, function () {
                    ele.closest(".row").parent().parent().remove();
                });
                if (ele.closest(".row").is(":last-child")) {
                    $('#btn-pur button').attr('disabled', 'disabled');
                    $('.btn-empty button').removeClass('btn-clear-cart');
                }
                $.ajax({
                    url: ele.data('url'),
                    method: "DELETE",
                    data: {
                        id: ele.attr("data-id"),

                    },
                    success: function (data) {
                        if (data.code == '200') {

                            $.each(data.product, function (key, value) {
                                sum += value.total_orignal_price;
                                $('#product-id-' + value.id + ' .total_orignal_price').text(addCommas(value.total_orignal_price));
                            });

                            $('#displaytotal').text(addCommas(sum));

                            show_toastr('success', data.success, 'success')
                        }
                    },
                    error: function (data) {
                        data = data.responseJSON;
                        show_toastr('<?php echo e(__("Error")); ?>', data.error, 'error');
                    }
                });
            }
        });

        $(document).on('click', '.btn-clear-cart', function (e) {
            e.preventDefault();

            if (confirm('<?php echo e(__("Remove all items from cart?")); ?>')) {

                $.ajax({
                    url: $(this).data('url'),
                    data: {
                        session_key: session_key
                    },
                    success: function (data) {
                        location.reload();
                    },
                    error: function (data) {
                        data = data.responseJSON;
                        show_toastr('<?php echo e(__("Error")); ?>', data.error, 'error');
                    }
                });
            }
        });

        $(document).on('click', '.btn-done-payment', function (e) {
            e.preventDefault();
            var ele = $(this);

            $.ajax({
                url: ele.data('url'),

                method: 'GET',
                data: {
                    vc_name: $('#vc_name_hidden').val(),
                    warehouse_name: $('#warehouse_name_hidden').val(),
                    discount : $('#discount_hidden').val(),
                },
                beforeSend: function () {
                    ele.remove();
                },
                success: function (data) {

                    if (data.code == 200) {
                        show_toastr('success', data.success, 'success')
                    }

                },
                error: function (data) {
                    data = data.responseJSON;
                    show_toastr('<?php echo e(__("Error")); ?>', data.error, 'error');
                }

            });

        });

        $(document).on('click', '.category-select', function (e) {
            var cat = $(this).data('cat-id');
            var white = 'text-white';
            var dark = 'text-dark';
            $('.category-select').find('.tab-btns').removeClass('btn-primary')
            $(this).find('.tab-btns').addClass('btn-primary')
            $('.category-select').parent().removeClass('cat-active');
            $('.category-select').find('.card-title').removeClass('text-white').addClass('text-dark');
            $('.category-select').find('.card-title').parent().removeClass('text-white').addClass('text-dark');
            $(this).find('.card-title').removeClass('text-dark').addClass('text-white');
            $(this).find('.card-title').parent().removeClass('text-dark').addClass('text-white');
            $(this).parent().addClass('cat-active');
            var url = '<?php echo e(route('admin.search.products')); ?>'
            var store_id=$('#store_id').val();
            searchProducts(url,'',cat,store_id);
        });



        $(document).on('keyup', '.discount', function () {
            var discount = $('.discount').val();
            var total = $('#displaytotal').text();
            var maintotal = parseFloat(total.replace("$","").replace(",",""))
            if(discount <= maintotal){
                $( "#discount_hidden" ).val(discount);
            }else{
                $( "#discount_hidden" ).val(maintotal);
            }
            $.ajax({
                url: "<?php echo e(route('admin.cartdiscount')); ?>",
                method: 'POST',
                data: {discount: discount,},
                success: function (data)
                {
                    if(discount <= maintotal){
                        $('.totalamount').text(data.total);
                    }else{
                        $('.totalamount').text(addCommas(0));
                    }
                },
                error: function (data) {
                    data = data.responseJSON;
                    show_toastr('<?php echo e(__("Error")); ?>', data.error, 'error');
                }
            });
            var price = <?php echo e($total); ?>

            var total_amount = price-discount;
            $('.totalamount').text(total_amount);
        });
    });



</script>
<script>
    var site_currency_symbol_position = '<?php echo e(\App\Models\Utility::getValByName('site_currency_symbol_position')); ?>';
    var site_currency_symbol = '<?php echo e(\App\Models\Utility::getValByName('site_currency_symbol')); ?>';
</script>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ayman/Downloads/AnaLive/resources/views/pos/index.blade.php ENDPATH**/ ?>