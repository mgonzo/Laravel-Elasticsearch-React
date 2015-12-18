<!DOCTYPE html>
<html>
    <head>
        <title>Article Title Goes Here</title>
        <link href="/css/app.css" rel="stylesheet">
        @include('jquery')
        @include('react')
        @include('reactdom')
    </head>
    <body>

        <section class="page">
            <div id="dfp-slot-leaderboard"
                 class="leaderboard"
                 style="width: 100%;
                        position: relative; 
                        top: 0;">
            </div>
            <main>
                <article>
                    <header>
                        <h2>{{ $title }}</h2>
                        <div class="author">
                            <a class="photo" href="{{ url('/') }}/authors/{{ $author['slug'] }}/articles">
                                <img class="avatar" src="http://cdn.sheknows.com/authors/profile/{{ $author['basename'] }}" alt="{{$author['name']}}">
                            </a>
                            <div class="info">
                                <span class="by">by <a class="by-link" href="{{ url('/') }}/authors/{{ $author['slug'] }}/articles">{{ $author['name'] }}</a></span>
                            </div>
                        </div>
                    </header>
                    <img src="http://cdn.skim.gs/images/c_fill,h_391,w_695,dpr_1.0/{{ $image['id'] }}/{{ $image['filename'] }}"></img>
                    <p>{{ $subtitle }}</p>
                    <span>{!! $body !!}</span>
                </article>
                @include('rightrail')
                <div id="new-list"></div>
            </main>
        </section>

        <p>{{ $channel['name'] }}</p>
        <p>{{ $channel['slug'] }}</p>
        <p>{{ $id }}</p>
        <p>{{ $url }}</p>
        <script src="/js/build.js"></script>
        <script src="/js/ads.js"></script>

        <script>
            window.addEventListener('click', function (event) {
                console.log(event.target);
                console.log(event.target.dataset);
            });
        </script>

    </body>
</html>
