<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class SitemapController extends Controller
{
    public function generate()
    {

        $sitemap = App::make("sitemap");


        // Get all brands
        $brands = Brand::all()->orderBy('name')->get();

        // Get base url for easy reusing
        $base_url = URL::to('/');

        foreach ($brands as $brand)
        {
            // create sitemap
            $sitemap_brand = App::make("sitemap");

            $manuals = Manual::where('brand_id', $brand->id )->get();

            foreach($manuals as $manual)
            {
                $sitemap_brand->add( $base_url.'/'.$brand->id.'/'.$brand->name.'/'.$manual->id.'/'.$manual->name.'/');

            }

            $sitemap_brand->store('xml','sitemap-brand-'.$brand->id);
            //return $sitemap_brand->render('xml');

            $sitemap->addSitemap(URL::to('sitemap-brand-'.$brand->id).'.xml');

        }


        // show sitemap
        $sitemap->store('sitemapindex','sitemap');
        return $sitemap->render('sitemapindex');

    }
}
