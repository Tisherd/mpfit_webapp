<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Orders/Index', [
            'orders' => Order::with('product:id,name')->paginate(10),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Orders/Create', [
            'products' => Product::select('id', 'name')->get(),
        ]);
    }

    public function store(OrderRequest $request): RedirectResponse
    {
        $order = Order::create($request->validated());
        return redirect()->route('orders.show', $order);
    }

    public function show(Order $order): Response
    {
        return Inertia::render('Orders/Show', [
            'order' => $order->load('product:id,name,price'),
        ]);
    }

    public function edit(Order $order): Response
    {
        return Inertia::render('Orders/Edit', [
            'order' => $order,
            'products' => Product::select('id', 'name')->get(),
        ]);
    }

    public function update(OrderRequest $request, Order $order): RedirectResponse
    {
        $order->update($request->validated());
        return redirect()->route('orders.show', $order);
    }

    public function destroy(Order $order): RedirectResponse
    {
        $order->delete();
        return redirect()->route('orders.index');
    }
}
