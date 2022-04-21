<h1>Edit post</h1>
<?php
    echo $this->Form->create($post);
    echo $this->Form->control('user_id', ['type' => 'hidden']);
    echo $this->Form->control('title');
    echo $this->Form->control('body', ['rows' => '3']);
    echo $this->Form->button(__('Save post'));
    echo $this->Form->end();
?>