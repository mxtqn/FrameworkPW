<?php
// src/Model/Table/ArticlesTable.php
namespace App\Model\Table;
use Cake\Validation\Validator;
use Cake\ORM\Table;

class PostsTable extends Table
{
    public function initialize(array $config): void
    {
        $this->addBehavior('Timestamp');
    }
    // src/Model/Table/ArticlesTable.php

    // add this use statement right below the namespace declaration to import
    // the Validator class

    // Add the following method.
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('title')
            ->minLength('title', 5)
            ->maxLength('title', 255)

            ->notEmptyString('body')
            ->minLength('body', 1);

        return $validator;
    }
}
