<?php
/**
 * @category Stagem
 * @package Stagem_ZfcAdmin
 * @author Serhii Stagem <popow.serhii@gmail.com>
 * @datetime: 03.02.2018 11:58
 */
namespace Stagem\ZfcAdmin;

class ConfigProvider
{
    public function __invoke()
    {
        $config =  require __DIR__ . '/../config/module.config.php';

        return $config;
    }
}