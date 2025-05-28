<?php
echo form_open('AddForm/SaveForm');
?>

<div>
  Server messages
  <?php
  if (isset($failure_message))
  {
      echo $failure_message;
  }
  ?>
</div>

<p>
  <?php echo form_label('URL', 'url_field'); ?><br>
  <?php $url_data = array(
    'name' => 'url_field',
    'id' => 'url_field',
    'placeholder' => 'http://example.com',
    'value' => set_value('url_field')
  );
  echo form_input($url_data);
  ?>
</p>
<p>
  <?php echo form_label('Title', 'title_field'); ?><br>
  <?php $title_data = array(
    'name' => 'title_field',
    'id' => 'title_field',
    'placeholder' => 'ブックマークのタイトル',
    'value' => set_value('title_field')
  );
  echo form_input($title_data);
  ?>
</p>
<p>
  <?php echo form_submit('submit', '保存'); ?>
</p>
<p>
  <?php echo form_close(); ?>
</p>