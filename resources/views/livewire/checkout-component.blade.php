<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Checkout
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-sm-15">

                        <div class="panel-collapse collapse login_form" id="loginform">
                            <div class="panel-body">
                                <p class="mb-30 font-sm">If you have shopped with us before, please enter your details
                                    below. If you are a new customer, please proceed to the Billing &amp; Shipping
                                    section.</p>
                                <form method="post">
                                    <div class="form-group">
                                        <input type="text" name="email" placeholder="Username Or Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" placeholder="Password">
                                    </div>
                                    <div class="login_footer form-group">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="checkbox"
                                                    id="remember" value="">
                                                <label class="form-check-label" for="remember"><span>Remember
                                                        me</span></label>
                                            </div>
                                        </div>
                                        <a href="#">Forgot password?</a>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-md" name="login">Log in</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="toggle_info">
                            <span><i class="fi-rs-label mr-10"></i><span class="text-muted">Have a coupon?</span> <a
                                    href="#coupon" data-bs-toggle="collapse" class="collapsed"
                                    aria-expanded="false">Click here to enter your code</a></span>
                        </div>
                        <div class="panel-collapse collapse coupon_form " id="coupon">
                            <div class="panel-body">
                                <p class="mb-30 font-sm">If you have a coupon code, please apply it below.</p>
                                <form method="post">
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter Coupon Code...">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn  btn-md" name="login">Apply Coupon</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="divider mt-50 mb-50"></div>
                    </div>
                </div>

                <form wire:submit.prevent="placeOrder">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="mb-25">
                                <h4>Billing Details</h4>
                            </div>
                            <div class="form-group">

                                <input type="text" required name="firstname" wire:model="firstname"
                                    placeholder="Name *">
                            </div>
                            <div class="form-group">
                                <input required type="text" name="mobile" wire:model="mobile" placeholder="Phone *">
                            </div>
                            <div class="form-group">
                                <input required type="email" name="email" wire:model="email"
                                    placeholder="Email address *">
                            </div>
                            <div class="form-group">
                                <input type="text" name="line1" required wire:model="line1" placeholder="Address">
                            </div>
                            <!-- <div class="form-group">
                                <div class="checkbox">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox"
                                            id="createaccount">
                                        <label class="form-check-label label_info" data-bs-toggle="collapse"
                                            href="#collapsePassword" data-target="#collapsePassword"
                                            aria-controls="collapsePassword" for="createaccount"><span>Create an
                                                account?</span></label>
                                    </div>
                                </div>
                            </div>
                            <div id="collapsePassword" class="form-group create-account collapse in">
                                <input required="" type="password" placeholder="Password" name="password">
                            </div>
                            <div class="mb-20">
                                <h5>Additional information</h5>
                            </div>
                            <div class="form-group mb-30">
                                <textarea rows="5" placeholder="Order notes"></textarea>
                            </div>-->

                        </div>
                        <div class="col-md-6">
                            <div class="order_review">
                                <div class="mb-20">
                                    <h4>Your Order</h4>
                                </div>
                                <div class="table-responsive order_table text-center">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Product</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (Cart::content() as $item)
                                                <tr>
                                                    <td class="image product-thumbnail"><img
                                                            src="{{ asset('assets/imgs/shop') }}/{{ $item->model->image }}"
                                                            alt="{{ $item->name }}"></td>
                                                    <td>
                                                        <h5><a href="product-details.html">{{ $item->name }}</a>
                                                        </h5>
                                                        <span class="product-qty">x {{ $item->qty }}</span>
                                                    </td>
                                                    <td>${{ $item->price }}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <th>SubTotal</th>
                                                <td class="product-subtotal" colspan="2">${{ Cart::subtotal() }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Shipping</th>
                                                <td colspan="2"><em>Free Shipping</em></td>
                                            </tr>
                                            <tr>
                                                <th>Total</th>
                                                <td colspan="2" class="product-subtotal"><span
                                                        class="font-xl text-brand fw-900">${{ Cart::total() }}</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                <div class="payment_method">
                                    <div class="mb-25">
                                        <h5>Payment</h5>
                                    </div>
                                    <div class="payment_option">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" wire:model="payment_type"
                                                name="payment_type" id="cod" value="cod" required>
                                            <label class="form-check-label" for="cod">
                                                Cash On Delivery</label>

                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="payment_type"
                                                id="fatora" wire:model="payment_type" value="fatora" required>
                                            <label class="form-check-label" for="fatora">
                                                Card Payment (My Fatorah)</label>

                                        </div>
                                    </div>
                                </div>


                            </div>
                            <button type="submit" class="btn btn-fill-out btn-block mt-30">Place
                                Order</button>
                        </div>
                    </div>


                </form>
            </div>
        </section>
    </main>
</div>
