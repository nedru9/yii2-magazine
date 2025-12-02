/**
 * Клас для работы с типичным ответом сервера
 */
class AjaxResponseClass {

    /**
     * @param response
     * @param xhr
     */
    constructor(response, xhr = undefined)
    {
        this.response = response;
        this.xhr = xhr;
    }


    /**
     * Есть ли ошибка
     *
     * @returns {boolean}
     */
    hasErrorStatus()
    {
        return this.response['error'] !== undefined && this.response['error'] === true;
    }

    /**
     * Получение сообщения
     *
     * @returns {string|undefined}
     */
    getMessage() {
        let message = this.response['message'];

        if (message === undefined) {
            message = this.response['data'];
        }

        return message;
    }

    /**
     * Получение сообщения
     *
     * @returns {string|undefined}
     */
    getTraceString() {
        return this.response['trace'];
    }

    /**
     * @returns {string|undefined}
     */
    getData() {
        return this.response['data'];
    }


    /**
     * Получение сообщения для лога
     *
     * @returns {string|undefined}
     */
    getLogMessage()
    {
        return this.response['logMessage'] !== undefined ? this.response['logMessage'] : undefined;
    }
}