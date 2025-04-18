<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

trait FileUploadTrait
{
    public function handleFileUpload(Request $request, string $fileName, ?string $oldPath = null, $dir = 'uploads'): ?string
    {
        if (!$request->hasFile($fileName)) {
            return null;
        }

        // delete old file
        $exculudedFolder = '/default';

        if ($oldPath && File::exists(public_path($oldPath)) && strpos($oldPath, $exculudedFolder) !== 0) {
            File::delete(public_path($oldPath));
        }

        $file = $request->file($fileName);
        $extension = $file->getClientOriginalExtension();
        $updateFileName = Str::random(30) . '.' . $extension;
        $file->move(public_path($dir), $updateFileName);

        return $dir . '/' . $updateFileName; //uploads/image.jpg
    }

//    handleFileDelete
    public function deleteFile(string $path): void
    {
        // delete old file
        $exculudedFolder = '/default';

        if ($path && File::exists(public_path($path)) && strpos($path, $exculudedFolder) !== 0) {
            File::delete(public_path($path));
        }
    }
}
