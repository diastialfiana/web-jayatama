<?php
// app/Helpers/AssetHelper.php
namespace App\Helpers;

class AssetHelper
{
    public static function assetPath($path)
    {
        return asset('assets/' . $path);
    }

    public static function vendorPath($path)
    {
        return asset('vendor/' . $path);
    }

    public static function imgPath($path)
    {
        return asset('img/' . $path);
    }
}