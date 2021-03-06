<?php

namespace App\Services;

use App\Models\User\Device;
use GuzzleHttp\Client;
use Illuminate\Support\Collection;

class ApplePushNotificationService
{
    /**
     * Http.
     * @var Client
     */
    protected $http;
    /**
     * 通知の本文.
     * @var
     */
    protected $messages;

    /**
     * ユーザ.
     * @var
     */
    protected $users;

    /**
     * タイトル
     * @var
     */
    protected $title;
    protected $subtitle;

    /**
     * category
     * @var
     */
    protected $category;
    protected $object;
    protected $image;

    /**
     * ApplePushNotificationService constructor.
     * @param $http
     */
    public function __construct()
    {
        $this->http = new Client();
    }

    /**
     * user 設定
     * @param Collection $users
     * @return $this
     */
    public function to(Collection $users)
    {
        $this->users = $users;
        return $this;
    }

    /**
     * 本文設定
     * @param string $messages
     * @return $this
     */
    public function messages(string $messages)
    {
        $this->messages = $messages;
        return $this;
    }

    /**
     * タイトル設定
     * @param string $title
     * @return $this
     */
    public function title(string $title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * サブタイトル設定
     * @param string $subtitle
     * @return $this
     */
    public function subtitle(string $subtitle)
    {
        $this->subtitle = $subtitle;
        return $this;
    }

    /**
     * category 設定
     * @param string $category
     * @return $this
     */
    public function category(string $category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * オブジェクト設定
     * @param $object
     * @return $this
     */
    public function object($object)
    {
        $this->object = $object;
        return $this;
    }

    /**
     * イメージ設定
     * @param string $url
     * @return $this
     */
    public function image(string $url)
    {
        $this->image = $url;
        return $this;
    }

    /**
     * 送信
     */
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
                        'body' => $this->messages,
                        'subtitle' => $this->subtitle,
                        'sound' => 'default',
                        'click_action' => $this->category,
                        'mutable_content' => true,
                        'image' => $this->image,
                        'object' => $this->object,
                    ]
                ],
            ]);

            info('Send push notification', json_decode($response->getBody(), true));

            foreach ($chunk->combine(json_decode($response->getBody())->results) as $token => $result) {
                foreach ($result as $key => $value) {
                    if ($key === 'error') {
                        Device::where('token', $token)->delete();
                    }
                }
            }
        }
    }
}
