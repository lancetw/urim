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
        <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">

        <!-- we need jQuery -->
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <!-- we need tabs javascript plugin of twitter bootstrap -->
        <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>

        <link href="<?= base_url('js/jquery.nanoscroller.0.6.9/nanoscroller.css'); ?>" rel="stylesheet">
        <script src="<?= base_url('js/jquery.nanoscroller.0.6.9/jquery.nanoscroller.min.js'); ?>"></script>

        <script type="text/javascript" src="<?= base_url('js/noty/jquery.noty.js'); ?>"></script>
        <script type="text/javascript" src="<?= base_url('js/noty/layouts/bottom.js'); ?>"></script>
        <!-- You can add more layouts if you want -->
        <script type="text/javascript" src="<?= base_url('js/noty/themes/default.js'); ?>"></script>

        <script type="text/javascript" src="<?= base_url('js/ios-orientationchange-fix.js'); ?>"></script>
        <script type="text/javascript" src="<?= base_url('js/bootstrapx-clickover.js'); ?>"></script>


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
                <a class="brand" href="./">URIM</a>

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

            <ul class="breadcrumb">
                <li><a rel="clickover" href="#" data-original-title="Tanakh" data-content="" data-ref="clickover_place_tanakh">Tanakh</a> <span class="divider">/</span></li>
                <li><a rel="clickover" href="#" data-original-title="Torah" data-content="" data-ref="clickover_place_torah">Torah</a> <span class="divider">/</span></li>
                <li class="active"><?= $info['book_english'] ?></li>
            </ul>

            <ul class="pager">
                <li class="previous<? if (empty($layout['next'])): ?> disabled<? endif; ?>">
                    <? if (!empty($layout['next'])): ?>
                    <a href="<?= site_url('reading/' . $layout['next']); ?>">&larr; 下一節</a>
                    <? endif; ?>
                </li>
                <li class="next<? if (empty($layout['prev'])): ?> disabled<? endif; ?>">
                    <? if (!empty($layout['prev'])): ?>
                    <a href="<?= site_url('reading/' . $layout['prev']); ?>">上一節 &rarr;</a>
                    <? endif; ?>
                </li>
            </ul>

            <a id="top"></a>

            <h3 class="book-title"><?= $info['book_chinese'] ?></h3>
            <h3 class="book-title-alt"><?= $info['book_hebrew'] ?> - <?= $info['book_english'] ?></h3>
            <p><span class="verse badge badge-inverse"><?= $info['chapter'] ?> : <?= $info['verse'] ?></span></p>
            <div class="bs-docs-example">
                <p class="the-message lead <?= $word['lang_type'] ?>">
                    <? foreach ($word['with_strongs'] as $item): ?>
                    <a href="#pop-content-h<?= $item['strongs'] ?>" data-ref="h<?= $item['strongs'] ?>" data-toggle="popover" data-placement="top" data-content="查無資料 :|" data-title="<?= $item['strongs'] ?>"><?= $item['word'] ?></a>
                    <? endforeach; ?>
                </p>
            </div>

            <ul class="nav nav-tabs" id="transTab">
                <li class="active"><a href="#chinese">中文</a></li>
                <li><a href="#english">English</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="chinese">
                    <pre class="the-translation chinese prettyprint"><code><a href="#" data-toggle="tooltip" title="新標點和合本">CUNP</a></code><?= $word['translation']['zh-hant']['cunp'] ?></pre>
                </div>
                <div class="tab-pane" id="english">
                    <pre class="the-translation english prettyprint"><code><a href="#" data-toggle="tooltip" title="Complete Jewish Bible">CJB</a></code><?= $word['translation']['en']['cjb'] ?></pre>
                    <pre class="the-translation english prettyprint"><code><a href="#" data-toggle="tooltip" title="King James Version">KJV</a></code><?= $word['translation']['en']['kjv'] ?></pre>
                </div>

            </div>

        <hr class="bs-docs-separator">

        </div>

         <div id="sidebar" class="span3 pull-left nano">
            <div class="content">
                <ul class="nav">
                    <? foreach ($lexicon as $item): ?>
                    <li id="pop-content-h<?= $item['strongs'] ?>" class="pop-content">
                        <ul>
                            <li class="top visible-phone"><a href="#top">TOP</a></li>
                            <li class="title hebrew"><?= $item['word'] ?></li>
                            <li><strong>Strong's H<?= $item['strongs'] ?></strong></li>
                            <li>音譯：<em><?= $item['sbl'] ?></em></li>
                            <li>字根：<?= $item['deriv'] ?></li>
                            <li>詞性：<?= $item['part_of_speech'] ?></li>
                            <li>定義：<?= $item['def'] ?></li>
                        </ul>
                    </li>
                    <? endforeach; ?>
                </ul>

                <div class="sidebar-padding"></div>
            </div>


        </div>

        <div class="clickover_place_torah" style="display:none">
            <div class="clickover-wrapper">
            <ul>
                <? foreach ($layout['bible']['torah'] as $item): ?>
                    <li><a href="<?= site_url('reading/' . $item['abbr'] . '.1.1'); ?>"><?= $item['name'] ?></a></li>
                <? endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="clickover_place_tanakh" style="display:none">
            <div class="clickover-wrapper">
                <ul>
                <? foreach ($layout['bible']['tanakh'] as $item): ?>
                    <li><a href="<?= site_url('reading/' . $item['abbr'] . '.1.1'); ?>"><?= $item['name'] ?></a></li>
                <? endforeach; ?>
                </ul>
            </div>
        </div>

    </div>
</div>
</body>

    <script>

    </script>
    </html>