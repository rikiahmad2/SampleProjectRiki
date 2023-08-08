<?php
namespace App\Services;

use App\Models\Website;

class WebsiteService
{
    public function getAllWebsites()
    {
        return Website::all();
    }

    public function createWebsite(array $data)
    {
        return Website::create([
            'name' => $data['name'],
            'url' => $data['url'],
        ]);
    }
}
