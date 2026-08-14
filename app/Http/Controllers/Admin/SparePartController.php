<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SparePart;
use App\Models\Category;
use Illuminate\Http\Request;

class SparePartController extends Controller
{

    public function index(Request $request)
    {
        $search = trim((string) $request->input('search', ''));
        $categoryId = $request->input('category_id');

        $spareParts = SparePart::with('category')
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($innerQuery) use ($search) {
                    $innerQuery->where('name', 'like', "%{$search}%")
                        ->orWhere('name_tm', 'like', "%{$search}%")
                        ->orWhere('name_ru', 'like', "%{$search}%")
                        ->orWhere('name_en', 'like', "%{$search}%");
                });
            })
            ->when($categoryId !== null && $categoryId !== '', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            })
            ->latest()
            ->get();

        $categories = Category::all();
        return view('admin.spare_parts.index', compact('spareParts', 'categories', 'search', 'categoryId'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name_tm' => 'required|string|max:100',
            'name_ru' => 'required|string|max:100',
            'name_en' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        SparePart::create($request->all());

        return redirect()->back()->with('success', 'Täze ätiýaçlyk şaýy goşuldy!');
    }

    public function update(Request $request, $id)
    {
        $sparePart = SparePart::findOrFail($id);

        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name_tm' => 'required|string|max:100',
            'name_ru' => 'required|string|max:100',
            'name_en' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $sparePart->update($request->all());

        return redirect()->back()->with('success', 'Ätiýaçlyk şaýy täzelendi!');
    }

    public function destroy($id)
    {
        $sparePart = SparePart::findOrFail($id);
        $sparePart->delete();

        return redirect()->back()->with('success', 'Ätiýaçlyk şaýy öçürildi!');
    }
}