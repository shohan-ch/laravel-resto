@extends('front-end.layout.master')


@section('content')


{{-- {{ dd( \App\Models\DeliveryFee::all())  }} --}}

<div class="pb-5" style="margin-top: 170px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

                @if(session('success'))
                <p class="text-info font-weight-bold bg-info p-2 text-light"> {{ session('success') }} </p>

                @endif
                <p class="text-info font-weight-bold"> {{ Cart::count() }}</p>

                <!-- Shopping cart table -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="p-2 px-3 text-uppercase">Product</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Price</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Quantity</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Remove</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- {{  dump(Cart::content()) }} --}}
                            @foreach (Cart::content() as $item )

                            <tr>
                                <th scope="row" class="border-0">
                                    <div class="p-2">
                                        <img src="https://res.cloudinary.com/mhmd/image/upload/v1556670479/product-1_zrifhn.jpg"
                                            alt="" width="70" class="img-fluid rounded shadow-sm">
                                        <div class="ml-3 d-inline-block align-middle">
                                            <h5 class="mb-0"> <a href="#"
                                                    class="text-dark d-inline-block align-middle">{{ $item->model->name }}</a>
                                            </h5>
                                        </div>
                                    </div>
                                </th>
                                <td class="border-0 align-middle"><strong>{{ $item->model->price }}</strong></td>
                                <td class="border-0 align-middle">

                                    <form action="{{ route('cart.itemDecrement', $item->rowId) }}" method="POST"
                                        style="display: inline-block !important;" id="itemDecrementForm">
                                        @csrf
                                        @method('put')
                                        {{-- <a onclick="document.getElementById('itemDecrementForm').submit()">-</a> --}}
                                        <button class="btn btn-sm" type="submit">-</button>

                                    </form>
                                    <span class="font-weight-bold p-1">{{ $item->qty }}</span>
                                    <form action="{{ route('cart.itemIncrement', $item->rowId) }}" method="POST"
                                        style="display: inline-block !important;" id="itemIncrementForm">
                                        @csrf
                                        @method('put')
                                        {{-- <input type="hidden" name="quantity" value="1"> --}}
                                        {{-- <a href="#"
                                            onclick="document.getElementById('itemIncrementForm').submit()">+</a> --}}
                                        <button class="btn btn-sm" type="submit">+</button>

                                    </form>




                                </td>
                                <td class="border-0 align-middle">

                                    <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="text-dark btn">
                                            <i class="icofont-trash"></i>
                                        </button>

                                    </form>

                                </td>
                            </tr>

                            @endforeach


                        </tbody>
                    </table>
                </div>
                <!-- End -->

                <div class="row">

                    <div class="col-lg-6">
                        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold text-dark">Coupon
                            code</div>
                        <div class="p-4">
                            <p class="font-italic mb-4">If you have a coupon code, please enter it in the box below</p>
                            <div class="input-group mb-4 border rounded-pill p-2">
                                <input type="text" placeholder="Apply coupon" aria-describedby="button-addon3"
                                    class="form-control border-0">
                                <div class="input-group-append border-0">
                                    <button id="button-addon3" type="button" class="btn btn-dark px-4 rounded-pill"><i
                                            class="fa fa-gift mr-2"></i>Apply coupon</button>
                                </div>
                            </div>
                        </div>
                        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold text-dark">
                            Instructions for
                            seller
                        </div>
                        <div class="p-4">
                            <p class="font-italic mb-4 text-muted">If you have some information for the seller you can
                                leave them
                                in
                                the box below</p>
                            <textarea name="" cols="30" rows="2" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold text-dark">Order
                            summary
                        </div>
                        <div class="p-4">
                            <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you
                                have entered.</p>
                            <ul class="list-unstyled mb-4">
                                <li class="d-flex justify-content-between py-3 border-bottom text-dark"><strong
                                        class="text-muted">Order
                                        Subtotal </strong><strong>{{ Cart::subtotal() }}</strong></li>
                                <li class="d-flex justify-content-between py-3 border-bottom text-dark"><strong
                                        class="text-muted">Delivery
                                        fee</strong>


                                    @foreach ( \App\Models\DeliveryFee::all() as $delivery )

                                    @if(Cart::count()=== $delivery->quantity )

                                    <strong>{{ $delivery->charges }}</strong></li>



                                <li class="d-flex justify-content-between py-3 border-bottom text-dark"><strong
                                        class="text-muted">Vat (7.5%)</strong><strong>{{ Cart::tax() }}</strong></li>
                                <li class="d-flex justify-content-between py-3 border-bottom text-dark"><strong
                                        class="text-muted">Total</strong>
                                    <h5 class="font-weight-bold">{{ Cart::total() + $delivery->charges }}</h5>
                                </li>

                                @endif

                                @endforeach
                            </ul><a href="#" class="btn btn-dark rounded-pill py-2 btn-block">Procceed to checkout</a>
                        </div>

                    </div>
                    {{-- @endforeach --}}


                </div>




            </div>
        </div>




    </div>
</div>









@endsection