
// Load GPT
var googletag = googletag || {};
googletag.cmd = googletag.cmd || [];
(function(){
    var gads = document.createElement('script');
    gads.async = true;
    var useSSL = 'https:' == document.location.protocol;
    gads.src = (useSSL ? 'https:' : 'http:') +
            '//www.googletagservices.com/tag/js/gpt.js';
    var node = document.getElementsByTagName('script')[0];
    node.parentNode.insertBefore(gads, node);
})();

// setTargeting
setTimeout(function () {
  // define each ad slot

  var leader = {
    sizes: [[728,90],[970,66],[970,90],[970,250],[1000,90],[1034,250],[1034,150],[1034,90]],
    sizeMapping: [[[1023,0],[[728,90],[970,66],[970,90],[970,250],[1000,90],[1034,250],[1034,150],[1034,90]]],[[969,0],[[970,66],[970,90]]],[[727,0],[[728,90],[728,160]]]]
  };


  var top = {
    sizes: [[300,250],[300,600],[300,1050]],
    sizeMapping: [[[727,0],[[300,250],[300,600],[300,1050]]]]
  };

  var bottom = {
    sizes: [[300,250],[300,600]],
    sizeMapping: [[[969,0],[[300,250],[300,600]]]]
  };

  var targeting = {
    "tag":[
      "parenting"
    ],
    "ch": "parenting",
    "match": false,
    "score2": "klow",
    "score": "low",
    "score1": "slow",
    "ci": "ART-1103957",
    "site": "sheknows",
    "ct": "articles",
    "tpid": "4276eecd964d410de712c42dd949e58c"
  };

  googletag.defineSlot("/8352/sheknows/parenting/baby", leader.sizes, "dfp-slot-leaderboard").defineSizeMapping(leader.sizeMapping)
    .addService(googletag.pubads());

  googletag.defineSlot(
      "/8352/sheknows/parenting/baby",
      top.sizes,
      "dfp-slot-right-rail-top-desktop")
    .defineSizeMapping(top.sizeMapping)
    .addService(googletag.pubads());

  googletag.defineSlot(
      "/8352/sheknows/parenting/baby",
      bottom.sizes,
      "dfp-slot-right-rail-bottom")
    .defineSizeMapping(bottom.sizeMapping)
    .addService(googletag.pubads());

  var mykeys = Object.keys(targeting);
  mykeys.forEach(function (key, index) {
      googletag.cmd.push(function () {
          googletag.pubads().setTargeting(index, targeting[key]);
      });
  });

  googletag.cmd.push(function () {
      googletag.pubads().setTargeting('site', 'sheknows');
      googletag.pubads().enableSingleRequest();
      googletag.enableServices();
      googletag.display("dfp-slot-leaderboard");
  });

}, 1000);
