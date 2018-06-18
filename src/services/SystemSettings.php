<?php
/**
 * @link https://craftcms.com/
 * @copyright Copyright (c) Pixel & Tonic, Inc.
 * @license https://craftcms.github.io/license/
 */

namespace craft\services;

use Craft;
use craft\events\ParseConfigEvent;
use craft\helpers\Json;
use craft\models\MailSettings;
use craft\records\SystemSettings as SystemSettingsRecord;
use yii\base\Component;

/**
 * System Settings service.
 * An instance of the System Settings service is globally accessible in Craft via [[\craft\base\ApplicationTrait::getSystemSettings()|`Craft::$app->systemSettings`]].
 *
 * @author Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @since 3.0
 * @deprecated in 3.1. Use [[\craft\ProjectConfig]] instead.
 */
class SystemSettings extends Component
{
    // Properties
    // =========================================================================

    /**
     * @var
     */
    public $defaults;

    // Public Methods
    // =========================================================================

    /**
     * Returns the system settings for a category.
     *
     * @param string $category
     * @return array
     * @deprecated in 3.1. Use [[\craft\ProjectConfig::get()]] instead.
     */
    public function getSettings(string $category): array
    {
        return Craft::$app->getProjectConfig()->get($category) ?? [];
    }

    /**
     * Returns an individual system setting.
     *
     * @param string $category
     * @param string $key
     * @return mixed
     * @deprecated in 3.1. Use [[\craft\ProjectConfig::get()]] instead.
     */
    public function getSetting(string $category, string $key)
    {
        return Craft::$app->getProjectConfig()->get($category.'.'.$key);
    }

    /**
     * Saves the system settings for a category.
     *
     * @param string $category
     * @param array|null $settings
     * @return bool Whether the new settings saved
     * @deprecated in 3.1. Use [[\craft\ProjectConfig::save()]] instead.
     */
    public function saveSettings(string $category, array $settings = null): bool
    {
        return Craft::$app->getProjectConfig()->save($category, $settings);
    }

    /**
     * Returns the email settings.
     *
     * @return MailSettings
     * @deprecated in 3.1. Use [[\craft\ProjectConfig::get()]] instead.
     */
    public function getEmailSettings(): MailSettings
    {
        $settings = $this->getSettings('email');

        return new MailSettings($settings);
    }
}
