<?php

namespace app\models\Calendar;
use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\AttributeBehavior;

/**
 * This is the model class for table "calendar_events".
 *
 * @property integer $id
 * @property string $date
 * @property string $start_time
 * @property string $end_time
 * @property string $name
 * @property integer $groups
 * @property integer $place
 */
class CalendarEvent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calendar_events';
    }
    
    public function behaviors()
    {
        return [
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'groups',
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'groups', 
                ],
                'value' => function ($event) {       
                    $groups = null; 
                    foreach ($this->groups as $value) {
                        $groups = (is_null($groups) ? 0 : $groups) | intval($value);
                    }        
                    return $groups;
                },
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'start_time', 'end_time', 'name', 'groups', 'place'], 'required'],
            [['date', 'start_time', 'end_time'], 'safe'],
            [['place'], 'integer'],
            ['groups', 'each', 'rule' => ['in', 'range' => [\Constants::GROUP_A, \Constants::GROUP_B]]],
            [['name'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'name' => 'Name',
            'groups' => 'Groups',
            'place' => 'Place',
        ];
    }
    
//    public function afterFind() {
//        
//        $groups = Array();
//
//        if ($this->$groups & Constants::GROUP_A)
//        {
//            array_push($groups, Constants::GROUP_A);
//        }
//        
//        if ($this->$groups & Constants::GROUP_B) 
//        {
//            array_push($groups, Constants::GROUP_B);
//        }         
//        
//        $this->$groups = $groups;
//    
//        parent::afterFind();
//    }
}
