<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;

class UpdateController extends Controller
{
    public function index(UpdateRequest $request, Category $category): RedirectResponse
    {
        $data = $request->validated();
        $category->update($data);
        return redirect()->route('admin.category.show', $category->id)->with('success', 'Successfully updated');
    }
}
