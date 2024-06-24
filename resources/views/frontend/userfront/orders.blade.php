@extends('frontend.frontbody.body')
@section('interface')

<div class="container mt-5">
    @if($orders->isEmpty())
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body text-center shadow-none">
                    <img src="{{asset('assets/img/3973481.jpg')}}" alt="No Orders" class="img-fluid mb-3" style="max-width: 200px;">
                    <h3 class="mb-3">No orders yet</h3>
                    <p class="text-muted">You haven't placed any orders yet. Start shopping now!</p>
                    <a href="{{ route('add.order') }}" class="btn mybtn mt-3">Start Shopping</a>
                </div>
            </div>
        </div>
    </div>
    @else
        @foreach($orders as $order)
        <div class="row">
            <div class="col-xl-8">
                @foreach($order->orderItems as $item)
                <div class="card border shadow-none">
                    
                    <div class="card-body">

                        <div class="d-flex align-items-start border-bottom pb-3">
                            <div class="me-4">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="" class="avatar-lg rounded">
                            </div>
                            <div class="flex-grow-1 align-self-center overflow-hidden">
                                <div>
                                    <h6 class="text-truncate font-size-18"><a href="#" class="text-dark"><a href="{{$item->link}}">{{$item->link}}</a></a></h6>
                                
                                    <p class="mb-0 mt-1">Size : <span class="fw-medium">{{$item->size}}</span></p>

                                    <p class="mb-0 mt-1">Color : <span class="fw-medium">{{$item->color}}</span></p>
                                </div>
                                
                            </div>
                        </div>

                        <div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mt-3">
                                        <p class="text-muted mb-2">Price</p>
                                        <h5 class="mb-0 mt-2 order-price" data-price="{{ $item->price }}"><span class="text-muted me-2" ></span>{{$item->price}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mt-3">
                                        <p class="text-muted mb-2">Quantity</p>
                                        <div class="d-inline-flex">
                                            <h6>{{$item->qty}}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mt-3">
                                        <p class="text-muted mb-2">Description</p>
                                        <h6>{{$item->description}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
                <!-- end card -->

        
            </div>
            @if($order->approve)
         <div class="col-xl-4">
    <div class="mt-5 mt-lg-0">
        <div class="card border shadow-none">
            <div class="card-header bg-transparent border-bottom py-3 px-4">
                <h5 class="font-size-16 mb-0">Order Number <span class="float-end">{{ $order->invoice_num }}</span></h5>
            </div>
            <div class="card-body p-4 pt-2">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <tbody>
                            <tr>
                                <td>Order Qty :</td>
                                <td class="text-end">{{ $order->qty }}</td>
                            </tr>
                            <tr>
                                <td>Order Date :</td>
                                <td class="text-end">{{ $order->order_date }}</td>
                            </tr>
                            <tr>
                                <td>Order Status :</td>
                                <td class="text-end">{{ $order->status }}</td>
                            </tr>
                            @if($order->status == 'processing')
                            <tr>
                                <td>Return Days :</td>
                                <td class="text-end">{{ $order->return_days }}</td>
                            </tr>
                            @endif
                            <tr>
                                <td>Order Price :</td>
                                <td class="text-end order-price" data-price="{{ $order->order_price }}">{{ $order->order_price }}</td>
                            </tr>
                            <tr>
                                <td>International fee :</td>
                                <td class="text-end order-price" data-price="{{ $order->international_fee }}">{{ $order->international_fee }}</td>
                            </tr>
                            <tr>
                                <td>Custom fee :</td>
                                <td class="text-end order-price" data-price="{{ $order->custom_fee }}">{{ $order->custom_fee }}</td>
                            </tr>
                            <tr class="bg-light">
                                <th>Total :</th>
                                <td class="text-end order-price fw-bold" data-price="{{ $order->total_price }}">{{ $order->total_price }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>
</div>
            <script>
      document.addEventListener('DOMContentLoaded', function() {
        const currencySelector = document.getElementById('currency');
        const orderPriceElements = document.querySelectorAll('.order-price');
        const exchangeRate = {!! json_encode($exchangeRate) !!};

        // Trigger currency conversion on page load
        convertCurrency();

        currencySelector.addEventListener('change', function() {
            convertCurrency();
        });

        function convertCurrency() {
            const selectedCurrency = currencySelector.value;
            const conversionRate = selectedCurrency === 'usd' ? 1 : exchangeRate;
            const currencySymbol = selectedCurrency === 'usd' ? '$' : ' IQD'; // Add a space before IQD for desired formatting

            orderPriceElements.forEach(function(element) {
                const priceInDollars = parseFloat(element.dataset.price);
                if (!isNaN(priceInDollars)) {
                    let convertedPrice = priceInDollars * conversionRate;
                    // Format the converted price for readability
                    convertedPrice = selectedCurrency === 'usd' ? currencySymbol + convertedPrice.toFixed(2) : formatCurrency(convertedPrice, currencySymbol);
                    element.innerText = convertedPrice;
                }
            });
        }

        // Function to format currency with separators for thousands
        function formatCurrency(amount, currencySymbol) {
            return new Intl.NumberFormat('en-US').format(Math.floor(amount)) + currencySymbol;
        }
    });
            </script>
            
            @else
            <!-- Display a message when the order is not approved -->
            <div class="col-xl-4">
                <div class="mt-5 mt-lg-0">
                    <div class="card border shadow-none "> <!-- Added bg-warning class for attention -->
                        <div class="card-header bg-transparent border-bottom py-3 px-4">
                            <h5 class="font-size-16 mb-0">Order Number <span class="float-end">{{ $order->invoice_num }}</span></h5>
                        </div>
                        <div class="card-body p-4 pt-2">
                            <p class="text-danger">Order not approved</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif


        </div>
        @endforeach
        <!-- end row -->
    @endif
</div>

<style>
.mybtn{
    background-color: #f1b44c!important;
}

.avatar-lg {
    height: 5rem;
    width: 5rem;
}

.font-size-18 {
    font-size: 18px!important;
}

.text-truncate {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

a {
    text-decoration: none!important;
}

.w-xl {
    min-width: 160px;
}

.card {
    margin-bottom: 24px;
    -webkit-box-shadow: 0 2px 3px #e4e8f0;
    box-shadow: 0 2px 3px #e4e8f0;
    border: none;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1)!important;
}
.img-fluid {
    max-width: 100%;
    height: auto;
}
.card {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid #eff0f2;
    border-radius: 1rem;
}
</style>

@endsection
