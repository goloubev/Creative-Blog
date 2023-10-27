<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class DeleteController extends BaseController
{
    public function index(Post $post): RedirectResponse
    {
        $this->service->delete($post);

        return redirect()->route('admin.post.index')->with('success', 'Successfully deleted');
    }
}
