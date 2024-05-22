<?php

namespace App\Http\Controllers\Frontend;

use App\Filament\Resources\OrderItemsResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\OrderItems;
use App\Helpers\NotificationHelper;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // Validate the request
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif',
            'link' => 'required|url',
            'country' => 'required',
            'size' => 'required',
            'color' => 'required',
            'qty' => 'required|numeric',
            'description' => 'required',
        ]);
    
        // Generate a unique identifier for the cart items
        $cartItemId = uniqid();
        $image = $request->file('file');
    
        if ($image) {
            $make_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/userItem', $make_name);
            $path = 'userItem/' . $make_name;
                $request->session()->push('cart', [
                    'id' => $cartItemId, // Unique identifier for the cart item
                    'file' => $path, // Store the filename
                    'link' => $request->link,
                    'country' => $request->country,
                    'size' => $request->size,
                    'color' => $request->color,
                    'qty' => $request->qty,
                    'description' => $request->description,
                ]);
            } else {
                // Handle error if file storage fails
                dd("error");
            }
        
    
        NotificationHelper::show('Successfully Added on Your Cart','success');

        return redirect()->back();
    }
    


    public function removeFromCart($id)
{
    $cart = session('cart', []);

    // Find the item with the given ID
    $itemIndex = null;
    foreach ($cart as $index => $item) {
        if ($item['id'] === $id) {
            $itemIndex = $index;
            break;
        }
    }
    
   
    // If the item was found, remove it from the cart and delete the associated image
    if ($itemIndex !== null) {
        // Delete image from storage
        $filePath = 'public/' . $cart[$itemIndex]['file']; // Full path to the file
        Storage::delete($filePath);

        // Remove item from cart
        unset($cart[$itemIndex]);
        session(['cart' => array_values($cart)]); // Re-index the array
    }
    NotificationHelper::show('Delete successfully','success');

    return redirect()->back();
}


public function processCheckout(Request $request)
{
    // Check if the cart is empty
    if (empty(session('cart'))) {
        NotificationHelper::show('Your cart is empty. Please add items to your cart before checking out.', 'error');
        return redirect()->route('dashboard');
    }

    // Initialize total quantity and price for the order
    $totalQuantity = 0;

    // Create a new order
    $order = Order::create([
        'user_id' => auth()->id(),
        'order_date' => Carbon::now()->format('Y-m-d'),
        'invoice_num' => 'NUM' . mt_rand(10000000, 99999999),
        'status' => 'pending',
        'total_price' => null,
        'qty' => 0,
        'international_fee' => 12,
        'custom_fee' => 5,
        'order_price' => null,
        'return_days' => null,
        'created_at' => Carbon::now(),
    ]);

    // Iterate through each item in the cart and create order items
    foreach (session('cart', []) as $item) {
        // Calculate total quantity
        $totalQuantity += $item['qty'];

        $orderItem = new OrderItems([
            'order_id' => $order->id, // Assign the order ID
            'image' => $item['file'],
            'link' => $item['link'],
            'country' => $item['country'],
            'size' => $item['size'],
            'color' => $item['color'],
            'qty' => $item['qty'],
            'description' => $item['description'],
        ]);

        // Save the order item
        $orderItem->save();

        // Associate the order item with the order
        $order->orderItems()->save($orderItem);
    }

    // Update the total quantity for the order
    $order->update(['qty' => $totalQuantity]);

    // Clear the cart after successful checkout
    $request->session()->forget('cart');

    // Redirect to a success page
    NotificationHelper::show('Process checkout successfully', 'success');
    return redirect()->route('orders.all');
}





}
