<!DOCTYPE html>
    <html lang="zh-hant">
    <head>
        <title>URIM</title>
        <meta name="author" content="Hsin-lin Cheng aka lancetw, lancetw@gmail.com, 2013 Summer">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="viewport" content="user-scalable=no, initial-scale=1.0, minimum-scale=1.0">
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
        <script type="text/javascript" src="<?= base_url('js/noty/layouts/center.js'); ?>"></script>
        <!-- You can add more layouts if you want -->
        <script type="text/javascript" src="<?= base_url('js/noty/themes/default.js'); ?>"></script>

        <script type="text/javascript" src="<?= base_url('js/ios-orientationchange-fix.js'); ?>"></script>
        <script type="text/javascript" src="<?= base_url('js/bootstrapx-clickover.js'); ?>"></script>

        <link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.min.css" rel="stylesheet">

        <link href="<?= base_url('css/base.css'); ?>" rel="stylesheet">
        <script src="<?= base_url('js/base.js'); ?>"></script>
    </head>

<body>
<div class="container-fluid">
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">

                <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </a>

                <!-- Be sure to leave the brand out there if you want it shown -->
                <a class="brand" href="./">URIM<small>beta</small></a>

                <div class="slogan hidden-desktop">
                    <span class="item">Bible Study Collection</span>
                </div>

                <!-- Everything you want hidden at 940px or less, place within here -->
                <div class="nav-collapse collapse">
                    <ul class="nav">
                        <li class="active">
                            <a href="<?= site_url('reading'); ?>">Reading</a>
                        </li>
                        <li><a href="#">Resources</a></li>
                        <li><a href="#">About</a></li>
                    </ul>
                </div>
                <div class="span4">
                    <form class="navbar-search pull-left">
                        <input type="text" class="input-block-level search-query" placeholder="Search">
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="row-fluid screen">

        <div id="content" class="span9">
            <div class="bookshelf">
                <div class="btn-group btn-group-vertical">
                    <a class="btn btn-inverse dropdown-toggle" data-toggle="dropdown" href="#">
                        訓誨
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <? foreach ($layout['bible']['torah'] as $item): ?>
                        <li><a href="<?= site_url('reading/' . $item['abbr'] . '.1.1'); ?>"><?= $item['name'] ?></a></li>
                        <? endforeach; ?>
                    </ul>
                </div>
                <div class="btn-group btn-group-vertical">
                    <a class="btn btn-inverse dropdown-toggle" data-toggle="dropdown" href="#">
                        信息
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <? foreach ($layout['bible']['prophets'] as $item): ?>
                        <li><a href="<?= site_url('reading/' . $item['abbr'] . '.1.1'); ?>"><?= $item['name'] ?></a></li>
                        <? endforeach; ?>
                    </ul>
                </div>
                <div class="btn-group btn-group-vertical">
                    <a class="btn btn-inverse dropdown-toggle" data-toggle="dropdown" href="#">
                        著作
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <? foreach ($layout['bible']['writings'] as $item): ?>
                        <li><a href="<?= site_url('reading/' . $item['abbr'] . '.1.1'); ?>"><?= $item['name'] ?></a></li>
                        <? endforeach; ?>
                    </ul>
                </div>
                <div class="btn-group btn-group-vertical">
                    <a class="btn btn-inverse dropdown-toggle" data-toggle="dropdown" href="#">
                        福音
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <? foreach ($layout['bible']['goodnews'] as $item): ?>
                        <li><a href="<?= site_url('reading/' . $item['abbr'] . '.1.1'); ?>"><?= $item['name'] ?></a></li>
                        <? endforeach; ?>
                    </ul>
                </div>
                <div class="btn-group btn-group-vertical">
                    <a class="btn btn-inverse dropdown-toggle" data-toggle="dropdown" href="#">
                        傳記
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <? foreach ($layout['bible']['acts'] as $item): ?>
                        <li><a href="<?= site_url('reading/' . $item['abbr'] . '.1.1'); ?>"><?= $item['name'] ?></a></li>
                        <? endforeach; ?>
                    </ul>
                </div>
                <div class="btn-group btn-group-vertical">
                    <a class="btn btn-inverse dropdown-toggle" data-toggle="dropdown" href="#">
                        保羅書信
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <? foreach ($layout['bible']['letters_paul_public'] as $item): ?>
                        <li><a href="<?= site_url('reading/' . $item['abbr'] . '.1.1'); ?>"><?= $item['name'] ?></a></li>
                        <? endforeach; ?>
                    </ul>
                </div>
                <div class="btn-group btn-group-vertical">
                    <a class="btn btn-inverse dropdown-toggle" data-toggle="dropdown" href="#">
                        保羅私信
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <? foreach ($layout['bible']['letters_paul_private'] as $item): ?>
                        <li><a href="<?= site_url('reading/' . $item['abbr'] . '.1.1'); ?>"><?= $item['name'] ?></a></li>
                        <? endforeach; ?>
                    </ul>
                </div>
                <div class="btn-group btn-group-vertical">
                    <a class="btn btn-inverse dropdown-toggle" data-toggle="dropdown" href="#">
                        大公書信
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <? foreach ($layout['bible']['letters_general'] as $item): ?>
                        <li><a href="<?= site_url('reading/' . $item['abbr'] . '.1.1'); ?>"><?= $item['name'] ?></a></li>
                        <? endforeach; ?>
                    </ul>
                </div>
                <div class="btn-group btn-group-vertical">
                    <a class="btn btn-inverse dropdown-toggle" data-toggle="dropdown" href="#">
                        啟示
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <? foreach ($layout['bible']['revelation'] as $item): ?>
                        <li><a href="<?= site_url('reading/' . $item['abbr'] . '.1.1'); ?>"><?= $item['name'] ?></a></li>
                        <? endforeach; ?>
                    </ul>
                </div>
            </div>

            <ul class="pager page-nav">
                <li class="previous previous2<? if (empty($layout['nextbook'])): ?> disabled<? endif; ?>">
                    <? if (!empty($layout['nextbook'])): ?>
                    <a href="<?= site_url('reading/' . $layout['nextbook']); ?>"><i class="icon-chevron-sign-down icon-3x"></i></a>
                    <? endif; ?>
                </li>
                <li class="previous<? if (empty($layout['next'])): ?> disabled<? endif; ?>">
                    <? if (!empty($layout['next'])): ?>
                    <a href="<?= site_url('reading/' . $layout['next']); ?>"><i class="icon-chevron-sign-left icon-3x"></i></a>
                    <? endif; ?>
                </li>
                <li class="next next2<? if (empty($layout['prevbook'])): ?> disabled<? endif; ?>">
                    <? if (!empty($layout['prevbook'])): ?>
                    <a href="<?= site_url('reading/' . $layout['prevbook']); ?>"><i class="icon-chevron-sign-up icon-3x"></i></a>
                    <? endif; ?>
                </li>
                <li class="next<? if (empty($layout['prev'])): ?> disabled<? endif; ?>">
                    <? if (!empty($layout['prev'])): ?>
                    <a href="<?= site_url('reading/' . $layout['prev']); ?>"><i class="icon-chevron-sign-right icon-3x"></i></a>
                    <? endif; ?>
                </li>

            </ul>

            <a id="top"></a>

            <div class="page-header">
                <h1 class="book-title"><?= $info['book_chinese'] ?> <small><?= $info['book_hebrew'] ?><? if ($info['book_hebrew'] !== $info['book_english']): ?> - <?= $info['book_english']; ?><? endif; ?></small></h1>
            </div>
            <p><span class="verse badge badge-inverse"><?= $info['chapter'] ?> : <?= $info['verse'] ?></span></p>
            <div class="bs-docs-example">
                <p class="the-message lead <?= $layout['type'] ?>">
                    <? foreach ($word['with_strongs'] as $item): ?>
                    <a href="#pop-content-<?= $layout['strongs_note'] ?><?= $item['strongs'] ?>" data-ref="<?= $layout['strongs_note'] ?><?= $item['strongs'] ?>" data-toggle="popover" data-placement="top" data-content="查無資料 :|" data-title="<?= $item['strongs'] ?>"><?= $item['word'] ?></a>
                    <? endforeach; ?>
                </p>
            </div>

            <ul class="nav nav-tabs" id="transTab">
                <li class="active"><a href="#chinese">中文</a></li>
                <li><a href="#english">English</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="chinese">
                    <pre class="the-translation chinese prettyprint"><code><a href="#" data-toggle="tooltip" title="新標點和合本">CUNP</a></code><sapn class="word"><?= $word['translation']['zh-hant']['cunp'] ?></sapn></pre>
                </div>
                <div class="tab-pane" id="english">
                    <pre class="the-translation english prettyprint"><code><a href="#" data-toggle="tooltip" title="Complete Jewish Bible">CJB</a></code><sapn class="word"><?= $word['translation']['en']['cjb'] ?></sapn></pre>
                    <pre class="the-translation english prettyprint"><code><a href="#" data-toggle="tooltip" title="King James Version">KJV</a></code><sapn class="word"><?= $word['translation']['en']['kjv'] ?></sapn></pre>
                </div>

            </div>

        <hr class="bs-docs-separator">

        </div>

         <div id="sidebar" class="span3 pull-left nano">
            <div class="content">
                <ul class="nav">
                    <? foreach ($lexicon as $item): ?>
                    <li id="pop-content-<?= $layout['strongs_note'] ?><?= $item['strongs'] ?>" class="pop-content">
                        <ul>
                            <li class="top visible-phone"><a href="#top">TOP</a></li>
                            <li class="title <?= $layout['type']; ?>"><?= $item['word'] ?></li>
                            <li class="strongs"><strong>Strong's <?= $layout['strongs_note'] ?><?= $item['strongs'] ?></strong></li>
                            <li>音譯：<em><?= $item['sbl'] ?></em></li>
                            <li>字根：<?= $item['deriv'] ?></li>
                            <? if (isset($item['part_of_speech'])): ?><li>詞性：<?= $item['part_of_speech'] ?></li><? endif; ?>
                            <li>定義：<?= $item['def'] ?></li>
                        </ul>
                        <a class="fhl-pop-link" rel="fhl-note" data-ref="<?= $layout['strongs_note'] ?><?= $item['strongs'] ?>" href="#"><img alt="" src="<?= base_url('img/fhl.png');?>" /></a>
                        <ul id="fhl-note-<?= $layout['strongs_note'] ?><?= $item['strongs'] ?>" class="fhl-note" style="display: none">
                            <? foreach ($item['fhl'] as $txt): ?>
                                <li><?= trim($txt) ?></li>
                            <? endforeach; ?>
                            </li>
                        </ul>
                    </li>
                    <? endforeach; ?>
                </ul>

                <div class="sidebar-padding"></div>
            </div>
        </div>
    </div>
</div>
</body>

    <script>

    </script>
    </html>