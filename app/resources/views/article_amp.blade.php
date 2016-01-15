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

    <amp-ad width=728 height=90
        type="doubleclick"
        data-slot="/8352/sheknows/parenting/baby">
    </amp-ad>

    <h2>{!! $title !!}</h2>
    <amp-img src="http://cdn.skim.gs/images/c_fill,h_391,w_695,dpr_1.0/{{ $image['id'] }}/{{ $image['filename'] }}" alt="{{ $title }}" height="391" width="695"></amp-img>
    <p>{!! $subtitle !!}</p>
    <span>{!! $body !!}</span>
  </body>
</html>
