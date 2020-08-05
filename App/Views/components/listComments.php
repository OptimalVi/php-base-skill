<? $isGet = ($data['request_method'] === 'GET'); ?>

<? if ($isGet) { ?>
    <div class="listComments"><? } ?>

<? foreach ($data['comments'] as $num => $comment): ?>
    <article class="comment listComments__item">
        <header class="comment__header">
            <div class="comment__userName"><?= $comment['name'] ?></div>
            <span class="comment__time"><?= $comment['time'] ?></span>
            <span class="comment__date"><?= $comment['date'] ?></span>
        </header>
        <div class="comment__text"><?= $comment['text'] ?></div>
    </article>
<? endforeach; ?>

<? if ($isGet) { ?> </div><? }
