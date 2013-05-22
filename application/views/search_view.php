<ul>
    <h1><?= $info['word'] ?> <small><?= $info['strongs'] ?></small></h1>
    <? foreach ($search as $s): ?>
    <li>
        <a href="<?= site_url('reading/' . $s['book_abbr'] . '.' . $s['chapter'] . '.' . $s['verse']) . '?strongs=' . $info['strongs'] ?>">
            <?= $s['book_name_chinese'] ?> <?= $s['chapter'] ?>:<?= $s['verse'] ?>
        </a>
        <? foreach ($s['text'] as $word): ?>
        <? if ($word['word'] == $s['word']): ?>
            <span style="color: red;"><?= $word['word'] ?></span>
        <? else: ?>
            <?= $word['word'] ?>
        <? endif; ?>
        <? endforeach; ?>
    </li>
    <? endforeach; ?>
</ul>