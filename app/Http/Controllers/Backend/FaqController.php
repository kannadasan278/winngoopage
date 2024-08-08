<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use Alert;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        return view('backend.cms.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('backend.cms.faqs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'faq_category' => 'required',
            'answer' => 'required',
        ]);

        Faq::create($request->all());

        return response()->json(['status' => 'success', 'message' => 'FAQ created successfully.']);
    }

    public function edit(Faq $faq)
    {
        return view('backend.cms.faqs.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'required',
            'faq_category' => 'required',
            'answer' => 'required',
        ]);

        $faq->update($request->all());

        return response()->json(['status' => 'success', 'message' => 'FAQ updated successfully.']);
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

Alert::success('Success', 'FAQ deleted successfully.');
        return redirect()->back();    }

}
