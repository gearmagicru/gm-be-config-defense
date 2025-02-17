/*!
 * Контроллер формы.
 * Расширение "Настройка доступа по IP-адресу".
 * Модуль "Конфигурация".
 * Copyright 2015 Вeб-студия GearMagic. Anton Tivonenko <anton.tivonenko@gmail.com>
 * https://gearmagic.ru/license/
 */

Ext.define('Gm.be.config.defence.FormController', {
    extend: 'Gm.view.form.PanelController',
    alias: 'controller.gm-be-config-defense-form',

    /**
     * Срабатывает при клике на флагов "Подключить белый список IP-адресов" (панель управления).
     * @param {Ext.form.field.Checkbox} me
     * @param {Boolean} value Значение.
     */
     onCheckBackendWhiteListIp: function (me, value) {
        let blackList = this.getViewCmp('be-blacklist');
        if (value) {
            blackList.setValue(0);
            blackList.setDisabled(true);
        } else
            blackList.setDisabled(false);
    },

    /**
     * Срабатывает при клике на флагов "Подключить белый список IP-адресов" (сайт).
     * @param {Ext.form.field.Checkbox} me
     * @param {Boolean} value Значение.
     */
     onCheckFrontendWhiteListIp: function (me, value) {
        let blackList = this.getViewCmp('fe-blacklist');
        if (value) {
            blackList.setValue(0);
            blackList.setDisabled(true);
        } else
            blackList.setDisabled(false);
    }
});
