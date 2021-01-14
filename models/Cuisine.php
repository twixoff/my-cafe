<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%cuisines}}".
 *
 * @property int $id
 * @property string|null $name
 * @property string $tagNames
 */
class Cuisine extends \yii\db\ActiveRecord
{
    public $tagNames;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%cuisines}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['tagNames'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название вида кухни',
            'tagNames' => 'Ключевые слова',
        ];
    }


    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])
            ->viaTable(CuisineTagLink::tableName(), ['cuisine_id' => 'id']);
    }

    public function afterSave($insert, $changedAttributes)
    {
        if(!$this->isNewRecord) {
            CuisineTagLink::deleteAll(['cuisine_id' => $this->id]);
        }

        if(!$this->tagNames) {
            return;
        }

        foreach ($this->tagNames as $tagValue) {
            $tag = Tag::findOne(['name' => $tagValue]);

            if(!$tag) {
                $tag = new Tag();
                $tag->name = $tagValue;
                $tag->save();
            }

            $tagLink = new CuisineTagLink();
            $tagLink->cuisine_id = $this->id;
            $tagLink->tag_id = $tag->id;
            $tagLink->save();
        }

        return true;
    }

}
