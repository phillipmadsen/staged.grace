@extends('frontend/layout/secure')
@section('htmlschema')@endsection
@section('seo')@endsection
@section('jsonschema')@endsection

@section('title')
Checkout Process | Secure Area
@endsection

@section('bodyschema')@endsection
@section('header_styles')@endsection
@section('scripts')@endsection
@section('ppscripts')@endsection
@section('submenu')@endsection
@section('slider')@endsection
@section('intro')@endsection

@section('page-title')

<section id="page-title">

    <div class="container clearfix">
        <h1>Checkout</h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Shop</a></li>
         {{--    <li><a href="#">Cart</a></li> --}}
            <li class="active">Checkout</li>
        </ol>
    </div>

</section><!-- #page-title end -->

@endsection

@section('sidebar')@endsection

@section('content')
        <section id="content">

            <div class="content-wrap">

                <div class="container clearfix">

                    <div class="col_half">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                Returning customer? <a href="login-register.html">Click here to login</a>
                            </div>
                        </div>
                    </div>
                    <div class="col_half col_last">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                Have a coupon? <a href="login-register.html">Click here to enter your code</a>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <h3>Billing Address</h3>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, vel odio non dicta provident sint ex autem mollitia dolorem illum repellat ipsum aliquid illo similique sapiente fugiat minus ratione.</p>

                            <form id="billing-form" name="billing-form" class="nobottommargin" action="#" method="post">

                                <div class="col_half">
                                    <label for="billing-form-name">Name:</label>
                                    <input type="text" id="billing-form-name" name="billing-form-name" value="" class="sm-form-control" />
                                </div>

                                <div class="col_half col_last">
                                    <label for="billing-form-lname">Last Name:</label>
                                    <input type="text" id="billing-form-lname" name="billing-form-lname" value="" class="sm-form-control" />
                                </div>

                                <div class="clear"></div>

                                <div class="col_full">
                                    <label for="billing-form-companyname">Company Name:</label>
                                    <input type="text" id="billing-form-companyname" name="billing-form-companyname" value="" class="sm-form-control" />
                                </div>

                                <div class="col_full">
                                    <label for="billing-form-address">Address:</label>
                                    <input type="text" id="billing-form-address" name="billing-form-address" value="" class="sm-form-control" />
                                </div>

                                <div class="col_full">
                                    <input type="text" id="billing-form-address2" name="billing-form-adress" value="" class="sm-form-control" />
                                </div>

                                <div class="col_full">
                                    <label for="billing-form-city">City / Town</label>
                                    <input type="text" id="billing-form-city" name="billing-form-city" value="" class="sm-form-control" />
                                </div>

                                <div class="col_half">
                                    <label for="billing-form-email">Email Address:</label>
                                    <input type="email" id="billing-form-email" name="billing-form-email" value="" class="sm-form-control" />
                                </div>

                                <div class="col_half col_last">
                                    <label for="billing-form-phone">Phone:</label>
                                    <input type="text" id="billing-form-phone" name="billing-form-phone" value="" class="sm-form-control" />
                                </div>

                            </form>
                        </div>
                        <div class="col-md-6">
                            <h3 class="">Shipping Address</h3>

                            <form id="shipping-form" name="shipping-form" class="nobottommargin" action="#" method="post">

                                <div class="col_half">
                                    <label for="shipping-form-name">Name:</label>
                                    <input type="text" id="shipping-form-name" name="shipping-form-name" value="" class="sm-form-control" />
                                </div>

                                <div class="col_half col_last">
                                    <label for="shipping-form-lname">Last Name:</label>
                                    <input type="text" id="shipping-form-lname" name="shipping-form-lname" value="" class="sm-form-control" />
                                </div>

                                <div class="clear"></div>

                                <div class="col_full">
                                    <label for="shipping-form-companyname">Company Name:</label>
                                    <input type="text" id="shipping-form-companyname" name="shipping-form-companyname" value="" class="sm-form-control" />
                                </div>

                                <div class="col_full">
                                    <label for="shipping-form-address">Address:</label>
                                    <input type="text" id="shipping-form-address" name="shipping-form-address" value="" class="sm-form-control" />
                                </div>

                                <div class="col_full">
                                    <input type="text" id="shipping-form-address2" name="shipping-form-adress" value="" class="sm-form-control" />
                                </div>

                                <div class="col_full">
                                    <label for="shipping-form-city">City / Town</label>
                                    <input type="text" id="shipping-form-city" name="shipping-form-city" value="" class="sm-form-control" />
                                </div>

                                <div class="col_full">
                                    <label for="shipping-form-message">Notes <small>*</small></label>
                                    <textarea class="sm-form-control" id="shipping-form-message" name="shipping-form-message" rows="6" cols="30"></textarea>
                                </div>

                            </form>
                        </div>
                        <div class="clear bottommargin"></div>
                        <div class="col-md-6">
                            <div class="table-responsive clearfix">
                                <h4>Your Orders</h4>

                                <table class="table cart">
                                    <thead>
                                        <tr>
                                            <th class="cart-product-thumbnail">&nbsp;</th>
                                            <th class="cart-product-name">Product</th>
                                            <th class="cart-product-quantity">Quantity</th>
                                            <th class="cart-product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="cart_item">
                                            <td class="cart-product-thumbnail">
                                                <a href="#"><img width="64" height="64" src="http://www.placehold.it/64x64/EFEFEF/AAAAAA" alt="Pink Printed Dress"></a>
                                            </td>

                                            <td class="cart-product-name">
                                                <a href="#">Pink Printed Dress</a>
                                            </td>

                                            <td class="cart-product-quantity">
                                                <div class="quantity clearfix">
                                                    1x2
                                                </div>
                                            </td>

                                            <td class="cart-product-subtotal">
                                                <span class="amount">$39.98</span>
                                            </td>
                                        </tr>
                                        <tr class="cart_item">
                                            <td class="cart-product-thumbnail">
                                                <a href="#"><img width="64" height="64" src="http://www.placehold.it/64x64/EFEFEF/AAAAAA" alt="Checked Canvas Shoes"></a>
                                            </td>

                                            <td class="cart-product-name">
                                                <a href="#">Checked Canvas Shoes</a>
                                            </td>

                                            <td class="cart-product-quantity">
                                                <div class="quantity clearfix">
                                                    1x1
                                                </div>
                                            </td>

                                            <td class="cart-product-subtotal">
                                                <span class="amount">$24.99</span>
                                            </td>
                                        </tr>
                                        <tr class="cart_item">
                                            <td class="cart-product-thumbnail">
                                                <a href="#"><img width="64" height="64" src="http://www.placehold.it/64x64/EFEFEF/AAAAAA" alt="Pink Printed Dress"></a>
                                            </td>

                                            <td class="cart-product-name">
                                                <a href="#">Blue Men Tshirt</a>
                                            </td>

                                            <td class="cart-product-quantity">
                                                <div class="quantity clearfix">
                                                    1x3
                                                </div>
                                            </td>

                                            <td class="cart-product-subtotal">
                                                <span class="amount">$41.97</span>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="table-responsive">
                                <h4>Cart Totals</h4>

                                <table class="table cart">
                                    <tbody>
                                        <tr class="cart_item">
                                            <td class="notopborder cart-product-name">
                                                <strong>Cart Subtotal</strong>
                                            </td>

                                            <td class="notopborder cart-product-name">
                                                <span class="amount">$106.94</span>
                                            </td>
                                        </tr>
                                        <tr class="cart_item">
                                            <td class="cart-product-name">
                                                <strong>Shipping</strong>
                                            </td>

                                            <td class="cart-product-name">
                                                <span class="amount">Free Delivery</span>
                                            </td>
                                        </tr>
                                        <tr class="cart_item">
                                            <td class="cart-product-name">
                                                <strong>Total</strong>
                                            </td>

                                            <td class="cart-product-name">
                                                <span class="amount color lead"><strong>$106.94</strong></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                            <div class="accordion clearfix">
                                <div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>Direct Bank Transfer</div>
                                <div class="acc_content clearfix">Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</div>

                                <div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>Cheque Payment</div>
                                <div class="acc_content clearfix">Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus. Aenean lacinia bibendum nulla sed consectetur. Cras mattis consectetur purus sit amet fermentum.</div>

                                <div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>Paypal</div>
                                <div class="acc_content clearfix">Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus. Aenean lacinia bibendum nulla sed consectetur.</div>
                            </div>
                            <a href="#" class="button button-3d fright">Place Order</a>
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- #content end -->
@endsection

@section('footer_scripts')@endsection
@section('pp_footer_scripts')