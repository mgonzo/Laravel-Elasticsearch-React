<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{!! $name !!}</title>
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

            @react_component('Navigation', [ 'links' => $channels ], [ 'prerender' => true, 'id' => 'navigation'])
            <script>
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
                <header>
                    <h2>{!! $name !!}</h2>
                </header>
                @include('rightrail')

                @react_component('ListApplication', ['source' => "/list/{{ $slug }}" ], [ 'prerender' => true, 'id' => 'new-list'])
                
            </main>
        </section>

        <script src="/js/ads.js"></script>

        <script>
            /* * Client side renderer for the article list */
            ReactDOM.render(
              React.createElement(
                ListApplication, { 
                source: '/list/{{ $slug }}'
              }), 
              document.getElementById('new-list')
            );
        </script>

    </body>
</html>
