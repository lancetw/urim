<!DOCTYPE html>
    <html lang="zh-hant">
    <head>
        <title>URIM</title>
        <meta name="author" content="Hsin-lin Cheng aka lancetw, lancetw@gmail.com, 2013 Summer">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="viewport" content="initial-scale=1.0 minimum-scale=1.0 maximum-scale=1.0 user-scalable=no">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

        <link rel="apple-touch-icon" href="icon.png"/>

        <!-- twitter bootstrap stylesheet -->
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">

        <!-- we need jQuery -->
        <script src="//code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <!-- we need tabs javascript plugin of twitter bootstrap -->
        <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>

        <link href="<?= base_url('js/jquery.nanoscroller.0.6.9/nanoscroller.css'); ?>" rel="stylesheet">
        <script src="<?= base_url('js/jquery.nanoscroller.0.6.9/jquery.nanoscroller.min.js'); ?>"></script>

        <script type="text/javascript" src="<?= base_url('js/noty/jquery.noty.js'); ?>"></script>
        <script type="text/javascript" src="<?= base_url('js/noty/layouts/bottom.js'); ?>"></script>
        <script type="text/javascript" src="<?= base_url('js/noty/layouts/bottomCenter.js'); ?>"></script>
        <!-- You can add more layouts if you want -->
        <script type="text/javascript" src="<?= base_url('js/noty/themes/default.js'); ?>"></script>

        <script type="text/javascript" src="<?= base_url('js/ios-orientationchange-fix.js'); ?>"></script>
        <script type="text/javascript" src="<?= base_url('js/bootstrapx-clickover.js'); ?>"></script>

        <link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.min.css" rel="stylesheet">

        <script type="text/javascript" src="<?= base_url('js/mmenu-1.2.3/jquery.mmenu.js'); ?>"></script>
        <link type="text/css" media="screen" rel="stylesheet" href="<?= base_url('js/mmenu-1.2.3/mmenu.css'); ?>" />

        <link href="<?= base_url('css/base.css'); ?>" rel="stylesheet">
        <script src="<?= base_url('js/base.js'); ?>"></script>
    </head>

