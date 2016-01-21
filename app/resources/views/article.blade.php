<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{!! $title !!}}</title>
        <link rel="amphtml" href="{{ $url }}/amp" />
        <link href="/css/app.css" rel="stylesheet">
        <!--script src="https://cdnjs.cloudflare.com/ajax/libs/react/0.14.3/react.js"></script-->
        @include('react')
        @include('jquery')
        <script src="/js/components.js"></script>
    </head>
    <body>
        <header class="main">
            <i class="she"></i><i class="knows"></i>
            {{-- This is an example of a server side rendered component.
                 The initial client side rendering MUST have the same props as the server side
                 rendered component. The blade directive will create the element on the page
                 that the client side render will use. --}}

            @react_component('Message', [ 'title' => 'Dave' ], [ 'prerender' => true, 'id' => 'message'])
            @react_component('Navigation', [ 'links' => $channels ], [ 'prerender' => true, 'id' => 'navigation'])

            <script>
              ReactDOM.render(React.createElement(Message, {title: "Dave"}), document.getElementById('message'));
              ReactDOM.render(React.createElement(Navigation, {links: {!! json_encode($channels) !!} }), document.getElementById('navigation'));
            </script>
        </header>
        <section class="page">
            <div id="dfp-slot-leaderboard"
                 class="leaderboard"
                 style="width: 100%;
                        position: relative;
                        top: 0;
                        text-align: center;"></div>

            <main>
                <article>
                    <header>
                        <h2>{!! $title !!}</h2>
                        <div class="author">
                            <a class="photo" href="{{ url('/') }}/authors/{{ $author['slug'] }}/articles">
                                <img class="avatar" src="http://cdn.sheknows.com/authors/profile/{{ $author['basename'] }}" alt="{{$author['name']}}">
                            </a>
                            <div class="info">
                                <span class="by">by <a class="by-link" href="{{ url('/') }}/authors/{{ $author['slug'] }}/articles">{{ $author['name'] }}</a></span>
                            </div>
                        </div>
                    </header>
                    <img src="http://cdn.skim.gs/images/c_fill,h_391,w_695,dpr_1.0/{{ $image['id'] }}/{{ $image['filename'] }}"
                         style="margin: -.5em"></img>
                    <p>{!! $subtitle !!}</p>
                    <span>{!! $body !!}</span>
                </article>
                @include('rightrail')

                {{-- Element for client side only rendering.
                     Commented out for server side rendering.
                <div id="new-list"></div>
                 --}}

                @react_component('ListApplication', ['source' => "/list/{{channel['slug']}}" ], [ 'prerender' => true, 'id' => 'new-list'])
                
            </main>
        </section>

        <p>{{ $channel['name'] }}</p>
        <p>{{ $channel['slug'] }}</p>
        <p>{{ $id }}</p>
        <p>{{ $url }}</p>
        <script src="/js/ads.js"></script>

        <script>
            window.addEventListener('click', function (event) {
                //console.log(event.target);
                //console.log(event.target.dataset);
            });

            /* * Client side renderer for the article list */
            ReactDOM.render(
              React.createElement(
                ListApplication, { 
                source: '/list/{{ $channel['slug'] }}'
              }), 
              document.getElementById('new-list')
            );

        </script>

    </body>
</html>
