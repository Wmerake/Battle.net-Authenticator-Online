<?php
include('includes/config.php');
$days = round((time() - strtotime("2013-06-20")) / 3600 / 24);
$sql = "SELECT COUNT(*) FROM `users` UNION SELECT  COUNT(*) FROM `authdata`;";
$result = @mysqli_query($dbconnect, $sql);
$rowtemp = mysqli_fetch_array($result);
$user_count = $rowtemp[0];
$rowtemp = mysqli_fetch_array($result);
$auth_count = $rowtemp[0];
$topnavvalue = false;
$errortext = array("未知核弹已经升空", "页面未找到");
$errorwhat = array("网站受到冲击波影响，爆炸前会出现短暂颠簸。 ", "您要查看的页面不存在或是某个恐怖、惨不忍睹的错误发生了");
$chooseerrort = rand(0, count($errortext) - 1);
?>
<?php

function create_donate_table() {
    $sql = "SELECT * FROM `donate_data`";
    $donate_array = queryArray($sql);
    $html = '';
    foreach ($donate_array as $value) {
        $nickname = $value['donate_name'];
        $dtime = date("Y-m-d", $value['donate_time']);
        $dbizhong = $value['donate_bizhong'];
        $dcount = $value['donate_count'];
        $html.='<tr class = "parent-row">';
        $html.='<td class = "normaltd authbianhaoa" valign = "top">' . $nickname . '</td>';
        $html.='<td class = "normaltd authbianhaoa" valign = "top">' . $dtime . '</td>';
        $html.='<td class = "normaltd authbianhaoa" valign = "top">' . $dbizhong . '</td>';
        $html.='<td class = "normaltd authbianhaoa" valign = "top">' . $dcount . '</td>';
        $html.='</tr>';
    }
    return $html;
}
?>
<!DOCTYPE html>
<html>
    <head> 
        <script>
            var siteaddressforalljsfile = "<?php echo SITEHOST; ?>";
        </script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="og:title" content="<?php echo TITLENAME ?>">
        <meta name="og:description" content="<?php echo WEIBOMESSAGE ?>">
        <meta property="og:image" content="resources/weiboimg/fbshare.png" />
        <title><?php echo TITLENAME ?>-捐赠</title>
        <link rel="stylesheet" href="resources/css/articles.css" type="text/css" />
        <link rel="stylesheet" href="resources/css/header.css" type="text/css" />
        <link rel="stylesheet" href="resources/css/body.css" type="text/css" />
        <link rel="stylesheet" href="resources/css/footer.css" type="text/css" />
        <link rel="stylesheet" href="resources/css/myauthall.css" type="text/css" />
        <link rel="shortcut icon" type="image/x-icon" href="resources/img/favicon.ico"> 
        <?php
        if (SSLMODE == 1) {
            echo '<script type="text/javascript" src="https://lib.sinaapp.com/js/jquery/3.1.0/jquery-3.1.0.min.js"></script>';
        } else {
            echo '<script type="text/javascript" src="http://lib.sinaapp.com/js/jquery/3.1.0/jquery-3.1.0.min.js"></script>';
        }
        ?>
        <script>
            var _hmt = _hmt || [];
            (function () {
                var hm = document.createElement("script");
                var Baidu_Js_Server = (("https:" == document.location.protocol) ? "https://" : "http://");
                hm.src = Baidu_Js_Server + "hm.baidu.com/hm.js?<?=BAIDUTONGJI_ID;?>";
                var s = document.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(hm, s);
            })();
        </script>
        <style>
            #layout-top{
                background: transparent none repeat scroll 0% 0%;
            }
            .authbianhaoa{
                padding: 0px;
                padding-top: 10px;
            }
            .normaltd {
                cursor: auto;
            }
        </style>
    </head>

    <body>
        <div id="layout-top-nobackground">
            <div id="topwrapper">
                <?php include('includes/page_inc/header_normal.php'); ?>

                <div class="error-page" style="padding-top: 20px;">
                    <p style="font-size:42px;text-align: left;">捐赠</p>
                    <p style="padding-top: 10px;text-align: left;">
                        我利用闲暇时间开发了在线版战网安全令服务，我并没有希望这个服务能给我提供多少收入，但是我还是继续更新了代码。<br>
                        有些认识我的用户也知道，我做了很多东西，但是从来都没有强制要求对这些东西收费，但是实际情况是，服务器、域名、流量,每一项都需要我自己维持一定开支。<br>
                        随着用户的增加，这些花销也是越来越大，所以您的一点点捐赠对我和我的服务而言都是极大的支持，如果我能得到一些让人快乐的东西，那真是极好的！<br>
                        服务器已迁移至Linode东京机房，访问速度快，但最低配置每个月也需要10美元才能维持下去，希望大家有能力的可以支持一点费用，让网站的使用体验更好！
                    </p>
                    <br>
                    <hr>
                    <p style="font-size:32px;text-align: left;padding-top: 5px;">你能得到什么</p>
                    <p style="padding-top: 10px;text-align: left;">
                        如果您一次性捐款超过100元人民币或者15美元，账号安全令数量限制提高到<?php echo MOST_AUTH_DONATED; ?>个，你可以比普通用户多增加<?php echo (MOST_AUTH_DONATED - MOST_AUTH); ?>枚安全令<br>
                        如需增加数量限制，请将您的账号名称和捐赠截图通过邮件发送至<a href="mailto:webmaster@myauth.us">我的邮箱</a>
                    </p>
                    <br>
                    <hr>
                    <p style="font-size:32px;text-align: left;padding-top: 5px;">捐赠方式</p>
                    </p>
                    <br>
                    <div class="error-header" style="font-size:32px;margin-bottom: 20px;">比特币地址/Bitcoin Address
                    </div>
                    <div class="error-desc">1yE2qmvj89QG1gVL9zghPYsyUTWu3S222</div>
                    <br>
                    <br>
                    <div class="error-header" style="font-size:32px;margin-bottom: 20px;">贝宝/Paypal
                    </div>
                    <div class="error-desc">
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                            <input type="hidden" name="cmd" value="_donations">
                            <input type="hidden" name="business" value="ymback@sayyoulove.me">
                            <input type="hidden" name="lc" value="US">
                            <input type="hidden" name="item_name" value="Donate to Battlenet Authenticator Online">
                            <input type="hidden" name="return" value="<?= SITEHOST . "donate.php" ?>"/>
                            <input type="hidden" name="cancel_return" value="<?= SITEHOST . "donate.php" ?>"/>
                            <input type="hidden" name="no_note" value="0">
                            <input type="hidden" name="currency_code" value="USD">
                            <input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest">
                            <input type="image" src="https://www.paypalobjects.com/zh_XC/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="向战网安全令在线版捐赠">
                            <img alt="" border="0" src="https://www.paypalobjects.com/zh_XC/i/scr/pixel.gif" width="1" height="1">
                        </form>
                        <br>
                        注意：由于Paypal需要收取手续费，每次0.3刀加总额3%左右，所以捐太少就等于捐给Paypal了，不如使用支付宝。
                    </div>
                    <br>
                    <br>
                    <div class="error-header" style="font-size:32px;margin-bottom: 20px;">支付宝/Alipay
                    </div>
                    <div class="error-desc">
                        <img src="resources/img/alipayqr.png">
                    </div>
                    <br>
                    <br>
                    <div class="error-header" style="font-size:32px;margin-bottom: 20px;">微信/WeChat
                    </div>
                    <div class="error-desc">
                        <img src="resources/img/wechatqr.png">
                    </div>
                    <br>
                    <hr>
                    <br>
                    <h2>土豪榜</h2>
                    <br>
                    <div class="data-container type-table">
                        <table>
                            <thead>
                                <tr class="">
                                    <th align="center"><span class="arrow">
                                            土豪的名字</span>
                                    </th>
                                    <th align="center"><span class="arrow">
                                            啥时候捐的
                                        </span></th>
                                    <th align="center"><span class="arrow">
                                            捐了啥
                                        </span></th>
                                    <th align="center">
                                        <span class="arrow">
                                            捐了多少
                                        </span>
                                    </th></tr></thead>
                            <tbody>
                                <?= create_donate_table(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div id="layout-bottom">
            <div id="homewrapperbotton">
                <div id="footer">
                    <div id="footline">
                        <div id="sitemap">
                            <div class="column">
                                <h3 class="pages">
                                    <a href="<?php echo SITEHOST ?>" tabindex="100">站点页面</a>
                                </h3>
                                <ul>
                                    <li><a href="<?php echo SITEHOST ?>welcome.php">WELCOME</a></li>
                                    <li><a href="<?php echo SITEHOST ?>faq.php">FAQ</a></li>
                                    <li><a href="<?php echo SITEHOST ?>donate.php">捐赠</a></li>
                                </ul>
                            </div>
                            <div class="column">
                                <h3 class="auths">
                                    <a href="<?php echo SITEHOST ?>myauthall.php" tabindex="100">安全令</a>
                                </h3>
                                <ul>
                                    <li><a href="<?php echo SITEHOST ?>auth.php">默认安全令</a></li>
                                    <li><a href="<?php echo SITEHOST ?>myauthall.php">我的安全令</a></li>
                                    <li><a href="<?php echo SITEHOST ?>addauth.php">添加安全令</a></li>
                                </ul>
                            </div>
                            <div class="column">
                                <h3 class="account">
                                    <a href="<?php echo SITEHOST ?>account.php" tabindex="100">账号</a>
                                </h3>
                                <ul>
                                    <li><a href='<?php echo SITEHOST ?>forgetpwd.php'>忘记密码</a></li>
                                    <li><a href='<?php echo SITEHOST ?>register.php'>注册账号</a></li>
                                    <li><a href='<?php echo SITEHOST ?>login.php'>登入账号</a></li>
                                </ul>
                            </div>
                            <div class="column">
                                <h3 class="setting">
                                    <a href="<?php echo SITEHOST ?>" tabindex="100">其他</a>
                                </h3>
                                <ul>
                                    <li><a href="<?php echo SITEHOST ?>copyright.php">版权声明及免责条款</a></li>
                                    <li><a href="<?php echo SITEHOST ?>about.php">关于本站</a></li>
                                    <li><a href="mailto:webmaster@myauth.us">联系</a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="copyright">
                            ©
                            <?php
                            if (date('Y') == 2013)
                                echo "2013";
                            else
                                echo "2013-" . date('Y');
                            ?> 
                            竹井詩織里版权所有。
                            <p>
                                <span>建站时间: 2013年6月20日</span>
                                <span>安全运行: <?php echo $days ?>天</span>
                                <span>用户总数: <?php echo $user_count; ?></span>
                                <span>令牌总数: <?php echo $auth_count; ?></span>
                                <span>
                                    <img  onclick="shareweibo('sina')" title="分享到新浪微博" alt="分享到新浪微博" src="resources/weiboimg/sina.png" style="height: 15px; width: 15px; cursor: hand; cursor: pointer;"></img>
                                    <img  onclick="shareweibo('tencent')" title="分享到腾讯微博" alt="分享到腾讯微博" src="resources/weiboimg/qq.png" style="height: 15px; width: 15px; cursor: hand; cursor: pointer;"></img>
                                    <img  onclick="shareweibo('sohu')" title="分享到搜狐微博" alt="分享到搜狐微博" src="resources/weiboimg/sohu.png" style="height: 15px; width: 15px; cursor: hand; cursor: pointer;"></img>
                                    <img  onclick="shareweibo('netease')" title="分享到网易微博" alt="分享到网易微博" src="resources/weiboimg/163.png" style="height: 15px; width: 15px; cursor: hand; cursor: pointer;"></img>
                                    <img onclick="shareweibo('facebook')" title="分享到FACEBOOK" alt="分享到FACEBOOK" src="resources/weiboimg/fb.png" style="height: 15px; width: 15px; cursor: pointer; cursor: pointer;"/>
                                    <img onclick="shareweibo('twitter')" title="分享到TWITTER" alt="分享到TWITTER" src="resources/weiboimg/twitter.png" style="height: 15px; width: 15px; cursor: pointer; cursor: pointer;"/>
                                    <img onclick="shareweibo('plurk')" title="分享到PLURK" alt="分享到PLURK" src="resources/weiboimg/plurk.png" style="height: 15px; width: 15px; cursor: pointer; cursor: pointer;"/>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        $(document).ready(function () {
            $("#page-content").height($(".article-column").outerHeight(true));
            if ($("#layout-middle").outerHeight(true) < 360) {
                $("#layout-bottom").css("background", "url('resources/img/toumin.png') no-repeat 50% 70%");
            }
        });


        function shareweibo(e) {
            var _t = "<?php echo WEIBOMESSAGE; ?>";
            var _url = "<?php echo SITEHOST; ?>";
            var _sinakey = "<?php echo SINAKEY; ?>";
            var _tencentkey = "<?php echo TENCENTKEY; ?>";
            var _sohukey = "<?php echo SOHUKEY; ?>";
            var _neteasekey = "<?php echo NETEASEKEY; ?>";
            switch (e) {
                case "sina":
                    //(function(s,d,e){try{}catch(e){}var f='http://v.t.sina.com.cn/share/share.php?',u=d.location.href,p=['url='+_url+'&title='+_t+'&appkey='+_sinakey].join('');function a(){if(!window.open([f,p].join(''),'mb',['toolbar=0,status=0,resizable=1,width=620,height=450,left=',(s.width-620)/2,',top=',(s.height-450)/2].join('')))u.href=[f,p].join('');};if(/Firefox/.test(navigator.userAgent)){setTimeout(a,0)}else{a()}})(screen,document,encodeURIComponent);

                    var _usina = 'http://v.t.sina.com.cn/share/share.php?url=' + _url + '&title=' + _t + '&appkey=' + _sinakey;
                    window.open(_usina, '分享到新浪微博', 'toolbar=0,status=0,resizable=1,width=620,height=450,left=' + (screen.width - 620) / 2 + ',top=' + (screen.height - 450) / 2);
                    break;
                case "tencent":
                    var _utencent = 'http://v.t.qq.com/share/share.php?title=' + _t + '&url=' + _url + '&appkey=' + _tencentkey;
                    window.open(_utencent, '分享到腾讯微博', 'toolbar=0,status=0,resizable=1,width=700,height=580,left=' + (screen.width - 700) / 2 + ',top=' + (screen.height - 580) / 2);
                    break;
                case "sohu":
                    var _usohu = 'http://t.sohu.com/third/post.jsp?title=' + _t + '&url=\\n' + _url + '&appkey=' + _sohukey;
                    window.open(_usohu, '分享到搜狐微博', 'toolbar=0,status=0,resizable=1,width=660,height=470,left=' + (screen.width - 660) / 2 + ',top=' + (screen.height - 470) / 2);
                    break;
                case "netease":
                    var _unetease = 'http://t.163.com/article/user/checkLogin.do?info=' + _t + ' ' + _url + '&key=' + _neteasekey;
                    window.open(_unetease, '分享到网易微博', 'toolbar=0,status=0,resizable=1,width=660,height=470,left=' + (screen.width - 660) / 2 + ',top=' + (screen.height - 470) / 2);
                    break;
                case "facebook":
                    var _ufacebook = 'http://www.facebook.com/sharer.php?u=<?php echo SITEHOST; ?>';
                    window.open(_ufacebook, '分享到FACEBOOK', 'toolbar=0,status=0,resizable=1,width=660,height=470,left=' + (screen.width - 660) / 2 + ',top=' + (screen.height - 470) / 2);
                    break;
                case "twitter":
                    var _utwitter = 'https://twitter.com/intent/tweet?source=webclient&text=<?php echo SITEHOST; ?>%20<?php echo WEIBOMESSAGE ?>';
                    window.open(_utwitter, '分享到TWITTER', 'toolbar=0,status=0,resizable=1,width=660,height=470,left=' + (screen.width - 660) / 2 + ',top=' + (screen.height - 470) / 2);
                    break;
                case "plurk":
                    var _uplurk = 'http://www.plurk.com/?qualifier=shares&status=<?php echo SITEHOST; ?>%20<?php echo WEIBOMESSAGE ?>';
                    window.open(_uplurk, '分享到PLURK', 'toolbar=0,status=0,resizable=1,width=660,height=470,left=' + (screen.width - 660) / 2 + ',top=' + (screen.height - 470) / 2);
                    break;
            }
        }
    </script>
    <?php
    @$result->free();
    @mysqli_close($dbconnect);
    ?>
</html>
