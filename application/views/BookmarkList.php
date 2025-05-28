<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ブックマークリスト</title>
</head>
<body>

<h1>ブックマークリスト</h1>

<?php if (!empty($data) && is_array($data)): ?>
    <ul>
        <?php foreach ($data as $item): ?>
            <li>
                <?php if (isset($item->name) && isset($item->url)): ?>
                    <a href="<?php echo html_escape($item->url); ?>" target="_blank">
                        <?php echo html_escape($item->name); ?>
                    </a>
                <?php else: ?>
                    ブックマーク情報が不完全です。
                    <?php // デバッグ用に$itemの内容を表示することもできます
                        // var_dump($item);
                    ?>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php elseif (empty($data)): ?>
    <p>ブックマークは登録されていません。</p>
<?php else: ?>
    <p>データを表示できませんでした。</p>
<?php endif; ?>

</body>
</html>