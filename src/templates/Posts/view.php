<h1><?= h($post->title) ?></h1>
<p><?= h($post->body) ?></p>
<p><small>Created: <?= $post->created->format(DATE_RFC850) ?></small></p>
<p><?= $this->Html->link('Edit', ['action' => 'edit', $post->id]) ?></p>