<?php

namespace moguyun\cms\trip\event\frontend\assets;

use yii\web\AssetBundle;

class DefaultAsset extends AssetBundle
{
    public $sourcePath = '@vendor/moguyun-cms/trip-event/src/frontend/assets';

    public $publishOptions = [
        'only' => ['default.css']
    ];
    public $css = [
        'default.css'
    ];
}
