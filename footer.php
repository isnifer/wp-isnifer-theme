    <footer id="footer">
      <div style="text-align: center;"><!-- Yandex.Metrika informer -->
        <a href="http://metrika.yandex.ru/stat/?id=14623369&amp;from=informer"
           target="_blank" rel="nofollow"><img src="//bs.yandex.ru/informer/14623369/3_0_FFFFFFFF_FAF0E6FF_0_pageviews"
                                               style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:14623369,type:0,lang:'ru'});return false}catch(e){}"/></a>
        <!-- /Yandex.Metrika informer -->

        <!-- Yandex.Metrika counter -->
        <script type="text/javascript">
          (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
              try {
                w.yaCounter14623369 = new Ya.Metrika({id:14623369, enableAll: true, webvisor:true});
              } catch(e) {}
            });

            var n = d.getElementsByTagName("script")[0],
              s = d.createElement("script"),
              f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
              d.addEventListener("DOMContentLoaded", f);
            } else { f(); }
          })(document, window, "yandex_metrika_callbacks");
        </script>
        <noscript><div><img src="//mc.yandex.ru/watch/14623369" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->
        <script type="text/javascript">

          var _gaq = _gaq || [];
          _gaq.push(['_setAccount', 'UA-32478934-1']);
          _gaq.push(['_trackPageview']);

          (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();

        </script>
        <!--LiveInternet counter--><script type="text/javascript"><!--
        document.write("<a href='http://www.liveinternet.ru/click' "+
          "target=_blank><img src='//counter.yadro.ru/hit?t14.6;r"+
          escape(document.referrer)+((typeof(screen)=="undefined")?"":
          ";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
            screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
          ";h"+escape(document.title.substring(0,80))+";"+Math.random()+
          "' alt='' title='LiveInternet: показано число просмотров за 24"+
          " часа, посетителей за 24 часа и за сегодня' "+
          "border='0' width='88' height='31'><\/a>")
        //--></script><!--/LiveInternet-->
      </div>
    </footer>
  </div>
  <script type="text/javascript">
    // jQuery SmoothScroll | Version 10-04-30
    $('a[href*=#top-header]').click(function() {

      // duration in ms
      var duration=1000;

      // easing values: swing | linear
      var easing='swing';

      // get / set parameters
      var newHash=this.hash;
      var target=$(this.hash).offset().top;
      var oldLocation=window.location.href.replace(window.location.hash, '');
      var newLocation=this;

      // make sure it's the same location

      if(oldLocation+newHash==newLocation)
      {
        // set selector
        if($.browser.safari) var animationSelector='body:not(:animated)';
        else var animationSelector='html:not(:animated)';

        // animate to target and set the hash to the window.location after the animation
        $(animationSelector).animate({ scrollTop: target }, duration, easing, function() {

          // add new hash to the browser location
          window.location.href=newLocation;
        });

        // cancel default click action
        return false;
      }
    });
  </script>
</body>
</html>
