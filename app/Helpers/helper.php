<?php

/**
 * Upload
 */
if (!function_exists('upload')) {
    function upload($file, $path)
    {
        $baseDir = 'uploads/' . $path;

        $name = sha1(time() . $file->getClientOriginalName());
        $extension = $file->getClientOriginalExtension();
        $fileName = "{$name}.{$extension}";

        $file->move(public_path() . '/' . $baseDir, $fileName);

        return "{$baseDir}/{$fileName}";
    }
}

/**
 * Upload
 */
if (!function_exists('getFIleName')) {
    function getFIleName($file)
    {

        $name = $file->getClientOriginalName();
        return $name;
    }
}
