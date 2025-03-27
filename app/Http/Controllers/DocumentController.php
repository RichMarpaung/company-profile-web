<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::all();
        return view('adminpage.document.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminpage.document.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'path' => 'required|file|mimes:pdf,doc,docx,txt,ppt,pptx,xls,xlsx|max:10240', // 10MB = 10240KB
        ]);

        $filePath = $request->file('path')->store('documents', 'public');

        Document::create([
            'user_id' => Auth::user()->id,
            'nama' => $request->nama,
            'path' => $filePath,
        ]);

        return redirect()->route('admin.documents.index')->with('success', 'Document created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        return view('adminpage.document.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'path' => 'nullable|file|mimes:pdf,doc,docx,txt,ppt,pptx,xls,xlsx|max:10240', // 10MB = 10240KB
        ]);

        if ($request->hasFile('path')) {
            Storage::disk('public')->delete($document->path);
            $filePath = $request->file('path')->store('documents', 'public');
            $document->path = $filePath;
        }

        $document->update([
            'nama' => $request->nama,
            'path' => $document->path,
        ]);

        return redirect()->route('admin.documents.index')->with('success', 'Document updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        Storage::disk('public')->delete($document->path);
        $document->delete();

        return redirect()->route('admin.documents.index')->with('success', 'Document deleted successfully.');
    }
}
