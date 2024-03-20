<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = Product::paginate(3);
        return view('admin.page.product', [
            'title' => 'Admin Product',
            'name' => 'Product',
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addModal()
    {
        return view('admin.modal.addModal', [
            'title' => 'Add Product',
            'sku' => 'PRD' .  rand(10000, 99999),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $data = new Product();
        $data['sku'] = $request->sku;
        $data['name'] = $request->name;
        $data['type'] = $request->type;
        $data['category'] = $request->category;
        $data['price'] = $request->price;
        $data['qty'] = $request->qty;
        $data['discount'] = 0.1;
        $data['is_active'] = 1;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = date('Ymd') . '_' . $image->getClientOriginalName();
            $image->move(public_path('storage/product'), $filename);
            $data['image'] = $filename;
        }

        $data->save();
        Alert::toast('Product Added Successfully', 'success');
        return redirect()->route('product');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Product::findOrFail($id);
        return view('admin.modal.editModal', [
            'title' => 'Edit Product',
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $data = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($request->oldImage !== 'default.png') {
                $filePublicPath = public_path('storage/product/' . $request->oldImage);
                Storage::delete($filePublicPath);
            }
            $image = $request->file('image');
            $filename = date('Ymd') . '_' . $image->getClientOriginalName();
            $image->move(public_path('storage/product'), $filename);
            $data['image'] = $filename;
        } else {
            $data['image'] = $request->oldImage;
        }

        $field = [
            'sku' => $request->sku,
            'name' => $request->name,
            'type' => $request->type,
            'category' => $request->category,
            'price' => $request->price,
            'qty' => $request->qty,
            'discount' => 0.1,
            'is_active' => 1,
            'image' => $data['image'],
        ];

        $data->where('id', $id)->update($field);

        Alert::toast('Product Updated Successfully', 'success');
        return redirect()->route('product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Product::findOrFail($id);
        if ($data->image !== 'default.png') {
            $filePublicPath = public_path('storage/product/' . $data->image);
            Storage::delete($filePublicPath);
        }
        $data->delete();

        $json = [
            'success' => "Product Deleted Successfully",
        ];
        return response()->json($json);
    }
}
