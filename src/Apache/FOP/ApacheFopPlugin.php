<?php
declare(strict_types=1);
namespace Apache\FOP;

use DI\ContainerBuilder;

class ApacheFopPlugin
{
    public function init(string $entryPointFile): void
    {
        add_action(
            'init',
            function () use ($entryPointFile) {
                $this->initializeContainer($entryPointFile);
            }
        );
    }

    private static function getCompiledContainerPath(string $entryPointFile): string
    {
        return (new PluginInfo($entryPointFile))->getPath();
    }

    private function initializeContainer(string $entryPointFile): void
    {
        if (!function_exists('get_home_path')) {
            require_once ABSPATH . 'wp-admin/includes/file.php';    // @phpstan-ignore requireOnce.fileNotFound
        }

        $containerBuilder = new ContainerBuilder();
        $containerBuilder->addDefinitions(ServiceConfig::getDefinitions());

        // Existance of wp-config-local.php would indicate a development environment
        if (!file_exists(get_home_path() . 'wp-config-local.php')) {
            $containerBuilder->enableCompilation(self::getCompiledContainerPath($entryPointFile));
        }

        $container = $containerBuilder->build();

        $container->set(ServiceConfig::PLUGIN_ENTRYPOINT, $entryPointFile);
    }
}
