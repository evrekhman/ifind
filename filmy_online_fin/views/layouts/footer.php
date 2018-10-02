

        <footer class="footer">
            <div class="footer-wrapper">
                <div class="footer-widgets">


                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12 col-sm-6">

                                        <div class="widget">
                                            <h3 class="widget-title">ABOUT FILMY-ONLINE.CC</h3>

                                            <div class="widget-content">
                                                <p>сайт предназначен с целью ознакомления</p>
                                                <a href="/about">для Правообладателей</a>
                                            </div>
                                        </div>

                                    </div>

                                    
                                </div>
                            </div>

                            <div class="col-md-2 col-sm-6">

                                

                            </div>

                            <div class="col-md-2 col-sm-6">

                                

                            </div>

                            <div class="col-md-4">

                                <div class="widget">
                                    <h3 class="widget-title">Are You Like Me</h3>

                                    <ul class="list-socials">
                                        <script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
                                        <script src="//yastatic.net/share2/share.js"></script>
                                        <div class="ya-share2 " data-services="vkontakte,facebook,odnoklassniki,moimir,twitter,blogger,viber,whatsapp,telegram"></div>
                                    </ul>
                                </div>



                                <div class="widget">
                                    
                                </div>
                                <!-- /.widget -->

                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.footer-widgets -->

                <div class="footer-copyright">
                    <div class="container">
                        <div class="copyright">
                            <p>Любое копирование текстовой информации возможно только с явного согласия владельца интернет ресурса, некоторая текстовая информация предоставленна со стороны кинопоиска</p>
                        </div>

                        <div class="footer-nav">
                            
                        </div>
                    </div>
                </div>
                <!-- /.footer-copyright -->
            </div>
            <!-- /.footer-wrapper -->

            <a href="#" class="back-top" title="">
                <span class="back-top-image">
                    <img src="/template/html/hosoren/img/back-top.png" alt="">
                </span>

                <small>Back top top</small>
            </a>
            <!-- /.back-top -->
        </footer>
        <!-- /footer -->

    </div>
    <!-- /#wrapper -->


    <div id="login-popup" class="white-popup login-popup mfp-hide">
        <div role="tabpanel">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#account-login" aria-controls="account-login" role="tab" data-toggle="tab">Account Login</a>
                </li>

                <li role="presentation">
                    <a href="#account-register" aria-controls="account-register" role="tab" data-toggle="tab">Register</a>
                </li>
            </ul>
            <!-- /.nav -->

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="account-login">
                    <form action="index.html" method="POST">
                        <div class="form-group">
                            <label for="login-account">Account</label>
                            <input type="text" class="form-control" id="login-account">
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label for="login-password">Password</label>
                            <input type="password" class="form-control" id="login-password" data-show-password="true">
                        </div>
                        <!-- /.form-group -->

                        <div class="forgot-passwd">
                            <a href="#" title="">
                                <i class="icon icon-key"></i>
                                <span>Forgot your password?</span>
                            </a>
                        </div>
                        <!-- /.forgot-passwd -->

                        <div class="form-button">
                            <button type="submit" class="btn btn-lg btn-primary btn-block">Login</button>
                        </div>
                        <!-- /.form-group -->
                    </form>
                </div>
                <!-- /.tab-pane -->

                <div role="tabpanel" class="tab-pane" id="account-register">
                    <form action="index.html" method="POST">
                        <div class="form-group">
                            <label for="register-username">Username <sup>*</sup>
                            </label>
                            <input type="text" class="form-control" id="register-username">
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label for="register-email">Email <sup>*</sup>
                            </label>
                            <input type="text" class="form-control" id="register-email">
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label for="register-password">Password <sup>*</sup>
                            </label>
                            <input type="password" class="form-control" id="register-password">
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label for="register-confirm-password">Confirm Password <sup>*</sup>
                            </label>
                            <input type="password" class="form-control" id="register-confirm-password">
                        </div>
                        <!-- /.form-group -->

                        <div class="form-button">
                            <button type="submit" class="btn btn-lg btn-warning btn-block">Register</button>
                        </div>
                        <!-- /.form-button -->
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
    </div>
    <!-- /.login-popup -->

    <script>
        $(function() {
            $('a[href="#login-popup"]').magnificPopup({
                type:'inline',
                midClick: false,
                closeOnBgClick: false
            });
        });
    </script>



    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <?/*<script src="http://maps.google.com/maps/api/js?sensor=true"></script>*/?>

    <script src="/template/js/plugins.js"></script>
    
    
    <script src="/template/js/myscript.js<? echo "?".rand(2000,9999)?>"></script>
    <script type="text/javascript" src="/template/js/uMovie1.js<? echo "?".rand(2000,9999)?>"></script>
    
    <script>
        function showPars(){
            $("#togglePars").click(function(){$(".panal").toggle( "slow", function() {
                //Анимация парсера
              });});
            }
        function showSlaid(){
            $("#toggleSlaid").click(function(){$(".slaid").toggle( "slow", function() {
                //Анимация слайда
              });});
            }
        showPars();
        showSlaid();
    </script>
    

    <script src="/template/js/main.js"></script>

    <script src="/template/js/docs.js"></script>

    <script>
        searchd();
    </script>
    <!--LiveInternet counter--><script type="text/javascript">
        document.write("<a href='//www.liveinternet.ru/click' style='display:none;' "+
        "target=_blank><img src='//counter.yadro.ru/hit?t52.6;r"+
        escape(document.referrer)+((typeof(screen)=="undefined")?"":
        ";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
        screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
        ";"+Math.random()+
        "' alt='' title='LiveInternet: показано число просмотров и"+
        " посетителей за 24 часа' "+
        "border='0' width='88' height='31'><\/a>")
        </script><!--/LiveInternet-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-105886992-1', 'auto');
  ga('send', 'pageview');

</script>
        <!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter45841650 = new Ya.Metrika({
                    id:45841650,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/45841650" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->


</body>

</html>
