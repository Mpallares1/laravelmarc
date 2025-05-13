<?php
public function upload(Request $request)
{
    $request->validate([
        'file' => 'required|file|mimes:jpg,jpeg,png,mp4|max:10240', // 10MB max
    ]);

    $path = $request->file('file')->store('uploads', 'public');

    $user = $request->user();
    $media = $user->media()->create([
        'name' => $request->file('file')->getClientOriginalName(),
        'url' => Storage::url($path),
    ]);

    return response()->json([
        'message' => 'File uploaded successfully.',
        'media' => $media,
    ], 201);
}
