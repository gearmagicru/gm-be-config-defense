<?php
/**
 * Этот файл является частью расширения модуля веб-приложения GearMagic.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

namespace Gm\Backend\Config\Defense\Controller;

use Gm;
use Gm\Panel\Helper\ExtCombo;
use Gm\Panel\Widget\EditWindow;
use Gm\Backend\Config\Controller\ServiceForm;

/**
 * Контроллер конфигурации доступа по IP-адресу (Проактивная защита).
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Gm\Backend\Config\Defense\Controller
 * @since 1.0
 */
class Form extends ServiceForm
{
    /**
     * Возвращает элементы панели формы (Gm.view.form.Panel GmJS).
     * 
     * @return array
     */
    protected function getFormItems(): array
    {
        $unified = Gm::$app->unifiedConfig->get('defense');
        return [
            [
                'xtype'      => 'displayfield',
                'ui'         => 'parameter-head',
                'fieldLabel' => 'Ваш IP-адрес',
                'value'      => Gm::$app->request->getUserIp()
            ],
            [
                'xtype'    => 'fieldset',
                'title'    => Gm::t(BACKEND, BACKEND_NAME),
                'defaults' => [
                    'labelWidth' => 250,
                    'labelAlign' => 'right'
                ],
                'items' => [
                    [
                        'xtype'      => 'checkbox',
                        'id'         => $this->module->viewId('form__be-whitelist'),
                        'fieldLabel' => '#Enabled IP whitelist',
                        'name'       => 'enableBackendWhiteListIp',
                        'ui'         => 'switch',
                        'listeners'  => ['change' => 'onCheckBackendWhiteListIp'],
                        'checked'    => $unified['enableBackendWhiteListIp'] ?? false
                    ],
                    [
                        'xtype'      => 'checkbox',
                        'id'         => $this->module->viewId('form__be-blacklist'),
                        'fieldLabel' => '#Enabled IP blacklist',
                        'name'       => 'enableBackendBlackListIp',
                        'disabled'   => $unified['enableBackendWhiteListIp'] ?? false,
                        'ui'         => 'switch',
                        'checked'    => $unified['enableBackendBlackListIp'] ?? false
                    ],
                    ExtCombo::themeViews(
                        '#Page template on access error', 
                        'backendViewTemplate', 
                        BACKEND, 
                        ['type' => 'error'],
                        [],
                        [
                            'emptyText' => 'errors/blocked',
                            'value'     => $unified['backendViewTemplate'] ?? ''
                        ]
                    )
                ]
            ],
            [
                'xtype'    => 'fieldset',
                'title'    => Gm::t(BACKEND, FRONTEND_NAME),
                'defaults' => [
                    'labelWidth' => 250,
                    'labelAlign' => 'right'
                ],
                'items' => [
                    [
                        'xtype'      => 'checkbox',
                        'id'         => $this->module->viewId('form__fe-whitelist'),
                        'fieldLabel' => '#Enabled IP whitelist',
                        'name'       => 'enableFrontendWhiteListIp',
                        'ui'         => 'switch',
                        'listeners'  => ['change' => 'onCheckFrontendWhiteListIp'],
                        'checked'    => $unified['enableFrontendWhiteListIp'] ?? false
                    ],
                    [
                        'xtype'      => 'checkbox',
                        'id'         => $this->module->viewId('form__fe-blacklist'),
                        'fieldLabel' => '#Enabled IP blacklist',
                        'name'       => 'enableFrontendBlackListIp',
                        'disabled'   => $unified['enableFrontendWhiteListIp'] ?? false,
                        'ui'         => 'switch',
                        'checked'    => $unified['enableFrontendBlackListIp'] ?? false
                    ],
                    ExtCombo::themeViews(
                        '#Page template on access error', 
                        'frontendViewTemplate', 
                        FRONTEND, 
                        ['type' => 'error'],
                        [],
                        [
                            'emptyText' => 'errors/blocked',
                            'value'     => $unified['frontendViewTemplate'] ?? ''
                        ]
                    )
                ]
            ],
            [
                'xtype'  => 'toolbar',
                'dock'   => 'bottom',
                'border' => 0,
                'style'  => ['borderStyle' => 'none'],
                'items'  => [
                    [
                        'xtype'    => 'checkbox',
                        'boxLabel' => $this->module->t('reset settings'),
                        'name'     => 'reset',
                        'ui'       => 'switch'
                    ]
                ]
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function createWidget(): EditWindow
    {
        /** @var EditWindow $window */
        $window = parent::createWidget();

        // окно компонента (Ext.window.Window Sencha ExtJS)
        $window->autoHeight = true;
        $window->width = 700;

        // панель формы (Gm.view.form.Panel GmJS)
        $window->form->items = $this->getFormItems();
        $window->form->controller = 'gm-be-config-defense-form';
        $window
            ->setNamespaceJS('Gm.be.config.defence')
            ->addRequire('Gm.be.config.defence.FormController');
        return $window;
    }
}
