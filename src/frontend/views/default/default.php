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
    <div class="moduleAll-mixture" style="background-image:url('<?= $store->files[0]->url; ?>');padding-top:150px;">
        <div class="content">
            <div class="module71-productList">
            <div class="list">
                <ul>
                    <?php foreach ($store->trips as $key => $trip) : ?>
                    <li class="<?= ($key + 1) % 3 == 0 ? 'mr0' : ''; ?>">
                        <a href="/route/<?= $trip->trip->id; ?>" target="_blank">
                        <img src="<?= $trip->trip->imgUrl; ?>" alt="<?= $trip->trip->name; ?>" class="broken">
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
                            <a href="/route/<?= $trips->trip->id; ?>" target="_blank">立坳订购</a>
                        </p>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>