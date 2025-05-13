<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Multimedia;

class MediaController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,mp4|max:10240', // Supports images and videos, max 10MB
        ]);

        $fileType = $request->file('file')->getMimeType();
        $directory = str_contains($fileType, 'image') ? 'uploads/images' : 'uploads/videos';

        $path = $request->file('file')->store($directory, 'public');

        $user = $request->user();
        $media = $user->media()->create([
            'name' => $request->file('file')->getClientOriginalName(),
            'url' => Storage::url($path),
        ]);

        return response()->json([
            'message' => 'File uploaded successfully.',
            'media' => $media,
            'type' => str_contains($fileType, 'image') ? 'image' : 'video',
        ], 201);
    }

    public function getUserMedia(Request $request)
    {
        $user = $request->user();
        $media = $user->media()->get();

        return response()->json([
            'message' => 'User media retrieved successfully.',
            'media' => $media,
        ]);
    }

    public function deleteMedia($id)
    {
        $media = Multimedia::findOrFail($id);

        // Ensure the media belongs to the authenticated user
        if ($media->user_id !== auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        // Delete the file from storage
        $filePath = str_replace('/storage/', '', $media->url); // Adjust path for deletion
        Storage::disk('public')->delete($filePath);

        // Delete the record from the database
        $media->delete();

        return response()->json(['message' => 'File deleted successfully.'], 200);
    }
}
