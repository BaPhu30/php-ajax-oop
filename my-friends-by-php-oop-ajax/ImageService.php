<?php

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param string $dir
     * @param string $fileName
     * 
     * @return string
     * 
     */
    public function upload($file, $uploadDir)
    {
        try {
            $name = Str::random(10);
            $fileName = time() . '_' . $name;
            $extension = $file->getClientOriginalExtension();
            $fullpath = $uploadDir . $fileName . '.' . $extension;

            $upload = Storage::disk('s3')->put($fullpath, file_get_contents($file), 'public');
            if ($upload) {
                return $fullpath;
            }

            return "";
        } catch (\Exception $e) {
            logger($e->getMessage());
            return "";
        }
    }

    /**
     * @param string $imagePath
     * 
     * @return bool
     */
    public function remove($imagePath = null)
    {
        $imagePath = $imagePath ?? $this->imagePath;
        if ($imagePath) {
            Storage::exists($imagePath)
                ? Storage::delete($imagePath)
                : logger("Image path {$imagePath} not found");

            return true;
        }
        return false;
    }
}
