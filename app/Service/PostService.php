<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data): void
    {
        try {
            DB::beginTransaction();

            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::put('/images', $data['preview_image']);
            }

            if (isset($data['main_image'])) {
                $data['main_image'] = Storage::put('/images', $data['main_image']);
            }

            $post = Post::create($data);

            if (isset($tagIds)) {
                $post->tags()->attach($tagIds);
            }

            DB::commit();
        }
        catch (Exception) {
            DB::rollBack();
            abort(404);
        }
    }

    public function update($data, $post)
    {
        try {
            DB::beginTransaction();

            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::put('/images', $data['preview_image']);
            }

            if (isset($data['main_image'])) {
                $data['main_image'] = Storage::put('/images', $data['main_image']);
            }

            $post->update($data);

            if (isset($tagIds)) {
                $post->tags()->sync($tagIds);
            }

            DB::commit();
        }
        catch (Exception) {
            DB::rollBack();
            abort(500);
        }

        return $post;
    }

    public function delete($post): void
    {
        if ($post->preview_image != null && Storage::exists($post->preview_image)) {
            Storage::delete($post->preview_image);
        }

        if ($post->main_image != null && Storage::exists($post->main_image)) {
            Storage::delete($post->main_image);
        }

        $post->delete();
    }
}
