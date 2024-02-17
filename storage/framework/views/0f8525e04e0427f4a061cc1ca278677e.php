

<?php $__env->startSection('page-title', __('Plan')); ?>

<?php $__env->startSection('action-button'); ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Plan')): ?>
    <?php if(isset($setting['is_stripe_enabled']) && $setting['is_stripe_enabled'] == 'on' || isset($setting['is_paystack_enabled']) && $setting['is_paystack_enabled'] == 'on' || isset($setting['is_razorpay_enabled']) && $setting['is_razorpay_enabled'] == 'on' || isset($setting['is_mercado_enabled']) && $setting['is_mercado_enabled'] == 'on' || isset($setting['is_skrill_enabled']) && $setting['is_skrill_enabled'] == 'on' || isset($setting['is_paymentwall_enabled']) && $setting['is_paymentwall_enabled'] == 'on' || isset($setting['is_paypal_enabled']) && $setting['is_paypal_enabled'] == 'on' || isset($setting['is_flutterwave_enabled']) && $setting['is_flutterwave_enabled'] == 'on' || isset($setting['is_paytm_enabled']) && $setting['is_paytm_enabled'] == 'on' || isset($setting['is_mollie_enabled']) && $setting['is_mollie_enabled'] == 'on' || isset($setting['is_coingate_enabled']) && $setting['is_coingate_enabled'] == 'on' || isset($setting['is_sspay_enabled']) && $setting['is_sspay_enabled'] == 'on' || isset($setting['is_toyyibpay_enabled']) && $setting['is_toyyibpay_enabled'] == 'on' || isset($setting['is_bank_transfer_enabled']) && $setting['is_bank_transfer_enabled'] == 'on' || isset($setting['is_paytabs_enabled']) && $setting['is_paytabs_enabled'] == 'on'): ?>

        <div class="text-end d-flex all-button-box justify-content-md-end justify-content-center">
            <a href="#" class="btn btn-sm btn-primary" data-ajax-popup="true" data-size="lg" data-title="Add Plan"
            data-url="<?php echo e(route('admin.plan.create')); ?>" data-toggle="tooltip" title="<?php echo e(__('Create Plan')); ?>">
            <i class="ti ti-plus"></i>
            </a>
        </div>
    <?php endif; ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><?php echo e(__('Plan')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row mb-4">
        <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="plan_card">
                    <div class="card price-card price-1 wow animate__fadeInUp" data-wow-delay="0.2s" style="
                                        visibility: visible;
                                        animation-delay: 0.2s;
                                        animation-name: fadeInUp;
                                      ">
                        <div class="card-body">
                            <span class="price-badge text-dark f-w-600 text-start f-16 ps-0 mb-2"><?php echo e($plan->name); ?></span>
                            <?php if(\Auth::guard('admin')->user()->type == 'admin' && \Auth::guard('admin')->user()->plan == $plan->id): ?>
                                <div class="d-flex flex-row-reverse m-0 p-0 plan-active-status bg-primary">
                                    <span class="d-flex align-items-center ">

                                        <span class="m-2"><?php echo e(__('Active')); ?></span>
                                    </span>
                                </div>
                            <?php endif; ?>

                            <div class="text-end position-absolute" style="top: 35px; right:0;">
                                <div class="">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Plan')): ?>
                                        <div class="d-inline-flex align-items-center">
                                            <a class="btn btn-sm btn-icon  bg-light-secondary me-2" data-url="<?php echo e(route('admin.plan.edit',$plan->id)); ?>" data-title="<?php echo e(__('Edit Plan')); ?>" data-ajax-popup="true" data-size="lg" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Edit')); ?>">
                                                <i  class="ti ti-edit f-20"></i>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <h3 class="mb-3 f-w-600 text-start text-success">
                                <?php echo e(!empty($setting['CURRENCY']) ? $setting['CURRENCY'] : '$'); ?><?php echo e($plan->price . ' / ' . __(\App\Models\Plan::$arrDuration[$plan->duration])); ?></small>
                            </h3>
                            <?php if($plan->description): ?>
                                    <p class="text-start">
                                        <?php echo e($plan->description); ?><br />
                                    </p>
                            <?php endif; ?>
                            <div class="row mb-0">
                                <div class="col-4 text-center">
                                    <?php if($plan->max_products == '-1'): ?>
                                        <span class="h5 mb-0"><?php echo e(__('Unlimited')); ?></span>
                                    <?php else: ?>
                                        <span class="h5 mb-0"><?php echo e($plan->max_products); ?></span>
                                    <?php endif; ?>
                                    <span class="d-block text-sm"><?php echo e(__('Products')); ?></span>
                                </div>
                                <div class="col-4 text-center">
                                        <span class="h5 mb-0">
                                            <?php if($plan->max_stores == '-1'): ?>
                                                <span class="h5 mb-0"><?php echo e(__('Unlimited')); ?></span>
                                            <?php else: ?>
                                                <span class="h5 mb-0"><?php echo e($plan->max_stores); ?></span>
                                            <?php endif; ?>
                                        </span>
                                    <span class="d-block text-sm"><?php echo e(__('Store')); ?></span>
                                </div>
                                <div class="col-4 text-center">
                                    <span class="h5 mb-0">
                                        <?php if($plan->max_users == '-1'): ?>
                                            <span class="h5 mb-0"><?php echo e(__('Unlimited')); ?></span>
                                        <?php else: ?>
                                            <span class="h5 mb-0"><?php echo e($plan->max_users); ?></span>
                                        <?php endif; ?>
                                    </span>
                                    <span class="d-block text-sm"><?php echo e(__('Users')); ?></span>
                                </div>
                            </div>
                            <div class="plan-card-detail text-center">
                                <ul class="list-unstyled d-inline-block my-4">
                                    <?php if($plan->enable_domain == 'on'): ?>
                                        <li class="d-flex align-items-center">
                                            <span class="theme-avtar">
                                            <i class="text-success ti ti-circle-plus"></i></span><?php echo e(__('Custom Domain')); ?>

                                        </li>
                                    <?php else: ?>
                                        <li class="text-danger d-flex align-items-center">
                                                <span class="theme-avtar">
                                                <i class="text-danger ti ti-circle-plus"></i></span><?php echo e(__('Custom Domain')); ?>

                                        </li>
                                    <?php endif; ?>
                                    <?php if($plan->enable_subdomain == 'on'): ?>
                                        <li class="d-flex align-items-center">
                                            <span class="theme-avtar">
                                            <i class="text-success ti ti-circle-plus"></i></span><?php echo e(__('Sub Domain')); ?>

                                        </li>
                                    <?php else: ?>
                                        <li class="text-danger d-flex align-items-center">
                                                <span class="theme-avtar">
                                                <i class="text-danger ti ti-circle-plus"></i></span><?php echo e(__('Sub Domain')); ?>

                                        </li>
                                    <?php endif; ?>
                                    <?php if($plan->enable_chatgpt == 'on'): ?>
                                        <li class="d-flex align-items-center">
                                            <span class="theme-avtar">
                                            <i class="text-success ti ti-circle-plus"></i></span><?php echo e(__('Chatgpt')); ?>

                                        </li>
                                    <?php else: ?>
                                        <li class="text-danger d-flex align-items-center">
                                                <span class="theme-avtar">
                                                <i class="text-danger ti ti-circle-plus"></i></span><?php echo e(__('Chatgpt')); ?>

                                        </li>
                                    <?php endif; ?>
                                    <?php if($plan->pwa_store == 'on'): ?>
                                        <li class="d-flex align-items-center">
                                            <span class="theme-avtar">
                                                <i class="text-success ti ti-circle-plus"></i
                                            ></span>
                                                <?php echo e(__('Progressive Web App (PWA)')); ?>

                                        </li>
                                    <?php else: ?>
                                        <li class="text-danger d-flex align-items-center">
                                            <span class="theme-avtar">
                                            <i class="text-danger ti ti-circle-plus"></i></span><?php echo e(__('Progressive Web App (PWA)')); ?>

                                    </li>
                                    <?php endif; ?>
                                    <?php if($plan->shipping_method == 'on'): ?>
                                        <li class="d-flex align-items-center">
                                            <span class="theme-avtar">
                                                <i class="text-success ti ti-circle-plus"></i
                                            ></span>
                                                <?php echo e(__('Shipping Method')); ?>

                                        </li>
                                    <?php else: ?>
                                        <li class="text-danger d-flex align-items-center">
                                            <span class="theme-avtar">
                                            <i class="text-danger ti ti-circle-plus"></i></span><?php echo e(__('Shipping Method')); ?>

                                    </li>
                                    <?php endif; ?>
                                    <?php if($plan->storage_limit != '0.00'): ?>
                                        <li class="d-flex align-items-center">
                                            <span class="theme-avtar">
                                                <i class="text-success ti ti-circle-plus"></i
                                            ></span>
                                                <?php echo e($plan->storage_limit); ?><?php echo e(__('MB Storage')); ?>

                                        </li>
                                    <?php else: ?>
                                        <li class="text-danger d-flex align-items-center">
                                            <span class="theme-avtar">
                                            <i class="text-danger ti ti-circle-plus"></i></span><?php echo e(__('0 MB Storage')); ?>

                                    </li>
                                    <?php endif; ?>
                                </ul>

                            </div>

                            <div class="row">
                                <?php if(\Auth::guard('admin')->user()->type != 'superadmin'): ?>
                                    <?php if($plan->price <= 0): ?>
                                        <div class="col-12">
                                            <p class="server-plan font-bold text-center bg-primary mb-0 btn btn-primary w-100 text-success">
                                                <?php echo e(__('Unlimited')); ?>

                                            </p>
                                        </div>
                                    <?php elseif(\Auth::guard('admin')->user()->plan == $plan->id && date('Y-m-d') < \Auth::guard('admin')->user()->plan_expire_date && \Auth::guard('admin')->user()->is_trial_done != 1): ?>
                                        <h5 class="h6 my-4">
                                            <?php echo e(__('Expired : ')); ?>

                                            <?php echo e(\Auth::guard('admin')->user()->plan_expire_date? \App\Models\Utility::dateFormat(\Auth::guard('admin')->user()->plan_expire_date): __('Unlimited')); ?>

                                        </h5>
                                    <?php elseif(\Auth::guard('admin')->user()->plan == $plan->id && !empty(\Auth::guard('admin')->user()->plan_expire_date) && \Auth::guard('admin')->user()->plan_expire_date < date('Y-m-d')): ?>
                                        <div class="col-12">
                                            <p class="server-plan font-bold text-center bg-primary mb-0 btn btn-primary w-100 text-success">
                                                <?php echo e(__('Expired')); ?>

                                            </p>
                                        </div>
                                    <?php else: ?>
                                        <div class="<?php echo e($plan->id == 1 ? 'col-12' : 'col-8'); ?>">
                                            <a href="<?php echo e(route('admin.stripe', \Illuminate\Support\Facades\Crypt::encrypt($plan->id))); ?>"
                                               class="btn  btn-primary d-flex justify-content-center align-items-center "><?php echo e(__('Subscribe')); ?>

                                                <i class="fas fa-arrow-right ms-2"></i></a>

                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if(\Auth::guard('admin')->user()->type != 'superadmin' && \Auth::guard('admin')->user()->plan != $plan->id): ?>
                                    <?php if($plan->id != 1): ?>
                                        <?php if(\Auth::guard('admin')->user()->requested_plan != $plan->id): ?>
                                            <div class="col-4">
                                                <a href="<?php echo e(route('admin.send.request',[\Illuminate\Support\Facades\Crypt::encrypt($plan->id)])); ?>"
                                                   class="btn btn-primary btn-icon"
                                                   data-title="<?php echo e(__('Send Request')); ?>"  data-bs-toggle="tooltip" data-bs-placement="top"
                                                   title="<?php echo e(__('Send Request')); ?>">
                                                    <span class="btn-inner--icon"><i class="fas fa-share"></i></span>
                                                </a>
                                            </div>
                                        <?php else: ?>
                                            <div class="col-4">
                                                <a href="<?php echo e(route('admin.request.cancel',\Auth::guard('admin')->user()->id)); ?> }}"
                                                   class="btn btn-icon m-0 btn-danger"
                                                   data-title="<?php echo e(__('Cancle Request')); ?>"  data-bs-toggle="tooltip" data-bs-placement="top"
                                                   title="<?php echo e(__('Cancel Request')); ?>">
                                                    <span class="btn-inner--icon"><i class="fas fa-times"></i></span>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <h5></h5>
                    <div class="table-responsive">
                        <table class="table mb-0 dataTable ">
                            <thead>
                            <tr>
                                <th> <?php echo e(__('Order Id')); ?></th>
                                <th><?php echo e(__('Date')); ?></th>
                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('Plan Name')); ?></th>
                                <th> <?php echo e(__('Price')); ?></th>
                                <th> <?php echo e(__('Payment Type')); ?></th>
                                <th> <?php echo e(__('Status')); ?></th>
                                <th> <?php echo e(__('Coupon')); ?></th>
                                <th> <?php echo e(__('Invoice')); ?></th>
                                <?php if(\Auth::user()->type == "superadmin"): ?>
                                <th> <?php echo e(__('Action')); ?></th>
                                <?php endif; ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($order->order_id); ?></td>
                                    <td><?php echo e($order->created_at->format('d M Y')); ?></td>
                                    <td><?php echo e($order->user_name); ?></td>
                                    <td><?php echo e($order->plan_name); ?></td>
                                    <td><?php echo e(GetCurrency() . $order->price); ?></td>
                                    <td><?php echo e($order->payment_type); ?></td>
                                    <td>
                                        <?php if($order->payment_status == 'succeeded'): ?>
                                            <i class="mdi mdi-circle text-primary"></i>
                                            <?php echo e(ucfirst($order->payment_status)); ?>

                                        <?php else: ?>
                                            <i class="mdi mdi-circle text-danger"></i>
                                            <?php echo e(ucfirst($order->payment_status)); ?>

                                        <?php endif; ?>
                                    </td>

                                    <td><?php echo e(!empty($order->total_coupon_used)? (!empty($order->total_coupon_used->coupon_detail)? $order->total_coupon_used->coupon_detail->code: '-'): '-'); ?>

                                    </td>

                                    <td class="text-center">
                                        <?php if($order->receipt != 'free coupon' && $order->payment_type == 'STRIPE'): ?>
                                            <a href="<?php echo e($order->receipt); ?>" title="Invoice" target="_blank"
                                               class=""><i class="fas fa-file-invoice"></i> </a>
                                        <?php elseif($order->receipt == 'free coupon'): ?>
                                            <p><?php echo e(__('Used') . '100 %' . __('discount coupon code.')); ?></p>
                                        <?php elseif($order->payment_type == 'Manually'): ?>
                                            <p><?php echo e(__('Manually plan upgraded by super admin')); ?></p>
                                        <?php elseif($order->payment_type == 'Bank Transfer'): ?>
                                            <a href="<?php echo e(asset($order->receipt)); ?>" class="btn  btn-outline-primary" target="_blank">
                                                <i class="fas fa-file-invoice"></i>
                                            </a>
                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                    <?php if(\Auth::user()->type == "superadmin"): ?>
                                        <td class="text-center">
                                            <?php if($order->payment_status == 'Pending' && $order->payment_type == 'Bank Transfer'): ?>
                                                <button class="btn btn-sm btn-primary me-2"
                                                    data-url="<?php echo e(route('admin.order.show', $order->id)); ?>" data-size="lg"
                                                    data-ajax-popup="true" data-title="<?php echo e(__('Payment Status')); ?>" title="<?php echo e(__('Details')); ?>">
                                                    <i class="ti ti-caret-right" data-bs-toggle="tooltip" title="edit"></i>
                                                </button>
                                            <?php endif; ?>
                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['admin.bank_transfer.destroy', $order->id], 'class' => 'd-inline']); ?>

                                            <button type="button" class="btn btn-sm btn-danger show_confirm">
                                                <i class="ti ti-trash text-white py-1" data-bs-toggle="tooltip"
                                                    title="Delete"></i>
                                            </button>
                                            <?php echo Form::close(); ?>

                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

    <?php $__env->startPush('custom-script'); ?>


    <?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ayman/Downloads/AnaLive/resources/views/plans/index.blade.php ENDPATH**/ ?>