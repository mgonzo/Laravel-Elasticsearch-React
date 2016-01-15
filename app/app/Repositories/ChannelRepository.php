<?php

namespace App\Repositories;

use Elasticsearch\Client;
use App\Channel;

class ChannelRepository implements ContentRepository
{
    private $elasticsearch;

    public function __construct(Client $client)
    {
        $this->elasticsearch = $client;
    }

    public function one($id)
    {
        return [];
    }

    public function all()
    {
        $params = [
         'index' => 'channels',
         'type' => 'channel'
        ];

        $response = $this->elasticsearch->search($params);
        return $this->transformArray($response['hits']['hits']);
    }

    public function search($input)
    {
        return [];
    }

    private function transformArray($hits) {
        $arr = [];
        foreach($hits as $item) {
            $channel = new Channel();
            $channel->fill($item['_source']);
            $channel->getUrl();
            $arr[] = $channel;
        }
        return $arr;
    }

}
