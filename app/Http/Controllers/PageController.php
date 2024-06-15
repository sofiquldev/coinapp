<?php
namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // Display a listing of the pages
    public function index()
    {
        $pages = Page::all();
        return view('pages.index', compact('pages'));
    }

    // Show the form for creating a new page
    public function create()
    {
        return view('pages.create');
    }

    // Store a newly created page in storage
    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'required|unique:pages',
            'title' => 'required',
            'content' => 'required',
            'template' => 'required',
        ]);

        Page::create($request->all());

        return redirect()->route('pages.index')->with('success', 'Page created successfully.');
    }

    // Display the specified page
    public function show($id)
    {
        $page = Page::findOrFail($id);
        return view('pages.show', compact('page'));
    }

    // Show the form for editing the specified page
    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('pages.edit', compact('page'));
    }

    // Update the specified page in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'slug' => 'required|unique:pages,slug,' . $id,
            'title' => 'required',
            'content' => 'required',
            'template' => 'required',
        ]);

        $page = Page::findOrFail($id);
        $page->update($request->all());

        return redirect()->route('pages.index')->with('success', 'Page updated successfully.');
    }

    // Remove the specified page from storage
    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();

        return redirect()->route('pages.index')->with('success', 'Page deleted successfully.');
    }
}
