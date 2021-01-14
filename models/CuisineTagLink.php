<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%cuisine_tag_links}}".
 *
 * @property int $cuisine_id
 * @property int $tag_id
 */
class CuisineTagLink extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%cuisine_tag_links}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cuisine_id', 'tag_id'], 'required'],
            [['cuisine_id', 'tag_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cuisine_id' => 'Cuisine ID',
            'tag_id' => 'Tag ID',
        ];
    }
}
