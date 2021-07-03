<?php
/**
 * Labyrintoom Custom plugin for Craft CMS 3.x
 *
 * Custom Craft 3 plugin for Labyrintoom
 *
 * @link      https://samiullahmahjoor.info
 * @copyright Copyright (c) 2021 Samiullah Mahjoor
 */

namespace labyrintoom\labyrintoomcustom\assetbundles\labyrintoomcustomfieldfield;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    Samiullah Mahjoor
 * @package   LabyrintoomCustom
 * @since     1.0.0
 */
class LabyrintoomCustomFieldFieldAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = "@labyrintoom/labyrintoomcustom/assetbundles/labyrintoomcustomfieldfield/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/LabyrintoomCustomField.js',
        ];

        $this->css = [
            'css/LabyrintoomCustomField.css',
        ];

        parent::init();
    }
}
