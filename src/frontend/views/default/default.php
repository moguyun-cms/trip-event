<?php
use moguyun\cms\trip\event\frontend\assets\DefaultAsset;

$this->title = $model->title;
DefaultAsset::register($this);
/* @var $model moguyun\cms\trip\event\common\models\Event */
/* @var $store moguyun\cms\trip\event\common\models\EventStore */
?>
<div class="zhuanTiWrap">
    <?php foreach ($model->store->files as $file) : ?>
    <div class="module10-banner">
        <img class="broken" src="<?= $file->url; ?>" alt="<?= $model->store->title; ?>">
    </div>
    <?php endforeach; ?>

<?php foreach ($model->store->children as $store) : ?>
<?php foreach ($store->files as $file) : ?>
    <div class="module10-banner">
        <img class="broken" src="<?= $file->url; ?>" alt="<?= $model->store->title; ?>">
    </div>
    <?php endforeach; ?>
<div class="module71-productList">
   <div class="list">
      <ul>
          <?php foreach ($store->trips as $trip) : ?>
         <li>
            <a href="/route/<?= $trip->trip->id; ?>" target="_blank">
            <img src="http://qiniu.usitour.com/images/picture/2015-05/detail_19_1430507852.jpg" alt="" class="broken">
            </a>
            <p class="rebate yuan"><?= $trip->label; ?></p>
            <div class="jieShao">
               <p class="gText">
                  <a href="/route/<?= $trip->trip->id; ?>" target="_blank">
                  <?= $trip->trip->name; ?>
                </a>
               </p>
               <p class="gBuy">
                  <i id="new_price_4336">$<?= $trip->trip->discount; ?></i>
                  <a href="/route/<?= $trips->trip->id; ?>" target="_blank">立即订购</a>
               </p>
            </div>
         </li>
        <?php endforeach; ?>
      </ul>
   </div>
</div>
<?php endforeach; ?>
</div>