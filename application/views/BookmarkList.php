<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<h1>ブックマークリスト</h1>

<?php if (!empty($data) && is_array($data)): ?>
    <table>
        <thead>
            <tr>
                <th>タイトル</th>
                <th>URL</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $item): ?>
                <tr>
                    <?php if (isset($item->title) && isset($item->url)): ?>
                        <td>
                            <a href="<?php echo html_escape($item->url); ?>" target="_blank">
                                <?php echo html_escape($item->title); ?>
                            </a>
                        </td>
                        <td><?php echo html_escape($item->url); ?></td>
                    <?php else: ?>
                        <td colspan="2">ブックマーク情報が不完全です。</td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php elseif (empty($data)): ?>
    <p>ブックマークは登録されていません。</p>
<?php else: ?>
    <p>データを表示できませんでした。</p>
<?php endif; ?>

<br>
<a href="<?php echo base_url('index.php/AddForm'); ?>" style="text-decoration: none;">
    <button type="button">追加フォーム</button>
</a>

</body>
</html>