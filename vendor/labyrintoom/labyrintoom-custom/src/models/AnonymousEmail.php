<?php
/**
 * Labyrintoom Custom plugin for Craft CMS 3.x
 *
 * Custom Craft 3 plugin for Labyrintoom
 *
 * @link      https://samiullahmahjoor.info
 * @copyright Copyright (c) 2021 Samiullah Mahjoor
 */

namespace labyrintoom\labyrintoomcustom\models;

use labyrintoom\labyrintoomcustom\LabyrintoomCustom;

use Craft;
use craft\base\Model;

/**
 * @author    Samiullah Mahjoor
 * @package   LabyrintoomCustom
 * @since     1.0.0
 */
class AnonymousEmail extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $someAttribute = 'Some Default';

    // Public Methods
    // =========================================================================

    public function generateEmail(){
        return $this->generateRandomString();

    }

    protected function generateRandomString($length = 14) {
          $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
          $charactersLength = strlen($characters);
          $randomString = '';
          for ($i = 0; $i < $length; $i++) {
              $randomString .= $characters[rand(0, $charactersLength - 1)];
          }
          return $randomString . "@craft.com";
      }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['someAttribute', 'string'],
            ['someAttribute', 'default', 'value' => 'Some Default'],
        ];
    }
}
