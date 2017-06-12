<?php

use yii\db\Migration;

/**
 * Handles the creation of table `goods`.
 */
class m170611_214346_create_goods_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('goods', [
            'id' => $this->primaryKey(),
            'title' => $this->text()->notNull(),
            'img' => $this->text(),
            'price' => $this->string()->notNull(),
            'delivery' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('goods');
    }
}
