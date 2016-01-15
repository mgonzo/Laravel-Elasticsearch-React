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

    public function showChannel($id) 
    {
        return view('channel', $this->repository->one($id));
    }

    public function showChannelAmp($id)
    {
        return view('channel_amp', $this->repository->one($id));
    }
}

