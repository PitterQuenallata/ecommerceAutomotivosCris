<?php
?>
<div class="body-wrapper">
  <div class="container-fluid">
    
    <?php include "modules/cabecera.php" ?>

    <div class="checkout">
      <div class="card shadow-none border">
        <div class="card-body p-4">
          <div class="wizard-content">
            <form action="#" class="tab-wizard wizard-circle">
              <!-- Step 1 -->
              <h6>Cart</h6>
              <section>
                <div class="table-responsive">
                  <table class="table align-middle text-nowrap mb-0">
                    <thead class="fs-2">
                      <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-end">Price</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="border-bottom-0">
                          <div class="d-flex align-items-center gap-3">
                            <img src="<?php $path ?>views/dist/images/products/s11.jpg" alt="" class="img-fluid rounded" width="80">
                            <div>
                              <h6 class="fw-semibold fs-4 mb-0">Cute Soft Teddybear</h6>
                              <p class="mb-0">toys</p>
                              <a href="javascript:void(0)" class="text-danger fs-4"><i class="ti ti-trash"></i></a>
                            </div>
                          </div>
                        </td>
                        <td class="border-bottom-0">
                          <div class="input-group input-group-sm rounded">
                            <button class="btn minus min-width-40 py-0 border-end border-success border-end-0 text-success" type="button" id="add1"><i class="ti ti-minus"></i></button>
                            <input type="text" class="min-width-40 flex-grow-0 border border-success text-success fs-3 fw-semibold form-control text-center qty" placeholder="" aria-label="Example text with button addon" aria-describedby="add1" value="1">
                            <button class="btn min-width-40 py-0 border border-success border-start-0 text-success add" type="button" id="addo2"><i class="ti ti-plus"></i></button>
                          </div>
                        </td>
                        <td class="text-end border-bottom-0">
                          <h6 class="fs-4 fw-semibold mb-0">$285</h6>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="order-summary border rounded p-4 my-4">
                  <div class="p-3">
                    <h5 class="fs-5 fw-semibold mb-4">Order Summary</h5>
                    <div class="d-flex justify-content-between mb-4">
                      <p class="mb-0 fs-4">Sub Total</p>
                      <h6 class="mb-0 fs-4 fw-semibold">$285</h6>
                    </div>
                    <div class="d-flex justify-content-between mb-4">
                      <p class="mb-0 fs-4">Discount 5%</p>
                      <h6 class="mb-0 fs-4 fw-semibold text-danger">-$14</h6>
                    </div>
                    <div class="d-flex justify-content-between mb-4">
                      <p class="mb-0 fs-4">Shipping</p>
                      <h6 class="mb-0 fs-4 fw-semibold">Free</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                      <h6 class="mb-0 fs-4 fw-semibold">Total</h6>
                      <h6 class="mb-0 fs-5 fw-semibold">$271</h6>
                    </div>
                  </div>
                </div>
              </section>
              <!-- Step 2 -->
              <h6>Billing & address</h6>
              <section>
                <div class="billing-address-content">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="card shadow-none border">
                        <div class="card-body p-4">
                          <h6 class="mb-3 fs-4 fw-semibold">Johnathan Doe</h6>
                          <p class="mb-1 fs-2">E601 Vrundavan Heights, godrej garden city - 382481</p>
                          <h6 class="d-flex align-items-center gap-2 my-4 fw-semibold fs-4"><i class="ti ti-device-mobile fs-7"></i>9999501050</h6>
                          <a href="javascript:void(0)" class="btn btn-outline-primary  billing-address">Deliver To this address</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="card shadow-none border">
                        <div class="card-body p-4">
                          <h6 class="mb-3 fs-4 fw-semibold">ParleG Doe</h6>
                          <p class="mb-1 fs-2">D201 Galexy Heights, godrej garden city - 382481</p>
                          <h6 class="d-flex align-items-center gap-2 my-4 fw-semibold fs-4"><i class="ti ti-device-mobile fs-7"></i>9999501050</h6>
                          <a href="javascript:void(0)" class="btn btn-outline-primary  billing-address">Deliver To this address</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="card shadow-none border">
                        <div class="card-body p-4">
                          <h6 class="mb-3 fs-4 fw-semibold">Guddu Bhaiya</h6>
                          <p class="mb-1 fs-2">Mumbai khao gali, Behind shukan, godrej garden city - 382481</p>
                          <h6 class="d-flex align-items-center gap-2 my-4 fw-semibold fs-4"><i class="ti ti-device-mobile fs-7"></i>9999501050</h6>
                          <a href="javascript:void(0)" class="btn btn-outline-primary  billing-address">Deliver To this address</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="order-summary border rounded p-4 my-4">
                    <div class="p-3">
                      <h5 class="fs-5 fw-semibold mb-4">Order Summary</h5>
                      <div class="d-flex justify-content-between mb-4">
                        <p class="mb-0 fs-4">Sub Total</p>
                        <h6 class="mb-0 fs-4 fw-semibold">$285</h6>
                      </div>
                      <div class="d-flex justify-content-between mb-4">
                        <p class="mb-0 fs-4">Discount 5%</p>
                        <h6 class="mb-0 fs-4 fw-semibold text-danger">-$14</h6>
                      </div>
                      <div class="d-flex justify-content-between mb-4">
                        <p class="mb-0 fs-4">Shipping</p>
                        <h6 class="mb-0 fs-4 fw-semibold">Free</h6>
                      </div>
                      <div class="d-flex justify-content-between">
                        <h6 class="mb-0 fs-4 fw-semibold">Total</h6>
                        <h6 class="mb-0 fs-5 fw-semibold">$271</h6>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="payment-method-list payment-method">
                  <div class="delivery-option btn-group-active  card shadow-none border">
                    <div class="card-body p-4">
                      <h6 class="mb-3 fw-semibold fs-4">Delivery Option</h6>
                      <div class="btn-group row w-100" role="group" aria-label="Basic radio toggle button group">
                        <div class="position-relative col-lg-6">
                          <input type="radio" class="btn-check z-1 top-50 start-0 ms-4 round-16" name="deliveryOpt1" id="btnradio1" autocomplete="off" checked>
                          <label class="btn btn-outline-primary mb-0 p-3 rounded ps-5 w-100" for="btnradio1">
                            <div class="text-start ps-2">
                              <h6 class="fs-4 fw-semibold mb-0">Free delivery</h6>
                              <p class="mb-0 text-muted">Delivered on Firday, May 10</p>
                            </div>
                          </label>
                        </div>
                        <div class="position-relative col-lg-6">
                          <input type="radio" class="btn-check z-1 top-50 start-0 ms-4 round-16" name="deliveryOpt1" id="btnradio2" autocomplete="off">
                          <label class="btn btn-outline-primary mb-0 p-3 rounded ps-5 w-100" for="btnradio2">
                            <div class="text-start ps-2">
                              <h6 class="fs-4 fw-semibold mb-0">Fast delivery ($2,00)</h6>
                              <p class="mb-0 text-muted">Delivered on Wednesday, May 8</p>
                            </div>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="payment-option btn-group-active  card shadow-none border">
                    <div class="card-body p-4">
                      <h6 class="mb-3 fw-semibold fs-4">Payment Option</h6>
                      <div class="row">
                        <div class="col-lg-8">
                          <div class="btn-group row" role="group" aria-label="Basic radio toggle button group">
                            <div class="position-relative col-12 mb-3">
                              <input type="radio" class="btn-check z-1 top-50 start-0 ms-4 round-16" name="paymentType1" id="btnradio3" autocomplete="off" checked>
                              <label class="btn btn-outline-primary mb-0 p-3 rounded ps-5 w-100" for="btnradio3">
                                <div class="d-flex align-items-center">
                                  <div class="text-start ps-2">
                                    <h6 class="fs-4 fw-semibold mb-0">Pay with Paypal</h6>
                                    <p class="mb-0 text-muted">You will be redirected to PayPal website to complete your purchase securely.</p>
                                  </div>
                                  <img src="<?php $path ?>views/dist/images/svgs/paypal.svg" alt="" class="img-fluid ms-auto">
                                </div>
                              </label>
                            </div>
                            <div class="position-relative col-12 mb-3">
                              <input type="radio" class="btn-check z-1 top-50 start-0 ms-4 round-16" name="paymentType1" id="btnradio4" autocomplete="off">
                              <label class="btn btn-outline-primary mb-0 p-3 rounded ps-5 w-100" for="btnradio4">
                                <div class="d-flex align-items-center">
                                  <div class="text-start ps-2">
                                    <h6 class="fs-4 fw-semibold mb-0">Credit / Debit Card</h6>
                                    <p class="mb-0 text-muted">We support Mastercard, Visa, Discover and Stripe.</p>
                                  </div>
                                  <img src="<?php $path ?>views/dist/images/svgs/mastercard.svg" alt="" class="img-fluid ms-auto">
                                </div>
                              </label>
                            </div>
                            <div class="position-relative col-12">
                              <input type="radio" class="btn-check z-1 top-50 start-0 ms-4 round-16" name="paymentType1" id="btnradio5" autocomplete="off">
                              <label class="btn btn-outline-primary mb-0 p-3 rounded ps-5 w-100" for="btnradio5">
                                <div class="text-start ps-2">
                                  <h6 class="fs-4 fw-semibold mb-0">Cash on Delivery</h6>
                                  <p class="mb-0 text-muted">Pay with cash when your order is delivered.</p>
                                </div>
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <img src="<?php $path ?>views/dist/images/products/payment.svg" alt="" class="img-fluid">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="order-summary border rounded p-4 my-4">
                    <div class="p-3">
                      <h5 class="fs-5 fw-semibold mb-4">Order Summary</h5>
                      <div class="d-flex justify-content-between mb-4">
                        <p class="mb-0 fs-4">Sub Total</p>
                        <h6 class="mb-0 fs-4 fw-semibold">$285</h6>
                      </div>
                      <div class="d-flex justify-content-between mb-4">
                        <p class="mb-0 fs-4">Discount 5%</p>
                        <h6 class="mb-0 fs-4 fw-semibold text-danger">-$14</h6>
                      </div>
                      <div class="d-flex justify-content-between mb-4">
                        <p class="mb-0 fs-4">Shipping</p>
                        <h6 class="mb-0 fs-4 fw-semibold">Free</h6>
                      </div>
                      <div class="d-flex justify-content-between">
                        <h6 class="mb-0 fs-4 fw-semibold">Total</h6>
                        <h6 class="mb-0 fs-5 fw-semibold">$271</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
              <!-- Step 3 -->
              <h6>Payment</h6>
              <section class="payment-method text-center">
                <h5 class="fw-semibold fs-5">Thank you for your purchase!</h5>
                <h6 class="fw-semibold text-primary mb-7">Your order id: 3fa7-69e1-79b4-dbe0d35f5f5d</h6>
                <img src="<?php $path ?>views/dist/images/products/payment-complete.gif" alt="" class="img-fluid mb-4" width="300">
                <p class="mb-0 fs-2">We will send you a notification<br>within 2 days when it ships.</p>
                <div class="d-sm-flex align-items-center justify-content-between my-4">
                  <a href="./eco-checkout.html" class="btn btn-success d-block mb-2 mb-sm-0">Continue Shopping</a>
                  <a href="javascript:void(0)" class="btn btn-primary d-block">Download Receipt</a>
                </div>
              </section>
            </form>
          </div>
          <!-- <div class="text-center my-4">
                  <img src="<?php $path ?>views/dist/images/products/empty-shopping-bag.gif" alt="" class="img-fluid" width="200">
                  <h5 class="mb-3 fw-semibold fs-5">Cart is Empty</h5>
                  <a href="./shop.html" class="btn btn-primary">Go back to Shopping</a>
                </div> -->
        </div>
      </div>
    </div>
  </div>
</div>


<script src="<?php $path ?>views/dist/libs/jquery-steps/build/jquery.steps.min.js"></script>
<script src="<?php $path ?>views/dist/libs/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="<?php $path ?>views/dist/js/forms/form-wizard.js"></script>