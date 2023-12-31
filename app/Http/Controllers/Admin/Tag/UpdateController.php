<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;

class UpdateController extends Controller
{
    public function index(UpdateRequest $request, Tag $tag): RedirectResponse
    {
        $data = $request->validated();
        $tag->update($data);

        return redirect()->route('admin.tag.show', $tag)->with('success', 'Successfully updated');
    }
}
