<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Project".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $url
 * @property string|null $start_time
 * @property string|null $end_time
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description'], 'string'],
            [['start_time', 'end_time', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['title', 'url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'url' => 'Url',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }
}
