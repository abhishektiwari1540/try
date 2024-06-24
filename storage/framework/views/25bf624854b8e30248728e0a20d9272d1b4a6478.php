<?php $__env->startSection('content'); ?>

    <section class="page-content">
        <div class="container">
            <div class="checkoutClasses">

                <div class="checkoutSteps">
                    <div class="checkoutHeader">
                        <div class="AddFormBar">
                            <ul id="progressbar">
                                <li class="complete">Billing Details</li>
                                <li class="act ive">Payment</li>
                                <li class="">Confirm</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="cart-coupon-bar">
                    <div class="cart-coupon-text check-icon">
                        One to one session with Umang has been added to your cart
                    </div>
                    <a href="<?php echo e(route('front.classes')); ?>" class="default-btn">Continue Shopping</a>
                </div>

                <div class="cart-coupon-bar">
                    <div class="cart-coupon-text coupon-icon">
                        Have a coupon? <a href="javascript:void(0)" class="showcoupon" data-bs-toggle="collapse"
                            data-bs-target="#filterSearch" aria-expanded="false" aria-controls="filterSearch">Click here
                            to enter your code</a>
                    </div>
                </div>

                <!-- Coupon -->
                <div class="collapse" id="filterSearch">
                    <div class="coupon-block">
                        <div class="coupon-label">If you have a coupon code, please apply it below.</div>
                        <div class="flex-coupon">
                            <div class="form-group mb-3">
                                <input type="text" class="form-control">
                            </div>
                            <div class="coupon-btn"> <button type="submit" class="default-btn btn-coupon">Apply
                                    Coupon</button></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 border-right">
                        <div class="form-h2">Billing Details</div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">First Name <span>*</span></label>
                                    <input type="text" class="form-control" id="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Last Name <span>*</span></label>
                                    <input type="text" class="form-control" id="">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">Country / Region <span>*</span></label>
                                    <select class="form-select form-cotrol">
                                        <option selected>Select</option>
                                        <option value="1">India</option>
                                        <option value="2">UK</option>
                                        <option value="3">USA</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">Street Address <span>*</span></label>
                                    <input type="text" class="form-control mb-4" id="">
                                    <input type="text" class="form-control" id="">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">Town / City <span>*</span></label>
                                    <select class="form-select form-cotrol">
                                        <option selected>Select</option>
                                        <option value="1">India</option>
                                        <option value="2">UK</option>
                                        <option value="3">USA</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">State <span>*</span></label>
                                    <input type="text" class="form-control" id="">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">PIN <span>*</span></label>
                                    <input type="text" class="form-control" id="">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">Phone <span>*</span></label>
                                    <input type="text" class="form-control" id="">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">Email Address <span>*</span></label>
                                    <input type="email" class="form-control" id="">
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="col-md-6 woocommerce border-left">
                        <div class="form-h2">Your Order</div>

                        <div id="order_review" class="woocommerce-checkout-review-order">
                            <table class="shop_table woocommerce-checkout-review-order-table table-responsive">
                                <thead>
                                    <tr>
                                        <th colspan="2" class="product-name" style="border: 0;">Product</th>
                                        <th class="product-total" style="border: 0;">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="cart_item">
                                        <td class="product-name" colspan="2">
                                            One to one session with Umang x 3 </td>
                                        <td class="product-total">$ 450.00 </td>
                                    </tr>
                                    <tr class="cart_item">
                                        <td class="product-name" colspan="2">
                                            OB Test x 3 </td>
                                        <td class="product-total">$ 3.00</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <th class="blankCol" style="border: 0;"></th>
                                        <th style="border-bottom-width:1px; text-align: right;">Subtotal</th>
                                        <td>$ 453.00
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <th class="blankCol" style="border: 0;"></th>
                                        <th style="border-bottom-width:1px;text-align: right;">Total</th>
                                        <td>$ 453.00
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>

                            <div id="payment" class=" woocommerce-checkout-payment">

                                <div class="payment_method_paypal">
                                    <div class="form-group mb-0 custom_radio paypal-paycards">
                                        <input type="radio" checked="checked" id="paypal" name="radio-group">
                                        <label for="paypal"> USD/Euro/ Other Currencies</label>
                                        <div class="paypal-cards"><img src="<?php echo e(asset('frontend/img/paycards.jpg')); ?>"
                                                alt="PayPal acceptance mark" class="paypal-img"></div>
                                    </div>

                                    <div class="payment_method_paypal_hint">
                                        Pay via PayPal; you can pay with your credit card if you don’t have a
                                        PayPal account.
                                    </div>
                                </div>

                                <div class="form-row place-order">
                                    <div class="conditions-wrapper">
                                            <p>Your personal data will be used to process your order, support your
                                                experience throughout this website, and for other purposes described in
                                                our privacy policy. <a href="<?php echo e(route('front.privacy_policy')); ?>"
                                                    target="_blank">privacy policy</a>.</p>

                                    </div>

                                    <div class="payapl-btn text-end">
                                        <button type="submit" class="default-btn" id="place_order" value="Place order"
                                            data-value="Place order">Proceed to
                                            PayPal</button>

                                        <input type="hidden" id="" name="" value=""><input type="hidden" name=""
                                            value="">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- checkoutClasses END -->


        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ymp/web/ymp.dev.obdemo.com/public_html/resources/views/frontend/checkout-classes.blade.php ENDPATH**/ ?>