<?php
/**
 * Labyrintoom Custom plugin for Craft CMS 3.x
 *
 * Custom Craft 3 plugin for Labyrintoom
 *
 * @link      https://samiullahmahjoor.info
 * @copyright Copyright (c) 2021 Samiullah Mahjoor
 */

namespace labyrintoom\labyrintoomcustom;

use labyrintoom\labyrintoomcustom\services\LabyrintoomCustomService as LabyrintoomCustomServiceService;
use labyrintoom\labyrintoomcustom\variables\LabyrintoomCustomVariable;
use labyrintoom\labyrintoomcustom\models\Settings;
use labyrintoom\labyrintoomcustom\models\AnonymousEmail;
use labyrintoom\labyrintoomcustom\fields\LabyrintoomCustomField as LabyrintoomCustomFieldField;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\web\UrlManager;
use craft\services\Elements;
use craft\services\Fields;
use craft\web\twig\variables\CraftVariable;
use craft\events\RegisterComponentTypesEvent;
use craft\events\RegisterUrlRulesEvent;
use craft\elements\User;
use craft\events\ModelEvent;
use yii\base\Event;
use craft\base\Element;
/**
 * Class LabyrintoomCustom
 *
 * @author    Samiullah Mahjoor
 * @package   LabyrintoomCustom
 * @since     1.0.0
 *
 * @property  LabyrintoomCustomServiceService $labyrintoomCustomService
 */
class LabyrintoomCustom extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var LabyrintoomCustom
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $schemaVersion = '1.0.0';

    /**
     * @var bool
     */
    public $hasCpSettings = true;

    /**
     * @var bool
     */
    public $hasCpSection = true;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Event::on(
            UrlManager::class,
            UrlManager::EVENT_REGISTER_SITE_URL_RULES,
            function (RegisterUrlRulesEvent $event) {
                $event->rules['siteActionTrigger1'] = 'labyrintoom-custom/default';
            }
        );

        Event::on(
            UrlManager::class,
            UrlManager::EVENT_REGISTER_CP_URL_RULES,
            function (RegisterUrlRulesEvent $event) {
                $event->rules['cpActionTrigger1'] = 'labyrintoom-custom/default/do-something';
            }
        );

        Event::on(
            Elements::class,
            Elements::EVENT_REGISTER_ELEMENT_TYPES,
            function (RegisterComponentTypesEvent $event) {
            }
        );

        Event::on(
            Fields::class,
            Fields::EVENT_REGISTER_FIELD_TYPES,
            function (RegisterComponentTypesEvent $event) {
                $event->types[] = LabyrintoomCustomFieldField::class;
            }
        );

        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function (Event $event) {
                /** @var CraftVariable $variable */
                $variable = $event->sender;
                $variable->set('labyrintoomCustom', LabyrintoomCustomVariable::class);
            }
        );

        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_INSTALL_PLUGIN,
            function (PluginEvent $event) {
                if ($event->plugin === $this) {
                }
            }
        );

        Craft::info(
            Craft::t(
                'labyrintoom-custom',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
        Event::on(
            User::class,
            User::EVENT_BEFORE_SAVE,
            function(ModelEvent $event) {
                $email_handler = new AnonymousEmail();
                $random_email = $email_handler->generateEmail();
                echo "$random_email <br><br>";
                $user = $event->sender;
                $user->setFieldValue("anonymousEmail",$random_email);
            });

    }

    // Protected Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected function createSettingsModel()
    {
        return new Settings();
    }

    /**
     * @inheritdoc
     */
    protected function settingsHtml(): string
    {
        return Craft::$app->view->renderTemplate(
            'labyrintoom-custom/settings',
            [
                'settings' => $this->getSettings()
            ]
        );
    }
}
