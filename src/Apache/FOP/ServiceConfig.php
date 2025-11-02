<?php
declare(strict_types = 1);
namespace Apache\FOP;

class ServiceConfig
{
    public const PLUGIN_ENTRYPOINT = 'plugin.entryPoint';
    public const SETTINGS_TABS = 'settings.tabs';
    public const SHORTCODES = 'shortcode.objs';

    /**
     *
     * @return array<string, mixed>
     */
    public static function getDefinitions(): array
    {
        return [
            PluginInfoInterface::class => \DI\create(PluginInfo::class)
                ->constructor(\DI\get(ServiceConfig::PLUGIN_ENTRYPOINT)),

            self::SETTINGS_TABS => [
            ],

            self::SHORTCODES => [
            ],
        ];
    }
}
