var dateTime = null;
var errorMsg = null;
var errorTrace = null;

class Alert {
    static successClass = 'alert-success'
    static errorClass = 'alert-danger'

    static modAppend = 'append';
    static modReplace = 'replace';

    static serverError = 'Ошибка сервера';
    static notFoundError = 'Запрашиваемый URL не найден';

    constructor(feedbackBlock, mod = Alert.modAppend) {
        this.feedbackBlock = feedbackBlock;
        this.mod = mod;
    }

    /**
     * @param message
     *
     * @param alertClass
     */
    showAlert(message, alertClass, trace = null) {
        let alertId = Alert.generateId();
        let alertHtml = Alert.renderAlertHtml(message, alertClass, alertId);

        Alert.initAlertVars(message, trace);

        switch (this.mod) {
            case Alert.modAppend:
                this.feedbackBlock.append(alertHtml).show('fast')
                break;
            case Alert.modReplace:
                this.feedbackBlock.html(alertHtml).show('fast')
                break;
            default:
                throw new DOMException('Undefined mod');
        }

        // Alert.scrollToAlert(alertId);
    }

    /**
     * Отчистка уведомлений
     */
    clean() {
        this.feedbackBlock.hide('fast').html()
    }

    /**
     * @param alertId
     */
    static scrollToAlert(alertId) {
        Helper.scrollToBlock($(`#${alertId}`));
    }

    /**
     * Рендер уведомления
     *
     * @param message
     * @param alertClass
     * @param alertId
     *
     * @returns {string}
     */
    static renderAlertHtml(message, alertClass, alertId = undefined) {
        let messageLabel = 'Ошибка';

        if (alertId === undefined) {
            alertId = this.generateId()
        }

        if (alertClass === 'alert-success') {
            messageLabel = 'Успешно';
        }

        return `<div id="${alertId}" class="alert ${alertClass}">
                    <div class="d-flex justify-content-between">
                        <b>${messageLabel}: </b>
                        <span class="alert-close close-alert--js" href="javascript:void(0)">
                            <i class="fas fa-times"></i>
                        </span>
                    </div>
                    ${message}
                </div>`
    }

    /**
     * Id уведомления
     *
     * @returns {string}
     */
    static generateId() {
        return Helper.generateRandomString(10);
    }

    /**
     * Инициализация параметров дял последующего логирования
     *
     * @param message
     * @param trace
     */
    static initAlertVars(message, trace) {
        dateTime = Alert.alertDateTime();
        errorMsg = message;
        errorTrace = trace;
    }

    /**
     * Дата ошибки
     *
     * @returns {string}
     */
    static alertDateTime() {
        let today = new Date();
        let date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
        let minute = (today.getMinutes() < 10 ? '0' : '') + today.getMinutes()
        let sec = (today.getSeconds() < 10 ? '0' : '') + today.getSeconds()
        let time = today.getHours() + ":" + minute + ":" + sec;

        return date + ' ' + time;
    }
}