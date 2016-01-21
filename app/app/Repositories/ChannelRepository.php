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
        $params = [
         'index' => 'channels',
         'type' => 'channel',
         'body' => []
        ];

        if (!empty($input['page'])) {
            $from = $input['page'] - 1;
            $params['body']['from'] = $from * 10;
            $params['body']['size'] = 10;
        }
        
        if (!empty($input['searchField'])) {
            $params['body']['query'] = [
                'match' => [
                    $input['searchField'] => $input['searchValue']
                ]
            ];
        }

        $response = $this->elasticsearch->search($params);

        return $this->transformArray($response['hits']['hits']);
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
