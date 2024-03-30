@extends('frontend.frontbody.body')
@section('interface')
@if(session()->has('cart') && count(session('cart')) > 0)
    <div class="px-4 px-lg-0">
        <div class="container text-dark py-5 text-center">
            <h4 class="display-6">Your Shopping Cart</h4>
            <p class="lead mb-0">Review and manage the items you've added to your cart.</p>
        </div>

        <div class="pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                        <!-- Shopping cart table -->
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="p-2 px-3 text-uppercase">Product</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Size</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Color</div>
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
                                    @foreach(session('cart', []) as $item)
                                    <tr>
                                        <td class="border-0">
                                            <div class="p-2">
                                                <img src="{{ asset('storage/' . $item['file']) }}" alt="" width="70" class="img-fluid rounded shadow-sm">
                                                <div class="ml-3 d-inline-block align-middle">
                                                    <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">{{ $item['description'] }}</a></h5>
                                                    <span class="text-muted font-weight-normal font-italic d-block">Country: {{ $item['country'] }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="border-0 align-middle"><strong>{{ $item['size'] }}</strong></td>
                                        <td class="border-0 align-middle"><strong>{{ $item['color'] }}</strong></td>
                                        <td class="border-0 align-middle "><strong>{{ $item['qty'] }}</strong></td>
                                        <td class="border-0 align-middle ">
                                            <form action="{{ route('cart.remove', ['id' => $item['id']]) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link border-0 align-middle text-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- End -->

                        <!-- Process checkout button -->
                        <form action="{{ route('checkout.process') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary mt-5 btnmy">Proceed to Checkout</button>
                        </form>
                        <!-- End Process checkout button -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="px-4 px-lg-0">
        <div class="container text-dark py-5 text-center">
            <h4 class="display-6">Your Shopping Cart is Empty</h4>
            <p class="lead mb-0">Add items to your cart to see them here.</p>
        </div>
    </div>
@endif


  <style>
   
    .btnmy{
       background-color: #dab83d!important;
       border-color: #dab83d!important;
       color: #fff!important;
    }
    
body {
  background: #eecda3;
  background: -webkit-linear-gradient(to right, #eecda3, #dab83d);
  background: linear-gradient(to right, #eecda3, #dab83d);
  min-height: 100vh;
}
  </style>
@endsection
