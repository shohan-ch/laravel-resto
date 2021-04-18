@extends('front-end.layout.master')

<style>
  .product-table td {
    padding: .75rem;
    vertical-align: top;
    border-top: none !important;
  }
</style>


@section('content')

{{-- <div class="position-relative"></div> --}}


<x-front-end.banner></x-front-end.banner>
<x-front-end.menu></x-front-end.menu>
<x-front-end.special></x-front-end.special>
<x-front-end.reservation></x-front-end.reservation>
<x-front-end.gallery></x-front-end.gallery>
<x-front-end.contact></x-front-end.contact>





<div class="p-3" style="position: absolute; top: 100%; right: 0%; width: 340px; height: 100%; background: #44424059;">

  <h6 class="text-white py-4">Your Order From The Resturant</h6>

  <table class="table overflow-auto d-block product-table" style="max-height: 300px;">

    <tbody class="">

      @foreach (Cart::content() as $item )



      <tr>
        <td>
          <p style="color: #cda45e;font-weight: bold; font-size: 15px;">{{ $item->model->name }}</p> <span> <small
              class="font-weight-bold text-white">{{ $item->model->status }}</small> </span>
        </td>

        <td>
          <p class="font-weight-lighter text-white">$ {{ $item->model->price }}</p>
          <ul class="p-0 list-unstyled list-inline">
            <li class="list-inline-item">
              <form action="{{ route('cart.destroy', $item->rowId) }}" method="post" id="cart-dlt">
                @csrf
                @method('delete')
                <a href="#" onclick="document.getElementById('cart-dlt').submit()"><i
                    class="icofont-delete-alt"></i></a>

              </form>

              {{-- <a href="#"><i class="icofont-delete-alt"></i></a> --}}

            </li>
            <li class="list-inline-item text-white">{{ $item->qty }}</li>
            <li class="list-inline-item"><a href="#"><i class="icofont-plus"></i></a></li>
          </ul>
        </td>

      </tr>

      @endforeach


    </tbody>

  </table>

  <div class="row my-5">
    <div class="col-md-6">
      <p>Subtotal</p>
      <p>Delivery Fee</p>
      <p>Vat (10%)</p>
      <p>Total</p>


    </div>
    @if(Cart::count()>0)

    <div class="col-md-6 text-right">
      <p>{{ Cart::subtotal() }}</p>
      <p>10</p>
      <p>{{ Cart::tax() }}</p>
      <p>{{ Cart::total() }}</p>
    </div>
    @else
    <div class="col-md-6 text-right">
      <p>$ 0</p>
      <p>$ 0</p>
      <p>$ 0</p>
      <p>$ 0</p>

    </div>

    @endif

  </div>

  <button class="w-100 btn btn-primary">Go to checkout</button>

</div>









{{-- Cart Section --}}
{{-- <div class="container d-flex justify-content-center">
  <div class="row ">
    <div class="col-lg-12 mx-auto ">
      <ul class="list-group shadow-lg">
        <li class="list-group-item">
          <h6 class="font-weight-bold mb-0">Best value</h6> <small class="text-muted "> Buy 2kg and Get 1kg FREE</small>
          <div class="media align-item-center mt-4 "><img class="align-self-center img-fluid mr-md-2"
              src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1576329767/71O6hR7nKQL._SX679_.jpg" width="120"
              height="120">
            <div class="media-body">
              <p class="mt-0 mb-3 ">Quaker Oats, Cartoon </p>
              <div class="row menu-1">
                <div class="col-auto font-weight-bold pr-2"> &#8377;80 </div>
                <div class="flex-col"> <small> <del class="text-muted">100</del> </small></div>
                <div class="col-auto pl-2"><small class="text-success font-weight-bold">&#8377;20 off </small></div>
              </div>
              <div class="row mt-4 no-gutters mx-auto">
                <div class="col-auto flex-column mr-2"><select class="custom-select custom-select-lg font-weight-bold">
                    <option selected>2 Kg</option>
                    <option value="1">5 Kg</option>
                    <option value="2">10 Kg</option>
                  </select></div>
                <div class="col-auto"> <button type="button"
                    class="btn px-3 btn-outline-dark btn-lg text-primary font-weight-bold px-4 mt-sm-0 mt-1"> Add
                    item</button></div>
              </div>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <div class="media align-item-center my-3"><img class="align-self-center img-fluid mr-md-2"
              src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1576329805/81I6MHJTaLL._SX679_.jpg" width="120"
              height="120">
            <div class="media-body">
              <p class="mt-0 mb-3 ">Nescafe Red Cub Premium </p>
              <div class="row menu-1">
                <div class="col-auto font-weight-bold pr-2"> &#8377;130 </div>
                <div class="flex-col "> <small> <del class="text-muted">200</del> </small></div>
                <div class="col-auto pl-2"><small class="text-success font-weight-bold">&#8377;70 off</small></div>
              </div>
              <div class="row mt-4 no-gutters mx-auto">
                <div class="col-auto mr-2"><select class="custom-select custom-select-lg font-weight-bold">
                    <option selected>2 Kg</option>
                    <option value="1">5 Kg</option>
                    <option value="2">10 Kg</option>
                  </select></div>
                <div class="col-auto"> <button type="button"
                    class="btn btn btn-outline-dark btn-lg text-primary font-weight-bold px-4 mt-sm-0 mt-1"> Add
                    item</button></div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div> --}}




@endsection