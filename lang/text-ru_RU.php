<?php
/**
 * Этот файл является частью расширения модуля веб-приложения GearMagic.
 * 
 * Пакет русской локализации.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

return [
    '{name}'        => 'Настройка доступа по IP-адресу',
    '{description}' => 'Ограничение доступа пользователей к Панели управления и сайту по IP-адресу',
    '{permissions}' => [
        'any'  => ['Полный доступ', 'Настройка доступа по IP-адресу']
    ],

    // Form: поля
    'Enabled IP whitelist' => 'Подключить белый список IP-адресов',
    'Enabled IP blacklist' => 'Подключить чёрный список IP-адресов',
    'Page template on access error' => 'Шаблон страницы при ошибке доступа',
    'reset settings' => 'сбросить настройки',
    // Form: сообщения / заголовки
    'Save settings' => 'Сохранение настроек',
    'Reset settings' => 'Сброс настроек',
    // Form: сообщения / текст
    'settings saved {0} successfully' => 'успешное сохранение настроек "<b>{0}</b>"',
    'settings reseted {0} successfully' => 'успешный сброс настроек "<b>{0}</b>"'
];
