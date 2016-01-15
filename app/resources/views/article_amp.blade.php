<!doctype html>
<html amp lang="en">
  <head>
    <meta charset="utf-8">
    <title>{!! $title !!}}</title>
    <link rel="canonical" href="{{ $url }}" />
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <script type="application/ld+json">
      {
        "@context": "http://schema.org",
        "@type": "NewsArticle",
        "headline": "Open-source framework for publishing content",
        "datePublished": "2015-10-07T12:02:41Z",
        "image": [
          "logo.jpg"
        ]
      }
    </script>
    <style>body {opacity: 0}</style><noscript><style>body {opacity: 1}</style></noscript>
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <style amp-custom>{!! $amp_css !!}</style>
  </head>
  <body>
    <div class="content">
        <amp-ad width=728 height=90
            type="doubleclick"
            data-slot="/8352/sheknows/parenting/baby">
        </amp-ad>

        <header class="main">
            <i class="she"></i><i class="knows"></i>
        </header>
        <h2>{!! $title !!}</h2>
        <amp-img src="http://cdn.skim.gs/images/c_fill,h_338,w_600,dpr_1.0/{{ $image['id'] }}/{{ $image['filename'] }}" alt="{{ $title }}" height="338" width="600"></amp-img>
        <p>{!! $subtitle !!}</p>
        <span>{!! $body !!}</span>
    </div>
  </body>
</html>
