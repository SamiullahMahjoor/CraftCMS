<?php
/**
 * Labyrintoom Custom plugin for Craft CMS 3.x
 *
 * Custom Craft 3 plugin for Labyrintoom
 *
 * @link      https://samiullahmahjoor.info
 * @copyright Copyright (c) 2021 Samiullah Mahjoor
 */

namespace labyrintoom\labyrintoomcustom\services;

use labyrintoom\labyrintoomcustom\LabyrintoomCustom;

use Craft;
use craft\base\Component;

/**
 * @author    Samiullah Mahjoor
 * @package   LabyrintoomCustom
 * @since     1.0.0
 */
class LabyrintoomCustomService extends Component
{
    // Public Methods
    // =========================================================================

    /*
     * @return mixed
     */
    public function exampleService()
    {
        $result = 'something';
        // Check our Plugin's settings for `someAttribute`
        if (LabyrintoomCustom::$plugin->getSettings()->someAttribute) {
        }

        return $result;
    }
}
