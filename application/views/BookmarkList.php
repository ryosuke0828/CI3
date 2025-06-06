<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<h1>ブックマークリスト</h1>

<form action="<?php echo base_url('index.php/BookmarkList/searchBookmarks'); ?>" method="post">
    <input type="text" name="search_title" placeholder="title" value="<?php echo isset($search_term) ? html_escape($search_term) : ''; ?>">
    <input type="submit" value="検索">
</form>
<br>

<?php if (!empty($data) && is_array($data)): ?>
    <table>
        <thead>
            <tr>
                <th>タイトル</th>
                <th>URL</th>
                <th>お気に入り</th>
                <th>削除</th>
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
                        <td>
                            <input type="checkbox" class="favorite-checkbox" data-id="<?php echo $item->id; ?>" <?php echo (isset($item->is_favorite) && $item->is_favorite == 1) ? 'checked' : ''; ?>>
                        </td>
                        <td>
                            <a href="<?php echo base_url('index.php/BookmarkList/DeleteBookmark/' . $item->id); ?>" 
                               onclick="return confirm('このブックマークを削除しますか？');"
                               style="text-decoration: none;">
                                <button type="button" style="background-color: #dc3545; color: white; border: none; padding: 5px 10px; border-radius: 3px; cursor: pointer;">DELETE</button>
                            </a>
                        </td>
                    <?php else: ?>
                        <td colspan="4">ブックマーク情報が不完全です。</td>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('.favorite-checkbox');
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            const bookmarkId = this.dataset.id;
            const isChecked = this.checked;

            fetch('<?php echo base_url("index.php/BookmarkList/favorite/"); ?>' + bookmarkId, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({ is_favorite: isChecked ? 1 : 0 })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log('Favorite status updated successfully.');
                } else {
                    console.error('Failed to update favorite status.');
                    this.checked = !isChecked;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                this.checked = !isChecked;
            });
        });
    });
});
</script>

</body>
</html>