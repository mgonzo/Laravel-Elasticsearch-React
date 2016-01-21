<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Repositories\ArticleRepository;
use App\Repositories\ChannelRepository;
use Request;

class ChannelController extends Controller
{
    private $channelRepository;
    private $articleRepository;

    public function __construct(ChannelRepository $channelRepo, ArticleRepository $articleRepo) 
    {
        $this->channelRepository = $channelRepo;
        $this->articleRepository = $articleRepo;
    }

    public function showChannel($slug) 
    {
        $channel = $this->channelRepository->search([
            'searchField' => 'channel.slug', 
            'searchValue' => $slug
        ]);

        return view('channel', $channel[0]);
    }

    public function showChannelAmp($id)
    {
        return view('channel_amp', $this->repository->one($id));
    }
}

