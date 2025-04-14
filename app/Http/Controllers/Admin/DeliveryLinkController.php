<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DeliveryLink;
use Illuminate\Support\Facades\Storage;

class DeliveryLinkController extends Controller
{
    public function index()
    {
        $links = DeliveryLink::all();
        return view('admin.delivery_links.index', compact('links'));
    }

    public function create()
    {
        return view('admin.delivery_links.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'platform' => 'required|string|max:100',
            'url' => 'required|url',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('delivery_logos', 'public');
        }

        DeliveryLink::create($data);

        return redirect()->route('delivery-links.index')->with('success', 'Plataforma creada');
    }

    public function edit(DeliveryLink $deliveryLink)
    {
        return view('admin.delivery_links.edit', compact('deliveryLink'));
    }

    public function update(Request $request, DeliveryLink $deliveryLink)
    {
        $data = $request->validate([
            'platform' => 'required|string|max:100',
            'url' => 'required|url',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($deliveryLink->image) {
                Storage::disk('public')->delete($deliveryLink->image);
            }
            $data['image'] = $request->file('image')->store('delivery_logos', 'public');
        }

        $deliveryLink->update($data);

        return redirect()->route('delivery-links.index')->with('success', 'Actualizado correctamente');
    }

    public function destroy(DeliveryLink $deliveryLink)
    {
        if ($deliveryLink->image) {
            Storage::disk('public')->delete($deliveryLink->image);
        }
        $deliveryLink->delete();
        return redirect()->route('delivery-links.index')->with('success', 'Eliminado correctamente');
    }
}
