<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {

        $data = User::paginate(10);

        return view('admin.page.user', [
            'title' => 'Admin User Management',
            'name' => 'User Management',
            'data' => $data,
        ]);
    }

    public function addModal()
    {
        return view('admin.modal.addModalUser', [
            'title' => 'Add User',
            'nik' => date('Ymd') . rand(000, 999),
        ]);
    }

    public function store(StoreUserRequest $request)
    {
        $data = new User();
        $data['nik'] = $request->nik;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = bcrypt($request->password);
        $data['address'] = $request->address;
        $data['phone'] = $request->phone;
        $data['role'] = $request->role;
        $data['date_of_birth'] = $request->date;
        $data['is_active'] = 1;
        $data['is_member'] = 0;
        $data['is_admin'] = 1;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = date('Ymd') . '_' . $image->getClientOriginalName();
            $image->move(public_path('storage/user'), $filename);
            $data['image'] = $filename;
        }

        $data->save();
        Alert::toast('User Added Successfully', 'success');
        return redirect()->route('userManagement');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = User::findOrFail($id);
        return view('admin.modal.editModalUser', [
            'title' => 'Edit User',
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $data = User::findOrFail($id);

        dd($request->all());

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = date('Ymd') . '_' . $image->getClientOriginalName();
            $image->move(public_path('storage/user'), $filename);
            $data['image'] = $filename;
            if ($request->oldImage !== 'default.png') {
                $filePublicPath = public_path('storage/user/' . $request->oldImage);
                Storage::delete($filePublicPath);
            }
        } else {
            $data['image'] = $request->oldImage;
        }

        $field = [
            'nik' => $request->nik,
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'role' => $request->role,
            'date_of_birth' => $request->date,
            'is_admin' => 1,
            'is_member' => 0,
            'is_active' => 1,
            'image' => $data['image'],
        ];

        $data->where('id', $id)->update($field);

        Alert::toast('User Updated Successfully', 'success');
        return redirect()->route('userManagement');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = User::findOrFail($id);
        if ($data->image !== 'default.png') {
            $filePublicPath = public_path('storage/user/' . $data->image);
            Storage::delete($filePublicPath);
        }
        $data->delete();

        $json = [
            'success' => "User Deleted Successfully",
        ];

        return response()->json($json);
    }
}
