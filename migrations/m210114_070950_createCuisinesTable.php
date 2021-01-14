<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cuisines}}`.
 */
class m210114_070950_createCuisinesTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cuisines}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'keywords' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%cuisines}}');
    }
}
