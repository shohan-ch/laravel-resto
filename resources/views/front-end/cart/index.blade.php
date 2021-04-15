@extends('front-end.layout.master')


@section('content')





<div class="pb-5" style="margin-top: 170px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

                @if(session('success'))
                <p class="text-info font-weight-bold"> {{ session('success') }} </p>

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

                            @foreach (Cart::content() as $item )


                            <tr>
                                <th scope="row" class="border-0">
                                    <div class="p-2">
                                        <img src="https://res.cloudinary.com/mhmd/image/upload/v1556670479/product-1_zrifhn.jpg"
                                            alt="" width="70" class="img-fluid rounded shadow-sm">
                                        <div class="ml-3 d-inline-block align-middle">
                                            <h5 class="mb-0"> <a href="#"
                                                    class="text-dark d-inline-block align-middle">{{ $item->name }}</a>
                                            </h5>
                                            {{-- <span
                                                class="text-muted font-weight-normal font-italic d-block">Category:
                                                Watches</span> --}}
                                        </div>
                                    </div>
                                </th>
                                <td class="border-0 align-middle"><strong>{{ $item->price }}</strong></td>
                                <td class="border-0 align-middle">
                                    <a href="#">-</a><a href="#" class="border p-1">3</a><a href="#">+</a>


                                </td>
                                <td class="border-0 align-middle"><a href="#" class="text-dark">
                                        <i class="icofont-trash"></i></a></td>
                            </tr>

                            @endforeach



                            <tr>
                                <th scope="row">
                                    <div class="p-2">
                                        <img src="https://res.cloudinary.com/mhmd/image/upload/v1556670479/product-3_cexmhn.jpg"
                                            alt="" width="70" class="img-fluid rounded shadow-sm">
                                        <div class="ml-3 d-inline-block align-middle">
                                            <h5 class="mb-0"><a href="#" class="text-dark d-inline-block">Lumix
                                                    camera lense</a></h5><span
                                                class="text-muted font-weight-normal font-italic">Category:
                                                Electronics</span>
                                        </div>
                                    </div>
                                </th>
                                <td class="align-middle"><strong>$79.00</strong></td>
                                <td class="align-middle"><strong>3</strong></td>
                                <td class="align-middle"><a href="#" class="text-dark"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="p-2">
                                        <img src="https://res.cloudinary.com/mhmd/image/upload/v1556670479/product-2_qxjis2.jpg"
                                            alt="" width="70" class="img-fluid rounded shadow-sm">
                                        <div class="ml-3 d-inline-block align-middle">
                                            <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block">Gray Nike
                                                    running shoe</a></h5><span
                                                class="text-muted font-weight-normal font-italic">Category:
                                                Fashion</span>
                                        </div>
                                    </div>
                                <td class="align-middle"><strong>$79.00</strong></td>
                                <td class="align-middle"><strong>3</strong></td>
                                <td class="align-middle"><a href="#" class="text-dark"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
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
                                        Subtotal </strong><strong>$390.00</strong></li>
                                <li class="d-flex justify-content-between py-3 border-bottom text-dark"><strong
                                        class="text-muted">Shipping and handling</strong><strong>$10.00</strong></li>
                                <li class="d-flex justify-content-between py-3 border-bottom text-dark"><strong
                                        class="text-muted">Tax</strong><strong>$0.00</strong></li>
                                <li class="d-flex justify-content-between py-3 border-bottom text-dark"><strong
                                        class="text-muted">Total</strong>
                                    <h5 class="font-weight-bold">$400.00</h5>
                                </li>
                            </ul><a href="#" class="btn btn-dark rounded-pill py-2 btn-block">Procceed to checkout</a>
                        </div>
                    </div>


                </div>



            </div>
        </div>



    </div>
</div>









@endsection