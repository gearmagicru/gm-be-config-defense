<?php
/**
 * Этот файл является частью расширения модуля веб-приложения GearMagic.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

namespace Gm\Backend\Config\Defense\Model;

use Gm\Backend\Config\Model\ServiceForm;
use Gm\Panel\Helper\ExtField;

/**
 * Модель данных конфигурации доступа по IP-адресу (Проактивная защита).
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Gm\Backend\Config\Defense\Model
 * @since 1.0
 */
class Form extends ServiceForm
{
    /**
     * {@inheritdoc}
     */
    public function init(): void
    {
        parent::init();

        $this->unifiedName = 'defense';
    }

    /**
     * {@inheritdoc}
     */
    public function beforeLoad(array &$data): void
    {
        // панель управления
        ExtField::checkboxValue($data, 'enableBackendWhiteListIp', true, false); // подключить белый список IP-адресов:
        ExtField::checkboxValue($data, 'enableBackendBlackListIp', true, false); // подключить чёрный список IP-адресов:
        // сайт
        ExtField::checkboxValue($data, 'enableFrontendWhiteListIp', true, false); // подключить белый список IP-адресов:
        ExtField::checkboxValue($data, 'enableFrontendBlackListIp', true, false); // подключить чёрный список IP-адресов:
    }
}