<body>
    <div class="container-narrow">

    <div class="navbar navbar-inverse navbar-fixed-top navbar-static-top">
        <div class="navbar-inner">
            <div class="container-fluid">

                <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </a>

                <!-- Be sure to leave the brand out there if you want it shown -->
                <a class="brand" href="#panel-nav">URIM<small>beta</small></a>

                <div class="slogan hidden-desktop">
                    <span class="item">Bible Study Collection</span>
                </div>

                <!-- Everything you want hidden at 940px or less, place within here -->
                <div class="nav-collapse collapse">
                    <ul class="nav">
                        <li><a href="<?= site_url('reading'); ?>">閱讀</a></li>
                        <li><a href="<?= site_url('resources'); ?>">資源</a></li>
                        <li class="active"><a href="<?= site_url('about'); ?>">關於</a></li>
                    </ul>
                </div>
                <div class="span4">
                    <form method="post" accept-charset="utf-8" action="<?= site_url('search') ?>"  class="navbar-search pull-left"  id="strongsform" />
                        <input name="strongs" type="text" class="input-block-level search-query" placeholder="Strong's number">
                    </form>
                </div>

            </div>
        </div>
    </div>

    <nav id="panel-nav">
    <ul>
        <li class="Label">希伯來聖經 (Tanakh)</li>
        <li><a href="<?= site_url('reading/' . $layout['bible']['torah'][0]['abbr'] . '.1.1'); ?>">訓誨（妥拉）</a>
            <ul>
                <? foreach ($layout['bible']['torah'] as $item): ?>
                <li><a href="<?= site_url('reading/' . $item['abbr'] . '.1.1'); ?>"><?= $item['name'] ?> <?= $item['hebrew'] ?></a></li>
                <? endforeach; ?>
            </ul>
        </li>
        <li><a href="<?= site_url('reading/' . $layout['bible']['prophets'][0]['abbr'] . '.1.1'); ?>">信息</a>
            <ul>
                <? foreach ($layout['bible']['prophets'] as $item): ?>
                <li><a href="<?= site_url('reading/' . $item['abbr'] . '.1.1'); ?>"><?= $item['name'] ?> <?= $item['hebrew'] ?></a></li>
                <? endforeach; ?>
            </ul>
        </li>
        <li><a href="<?= site_url('reading/' . $layout['bible']['writings'][0]['abbr'] . '.1.1'); ?>">著作</a>
            <ul>
                <? foreach ($layout['bible']['writings'] as $item): ?>
                <li><a href="<?= site_url('reading/' . $item['abbr'] . '.1.1'); ?>"><?= $item['name'] ?> <?= $item['hebrew'] ?></a></li>
                <? endforeach; ?>
            </ul>
        </li>
        <li class="Label">新約聖經 (B'rit Hadashah)</li>
        <li><a href="<?= site_url('reading/' . $layout['bible']['goodnews'][0]['abbr'] . '.1.1'); ?>">福音</a>
            <ul>
                <? foreach ($layout['bible']['goodnews'] as $item): ?>
                <li><a href="<?= site_url('reading/' . $item['abbr'] . '.1.1'); ?>"><?= $item['name'] ?> <?= $item['hebrew'] ?></a></li>
                <? endforeach; ?>
            </ul>
        </li>
        <? foreach ($layout['bible']['acts'] as $item): ?>
        <li><a href="<?= site_url('reading/' . $item['abbr'] . '.1.1'); ?>"><?= $item['name'] ?> <?= $item['hebrew'] ?></a></li>
        <? endforeach; ?>
        <li><a href="<?= site_url('reading/' . $layout['bible']['letters_paul_public'][0]['abbr'] . '.1.1'); ?>">保羅書信</a>
            <ul>
                <? foreach ($layout['bible']['letters_paul_public'] as $item): ?>
                <li><a href="<?= site_url('reading/' . $item['abbr'] . '.1.1'); ?>"><?= $item['name'] ?> <?= $item['hebrew'] ?></a></li>
                <? endforeach; ?>
            </ul>
        </li>
        <li><a href="<?= site_url('reading/' . $layout['bible']['letters_paul_private'][0]['abbr'] . '.1.1'); ?>">保羅私信</a>
            <ul>
                <? foreach ($layout['bible']['letters_paul_private'] as $item): ?>
                <li><a href="<?= site_url('reading/' . $item['abbr'] . '.1.1'); ?>"><?= $item['name'] ?> <?= $item['hebrew'] ?></a></li>
                <? endforeach; ?>
            </ul>
        </li>
        <li><a href="<?= site_url('reading/' . $layout['bible']['letters_general'][0]['abbr'] . '.1.1'); ?>">大公書信</a>
            <ul>
                <? foreach ($layout['bible']['letters_general'] as $item): ?>
                <li><a href="<?= site_url('reading/' . $item['abbr'] . '.1.1'); ?>"><?= $item['name'] ?> <?= $item['hebrew'] ?></a></li>
                <? endforeach; ?>
            </ul>
        </li>
        <? foreach ($layout['bible']['revelation'] as $item): ?>
        <li><a href="<?= site_url('reading/' . $item['abbr'] . '.1.1'); ?>"><?= $item['name'] ?> <?= $item['hebrew'] ?></a></li>
        <? endforeach; ?>

    </ul>
    </nav>

      <div class="about-header">
        <h1>URIM</h1>
        <p class="lead">聖經研讀工具集</p>
        <p class="lead">這話離你很近，就在你口中，就在你心裏。<a href="<?= site_url('reading/rom.10.8') ?>">羅馬書 10:8</a> (新漢語譯本)</p>
        <a class="btn btn-large btn-success" href="<?= site_url('reading') ?>">開始閱讀</a>
        <p class="clearfix"></p>
        <img class="img-polaroid img-rounded" alt="" src="<?= base_url('img/demo.png') ?>" />
      </div>

      <hr>

      <div class="row-fluid marketing">
        <div class="span6">
          <h4>自由、免費</h4>
          <p>免費使用，經文與字典使用公有領域資料，資料來源：<a href="https://github.com/bibleforge/BibleForgeDB">BibleForgeDB</a>、<a href="http://bible.fhl.net/public/">信望愛公開資料</a></p>

          <h4>跨平台</h4>
          <p>支援 Safari、Firefox、Chrome 等先進網頁瀏覽器</p>

          <h4>開放原始碼</h4>
          <p>所有程式碼可以在 <a href="https://github.com/lancetw/urim">GitHub</a> 自由取得</p>
        </div>

        <div class="span6">
          <h4>易用</h4>
          <p>以最方便的方式查詢聖經原文、直接考查原文</p>

          <h4>即時</h4>
          <p>選定經節、即時查詢希伯來原文與希臘原文解釋</p>

          <h4>便利</h4>
          <p>隨時隨地閱讀與查詢，支援各式平板、智慧型手機</p>
        </div>
      </div>

      <hr>

    <p class="footer">Developer: Hsin-lin Cheng aka lancetw, 2013 Summer &lt;lancetw@gmail.com&gt;</p>

    </div> <!-- /container -->
</body>

<script>

</script>
</html>