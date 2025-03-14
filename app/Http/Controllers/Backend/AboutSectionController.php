<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use App\Models\AboutSectionItem;
use Illuminate\Http\Request;
use App\DataTables\AboutSectionDataTable;

class AboutSectionController extends Controller
{
    // Display all sections with their items
    public function index(AboutSectionDataTable $dataTable)
    {
        return $dataTable->render('admin.about.index');
    }

    // Show form to create a new section
    public function create()
    {
        return view('admin.about.create');
    }

    // Store a new section along with its bullet items
    public function store(Request $request)
    {
        $request->validate([
            'section_name' => 'required|unique:about_sections,section_name',
            'title'        => 'required',
            'description'  => 'nullable',
            'items.*.item_title' => 'nullable|string',
            'items.*.content'    => 'required|string',
            'items.*.icon'       => 'nullable|string',
        ]);

        $section = AboutSection::create($request->only(['section_name', 'title', 'description']));

        if ($request->has('items')) {
            foreach ($request->items as $index => $itemData) {
                $itemData['order'] = $index;
                $section->items()->create($itemData);
            }
        }

        return redirect()->route('admin.about.index')->with('success', 'Section created successfully.');
    }

    // Show form to edit an existing section
    public function edit($id)
    {
        $section = AboutSection::with('items')->findOrFail($id);
        return view('admin.about.edit', compact('section'));
    }

    // Update a section and its bullet items
    public function update(Request $request, $id)
    {
        $section = AboutSection::findOrFail($id);

        $request->validate([
            'section_name' => 'required|unique:about_sections,section_name,' . $section->id,
            'title'        => 'required',
            'description'  => 'nullable',
            'items.*.id'       => 'sometimes|exists:about_section_items,id',
            'items.*.item_title' => 'nullable|string',
            'items.*.content'    => 'required|string',
            'items.*.icon'       => 'nullable|string',
        ]);

        $section->update($request->only(['section_name', 'title', 'description']));

        // Update bullet items:
        $existingItemIds = $section->items->pluck('id')->toArray();
        $newItemIds = [];

        if ($request->has('items')) {
            foreach ($request->items as $index => $itemData) {
                $itemData['order'] = $index;
                if (isset($itemData['id'])) {
                    $newItemIds[] = $itemData['id'];
                    $section->items()->where('id', $itemData['id'])->update($itemData);
                } else {
                    $newItem = $section->items()->create($itemData);
                    $newItemIds[] = $newItem->id;
                }
            }
        }

        // Delete items that were removed
        $toDelete = array_diff($existingItemIds, $newItemIds);
        if (!empty($toDelete)) {
            AboutSectionItem::destroy($toDelete);
        }

        return redirect()->route('admin.about.index')->with('success', 'Section updated successfully.');
    }

    // Delete a section and its associated bullet items
    public function destroy($id)
    {
        $section = AboutSection::findOrFail($id);
        $section->delete();

        return redirect()->route('admin.about.index')->with('success', 'Section deleted successfully.');
    }
}
