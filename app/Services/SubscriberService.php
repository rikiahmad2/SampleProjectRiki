<?php
namespace App\Services;

use App\Models\Website;
use Illuminate\Support\Facades\Validator;

class SubscriberService
{
    public function subscribe(Website $website, array $data)
    {
        $validator = Validator::make($data, [
            'email' => 'required|email|unique:subscribers,email,NULL,id,website_id,' . $website->id,
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $subscriber = $website->subscribers()->create($validator->validated());

        return ['message' => 'Subscribed successfully', 'subscriber' => $subscriber];
    }
}