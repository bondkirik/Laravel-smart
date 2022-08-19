<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Services\BasketServices;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function basket()
    {
        $order = (new BasketServices())->getOrder();
        return view('basket', compact('order'));
    }

    public function basketConfirm(Request $request)
    {

        if ((new BasketServices())->saveOrder($request->name, $request->phone)) {
            session()->flash('success', 'Your order has been processed!');
        } else {
            session()->flash('warning', 'Error');
        }

        Order::eraseOrderSum();

        return redirect()->route('index');
    }

    public function basketPlace()
    {
        $order = (new BasketServices())->getOrder();
        return view('order', compact('order'));
    }

    public function basketAdd(Product $product)
    {

        $result = (new BasketServices(true))->addProduct($product);

        if ($result) {
            session()->flash('success', 'Add service ' . $product->name);
        } else {
            session()->flash('warning', 'Service '.$product->name . 'not available for order');
        }

        return redirect()->route('basket');
    }

    public function basketRemove(Product $product)
    {
        (new BasketServices())->removeProduct($product);

        session()->flash('warning', 'Remove Service  ' . $product->name);

        return redirect()->route('basket');
    }

}
