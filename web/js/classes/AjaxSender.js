/**
 * Отправка ajax запроса с использованием библиотек Alert, AnimatedButton, AjaxResponseClass
 */
class AjaxSender {
    static baseDataType = 'post'
    static responseStatusNotFound = 404
    static responseStatusRedirect = 308

    /**
     * @param params
     *
     * alertBlock: jQuery
     * buttonBlock: jQuery
     */
    constructor({
                    showSuccessAlert = true,
                    showErrorAlert = true,
                    buttonBlock = undefined,
                    alertBlock = undefined,
                }) {
        this.alert = this.#createAlert(alertBlock);
        this.animatedButton = this.#createAnimatedButton(buttonBlock);
        this.showSuccessAlert = showSuccessAlert;
        this.showErrorAlert = showErrorAlert;
    }

    /**
     * Библиотека для отображения уведомлений
     *
     * @param alertBlock
     *
     * @returns {undefined|Alert}
     */
    #createAlert(alertBlock) {
        return alertBlock === undefined ? undefined : new Alert(alertBlock, Alert.modReplace)
    }

    /**
     * Библиотека для отображения кнопки загрузки
     *
     * @param buttonBlock
     *
     * @returns {undefined|AnimatedButton}
     */
    #createAnimatedButton(buttonBlock) {
        return buttonBlock === undefined ? undefined : new AnimatedButton(buttonBlock)
    }

    /**
     * Отправка запроса
     *
     * @param params
     * @param successCallback
     * @param errorCallback
     * @param callbackParams
     */
    send({
             queryParams = undefined,
             action = undefined,
             type = undefined,
             async = true,
             successCallback = undefined,
             errorCallback = undefined,
             ajaxErrorCallback = undefined,
             callbackParams = {},
             queryType = undefined,
         }) {
        let requester = this;

        if (queryType !== undefined && Helper.isQueryInProgress(queryType) === true) {
            this.alert.showAlert('Подождите, запрос находится в обработке', Alert.errorClass);

            return false;
        }

        if (action === undefined) {
            throw new DOMException('AjaxSender не указан action');
        }

        if (queryType !== undefined) {
            Helper.startQuery(queryType);
        }
        this.#setButtonLoad();

        $.ajax({
            url: action,
            type: type ?? AjaxSender.baseDataType,
            dataType: 'json',
            data: queryParams ?? {},
            async: async,
            error: function (error) {
                return requester.#processError(error, ajaxErrorCallback, callbackParams, queryType);
            },
            success: function (rawResponse, status, xhr) {
                return requester.#processSuccess({
                    rawResponse: rawResponse,
                    successCallback: successCallback,
                    errorCallback: errorCallback,
                    callbackParams: callbackParams,
                    xhr: xhr,
                    queryType: queryType
                });
            },
        });
    }

    /**
     * @param error
     * @param errorCallback
     * @param callbackParams
     * @param queryType
     *
     * @returns {boolean}
     */
    #processError(error, errorCallback, callbackParams, queryType) {
        this.#setButtonDefault();

        if (queryType !== undefined) {
            Helper.setQueryComplete(queryType);
        }

        if (error.status === AjaxSender.responseStatusNotFound) {
            this.#showAlert(Alert.notFoundError);

            return false;
        }

        if (this.showErrorAlert === true) {
            this.#showAlert(Alert.serverError, Alert.errorClass);
        }

        this.#setButtonDefault();

        if (errorCallback !== undefined && errorCallback !== null) {
            return errorCallback(callbackParams)
        }

        return true;
    }

    /**
     * @param rawResponse
     * @param successCallback
     * @param errorCallback
     * @param callbackParams
     * @param xhr
     *
     * @param queryType
     * @returns {*|boolean}
     */
    #processSuccess(
        {
            rawResponse,
            successCallback,
            errorCallback,
            callbackParams,
            xhr,
            queryType
        }
    ) {
        let ajaxResponse = new AjaxResponseClass(rawResponse);

        if (queryType !== undefined) {
            Helper.setQueryComplete(queryType);
        }

        this.#setButtonDefault();

        if (ajaxResponse.hasErrorStatus() === true) {
            this.#showAlert(ajaxResponse.getMessage(), Alert.errorClass, ajaxResponse.getTraceString());

            if (errorCallback !== undefined && errorCallback !== null) {
                return errorCallback(ajaxResponse, callbackParams)
            }

            return false;
        }

        if (this.showSuccessAlert === true) {
            this.#showAlert(ajaxResponse.getMessage(), Alert.successClass);
        }

        if (successCallback !== undefined && successCallback !== null) {
            return successCallback(ajaxResponse, callbackParams)
        }

        return true;
    }

    /**
     * @param message
     * @param errorClass
     * @param trace
     *
     * @returns {boolean}
     */
    #showAlert(message, errorClass = Alert.errorClass, trace = null) {
        if (this.alert === undefined) {
            return false;
        }

        this.alert.showAlert(message, errorClass, trace)

        return true;
    }

    /**
     * @returns {boolean}
     */
    #setButtonLoad() {
        if (this.animatedButton === undefined) {
            return false;
        }

        this.animatedButton.setLoad();

        return true;
    }

    /**
     * @returns {boolean}
     */
    #setButtonDefault() {
        if (this.animatedButton === undefined) {
            return false;
        }

        this.animatedButton.setDefault();

        return true;
    }
}