<?php

namespace App\Services;


use App\Models\User\Device;
use GuzzleHttp\Client;
use Illuminate\Support\Collection;

class ApplePushNotificationService
{
    protected $http;
    protected $messages;
    protected $users;
    protected $title;

    /**
     * ApplePushNotificationService constructor.
     * @param $http
     */
    public function __construct()
    {
        $this->http = new Client();
    }

    public function to(Collection $users)
    {
        $users->load([
            'devices'
        ]);
        $this->users = $users;
        return $this;
    }

    public function messages(string $messages)
    {
        $this->messages = $messages;
        return $this;
    }

    public function title(string $title)
    {
        $this->title = $title;
        return $this;
    }

    public function send()
    {
        foreach (Device::tokens($this->users)->chunk(1000) as $chunk) {

            $response = $this->http->post(config('services.firebase.fcm.url'), [
                'headers' => [
                    'Authorization' => 'key=' . config('services.firebase.fcm.key'),
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'registration_ids' => $chunk->toArray(),
                    'notification' => [
                        'title' => $this->title,
                        'text' => $this->messages,
                        'sound' => 'default'
                    ]
                ],
            ]);

            info('Send push notification', json_decode($response->getBody(), true));
        }
    }
}