<!-- File: templates/posts/index.php -->

<h1>Posts</h1>


<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Created</th>
        <th>Action</th>
    </tr>

    <!-- Here is where we iterate through our $posts query object, printing out post info -->
    
    <?php foreach ($posts as $post) : ?>
        <tr>
            <td>
                <?= $this->Html->link($post->id, ['action' => 'view', $post->id]) ?>
            </td>
            <td>
                <?= $this->Html->link($post->title, ['action' => 'view', $post->id]) ?>
            </td>
            <td>
                <?= $post->created->format(DATE_RFC850) ?>
            </td>
            <td>
                <?= $this->Html->link('Edit', ['action' => 'edit', $post->id]) ?>
                <?= $this->Form->postLink(
                    'Delete',
                    ['action' => 'delete', $post->id],
                    ['confirm' => 'Are you sure?']
                )
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<h1> </h1>

<?= $this->Html->link('Add', ['action' => 'add']) ?>