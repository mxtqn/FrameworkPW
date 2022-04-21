<?php
// src/Controller/postsController.php
namespace App\Controller;

use App\Controller\AppController;

class PostsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function index()
    {
        $posts = $this->Posts->find();
        $this->set(compact('posts'));
    }

    public function view($id)
    {
        $post = $this->Posts->findAllById($id)->firstOrFail();
        $this->set(compact('post'));
    }

    public function add()
    {
        $post = $this->Posts->newEmptyEntity();
        if ($this->request->is('post')) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());

            // Hardcoding the user_id is temporary, and will be removed later
            // when we build authentication out.
            $post->user_id = 1;

            if ($this->Posts->save($post)) {
                $this->Flash->success(__('Your post has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your post.'));
        }
        $this->set('post', $post);
    }

    public function edit($id)
    {
        $post = $this->Posts
            ->findAllById($id)
            ->firstOrFail();

        if ($this->request->is(['post', 'put'])) {
            $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('Your post has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your post.'));
        }

        $this->set('post', $post);
    }
    // src/Controller/postsController.php

    // Add the following method.

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $post = $this->Posts->findAllById($id)->firstOrFail();
        if ($this->Posts->delete($post)) {
            $this->Flash->success(__('The {0} post has been deleted.', $post->title));
            return $this->redirect(['action' => 'index']);
        }
    }
}
