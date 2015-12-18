<?php

namespace SheKnows\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use SheKnows\Repositories\ArticleRepository;
use Request;

class ArticleController extends Controller
{
    private $repository;

    public function __construct(ArticleRepository $repo) 
    {
        $this->repository = $repo;
    }

    public function showArticle($id) 
    {
        return view('article', $this->repository->one($id));
    }

    public function fetchArticleList($channel)
    {
        return $this->repository->search([
            'searchField' => 'channel.name', 
            'searchValue' => $channel, 
            'sortField' => 'publishedAt',
            'sortDirection' => 'desc',
            'page' => Request::input('page')
        ]);
    }
}

