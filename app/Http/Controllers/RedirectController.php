<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Type;
use Illuminate\Support\Facades\URL;

class RedirectController extends Controller
{
    public function brand( $language, $brand_slug )
    {
        $brand = Brand::where('name',$brand_slug)->firstOrFail();

        $url = '/'.$brand->id.'/'.$brand->name.'/';
        return redirect()->route($url);
    }

    public function datafeed( $brand_slug )
    {
        $brand = Brand::where('name',$brand_slug)->firstOrFail();

        $url = URL::to('sitemap-brand-'.$brand->id).'.xml';
        return redirect()->route($url);
    }
}
