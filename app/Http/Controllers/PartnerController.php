<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = partner::all();
        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $partner = Partner::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'type' => $request->type,
            'adress' => $request->adress,
        ]);

        if ($request->hasFile('image')) {
            $partner->addMedia($request->file('image'))->toMediaCollection('partner');
        }

        return redirect()->route('partners.index')->with('success', 'Partner created successfully.');
    }


    public function show(partner $partner)
    {
    }

    public function edit(partner $partner)
    {
        return view('admin.partners.edit', ['partner' => $partner]);

    }

    public function update(Request $request, Partner $partner)
    {
        $partner->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'type' => $request->type,
            'adress' => $request->adress,
        ]);

        if ($request->hasFile('image')) {
            $partner->clearMediaCollection('partner');
            $partner->addMedia($request->file('image'))->toMediaCollection('partner');
        }

        return redirect()->route('partners.index')->with('success', 'Partner updated successfully.');
    }

    public function destroy(partner $partner)
    {
        $partner->delete();
        return redirect()->route('partners.index')->with('success', 'partner deleted successfully.');
    }
}
