<?php 
use yii\helpers\Html;
?>
<div class="container">
    <div class="row">
        <div class="col-md-1">Пн</div>
        <div class="col-md-1">Вт</div>
        <div class="col-md-1">Ср</div>
        <div class="col-md-1">Чт</div>
        <div class="col-md-1">Пт</div>
        <div class="col-md-1">Сб</div>
        <div class="col-md-1">Вc</div>   
    </div>    
    <?php $rowCount = ceil(count($calendarDays)/7); ?>
    <?php for ($i = 0; $i < $rowCount; $i++) { ?>
    <div class="row">
        <?php $columnCount =  $i != $rowCount-1 || count($calendarDays) % 7 == 0 ? 7 : count($calendarDays) % 7 ?>
        <?php for ($j = 0; $j < $columnCount; $j++) { ?>
        <div class="col-md-1"><?php 
            $calendarDay = $calendarDays[$i*7+$j];
            $events = $calendarDay->events;
            if ($events != null)
            {?>
                <?php foreach ($events as $event) { ?>
                    <div class="row">
                        <div class="col-md-1">
                        <?php $img = "images/stadium_48x48.png"; 
                        switch($event->place) 
                        {
                            case Constants::PLACE_RODNIK: 
                                $img = "images/stadium_48x48.png";
                                break; 
                            case Constants::PLACE_SKA: 
                                $img = "images/ska_48x48.png";
                                break;
                        } ?>
                        <?= Html::img($img);?>
                        </div> 
                    </div>
                <?php }?> 
            <?php }?>          
        </div>
        <?php }?>
    </div>
    <?php }?>
</div>