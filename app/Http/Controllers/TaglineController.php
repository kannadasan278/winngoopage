<?php

namespace App\Http\Controllers;

use App\Models\Tagline;
use App\Models\Merchant;
use Illuminate\Http\Request;
use Alert;
use Auth;

class TaglineController extends Controller
{
    public function index(Request $request)
    {
        $id = Auth::guard('merchant')->user()->id;
        $query = Tagline::query();

        if ($request->has('search')) {
            $query->where('tagline', 'like', '%' . $request->search . '%');
        }

        $taglines = $query->with('merchant')->where('merchant_id',$id)->get();
        return view('merchant.taglines.index', compact('taglines'));
    }

    public function create()
    {
        $merchants = Merchant::all();
        return view('merchant.taglines.create', compact('merchants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tagline' => 'required|string|max:255',
        ]);

        Tagline::create($request->all());

        return back()->with('success', 'Tagline created successfully.');
    }

    public function show($id)
    {
        $tagline = Tagline::with('merchant')->findOrFail($id);
        return view('merchant.taglines.show', compact('tagline'));
    }

    public function edit($id)
    {
        $tagline = Tagline::findOrFail($id);
        $merchants = Merchant::all();
        return view('merchant.taglines.edit', compact('tagline', 'merchants'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'merchant_id' => 'required|exists:merchants,id',
            'tagline' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        $tagline = Tagline::findOrFail($id);
        $tagline->update($request->all());

        return redirect()->route('taglines.index')
                         ->with('success', 'Tagline updated successfully.');
    }

    public function destroy($id)
    {
        $tagline = Tagline::findOrFail($id);
        $tagline->delete();

        return redirect()->route('merchant.taglines.index')
                         ->with('success', 'Tagline deleted successfully.');
    }
}
