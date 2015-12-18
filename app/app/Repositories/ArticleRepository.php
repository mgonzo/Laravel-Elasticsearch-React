<?php

namespace SheKnows\Repositories;

use Elasticsearch\Client;
use SheKnows\Article;

class ArticleRepository implements ContentRepository
{
    private $elasticsearch;

    public function __construct(Client $client)
    {
        $this->elasticsearch = $client;
    }

    public function one($id)
    {
        $params = [
         'index' => 'articles',
         'type' => 'sheknows',
         'id' => $id
        ];

        $response = $this->elasticsearch->get($params);
        // if we have no article
        // throw some error
         
        $article = new Article();
        $article->fill($response['_source']);
        $article->getUrl();
        return $article;
    }

    public function all()
    {
        return [];
    }

    public function search($input)
    {
        $params = [
         'index' => 'articles',
         'type' => 'sheknows',
         'body' => []
        ];

        if ($input['page'] != null) {
            $from = $input['page'] - 1;
            $params['body']['from'] = $from * 10;
            $params['body']['size'] = 10;
        }
        
        if ($input['searchField'] != null) {
            $params['body']['query'] = [
                'match' => [
                    $input['searchField'] => $input['searchValue']
                ]
            ];

            $params['body']['sort'] = [
                'publishedAt' => 'desc'
            ];
        }

        $response = $this->elasticsearch->search($params);

        return $this->transformArray($response['hits']['hits']);
    }

    public function filter($field = '', $value = '')
    {
        return [];
    }

    private function transformArray($hits) {
        $arr = [];
        foreach($hits as $item) {
            $article = new Article();
            $article->fill($item['_source']);
            $article->getUrl();
            $arr[] = $article;
        }
        return $arr;
    }

}
