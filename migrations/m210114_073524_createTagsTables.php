<?php

use yii\db\Migration;

/**
 * Class m210114_073524_createTagsTaables
 */
class m210114_073524_createTagsTables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tags}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()
        ]);
        $this->createTable('{{%cuisine_tag_links}}', [
            'cuisine_id' => $this->integer()->notNull(),
            'tag_id' => $this->integer()->notNull()
        ]);
//        $this->addPrimaryKey('cuisine_tag_links_pkey', '{{%cuisine_tag_links}}', ['cuisine_id', 'tag_id']);
//        $this->addForeignKey('tag_link_cuisine_fkey', '{{%cuisine_tag_links}}', 'cuisine_id', '{{%cuisines}}', 'id');
//        $this->addForeignKey('tag_link_tag_fkey', '{{%cuisine_tag_links}}', 'tag_id', '{{%tags}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%cuisine_tag_links}}');
        $this->dropTable('{{%tags}}');
    }

}
