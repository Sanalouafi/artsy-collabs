<?php

namespace App\Http\Controllers;

use App\Models\partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $projects = partner::all();
        return view('partners.index', compact('partners'));
    }

    public function create()
    {
        return view('partners.create');
    }

    public function store(Request $request)
    {
        partner::create($request->all());
        return redirect()->route('partners.index');
    }

    public function show(partner $partner)
    {
        return view('partners.show', compact('partner'));
    }

    public function edit(partner $partner)
    {
        return view('partners.edit', compact('partner'));
    }

    public function update(Request $request, partner $partner)
    {
        $partner->update($request->all());
        return redirect()->route('partners.index');
    }

    public function destroy(partner $partner)
    {
        $partner->delete();
        return redirect()->route('partners.index');
    }
}
