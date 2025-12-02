/**
 * Отправка формы
 */
class AjaxFormSenderClass {

    errorMessage = 'Ошибка сервера, попробуйте позднее'

    feedbackWait = 400000000;

    /**
     * @param formName
     * @param requestUrl
     * @param successCallback
     */
    constructor(formName, requestUrl, successCallback = undefined)
    {
        this.formData = new FormData(formName)
        this.form = $(formName);
        this.requestUrl = requestUrl;
        this.successCallback = successCallback;
        this.loadingButton = this.#getLoadingButton();

        this.appendHtml = this.form.data('append-html-block') !== undefined ? this.form.data('append-html-block') : false;
        this.closeModal = this.form.data('close-modal') !== undefined;
        this.reloadPage = this.form.data('reload-page') !== undefined;
        this.feedbackBlock = this.form.data('feedback-block');
        this.redirectToResponse = this.form.data('redirect-on-response') !== undefined;
        this.reloadModal = this.form.data('reload-modal') !== undefined ? this.form.data('reload-modal') : undefined;
    }

    /**
     * Получение кнопки для отображения загрузки
     *
     * @returns {AnimatedButton}
     */
    #getLoadingButton()
    {
        let button = this.form.find(':submit')

        return new AnimatedButton(button)
    }

    /**
     * Отправка запроса
     *
     * @param async асинхронность запроса
     */
    sendAjax(async = true)
    {
        let result = {};
        let self = this;

        this.loadingButton.setLoad();

        $.ajax({
            dataType:    'json',
            type:        'post',
            cache:       false,
            contentType: false,
            processData: false,
            data:        this.formData,
            async:       async,
            url:         this.requestUrl,
            error: function (xhr) {
                self.#processError(xhr, this.errorMessage, undefined);
            },
            success: function (response, status, xhr) {
                let ajaxResponse = new AjaxResponseClass(response);

                result = self.#processResponse(ajaxResponse, xhr)
            },
        });

        return result;
    }

    /**
     * Обработка ответа
     *
     * @param ajaxResponse
     *
     * @returns {boolean}
     */
    #processResponse(ajaxResponse, xhr)
    {
        let result = true;

        if (ajaxResponse.getData() !== undefined && ajaxResponse.getData().redirect === true) {
            Helper.redirectTo(ajaxResponse.getData().url)

            return true;
        }

        if (ajaxResponse.hasErrorStatus()) {
            this.#processError(xhr, ajaxResponse.getMessage(), ajaxResponse.getLogMessage());

            return false
        }

        this.loadingButton.setSuccess();

        switch (true) {
            case this.successCallback !== undefined:
                result = this.#processCallback(ajaxResponse)
                break;
            default:
                this.#processSuccess(ajaxResponse, xhr);
                break
        }

        return result;
    }

    /**
     * Вывод ошибки
     *
     * @param message
     * @param log
     * @param xhr
     */
    #processError(xhr, message = this.errorMessage, log = undefined)
    {
        this.loadingButton.setDefault();
        this.#errorFeedback(message)

        if (log !== undefined) {
            console.log(log);
        }
    }

    /**
     * Обработка обратной функции
     *
     * @param ajaxResponse
     *
     * @returns {*}
     */
    #processCallback(ajaxResponse)
    {
        this.loadingButton.setDefault();
        this.#successFeedback(ajaxResponse.getMessage())

        return this.successCallback(ajaxResponse);
    }

    /**
     * Вывод успешного выполнения запроса
     *
     * @param ajaxResponse
     * @param xhr
     */
    #processSuccess(ajaxResponse, xhr)
    {
        this.#successFeedback(ajaxResponse.getMessage())

        if (this.closeModal === true) {
            setTimeout(function() {
                $('body').find('.modal.show').modal('hide');
            }, 1500);
        }

        if (this.reloadPage === true) {
            let modal = $('body').find('.modal.show');

            if (modal.length > 0) {
                modal.addClass('reload-after-close');
            } else {
                location.reload();
            }
        }

        if (this.redirectToResponse === true) {
            location.replace(ajaxResponse.getMessage());
        }

        if (this.reloadModal !== undefined) {
            $(this.reloadModal).trigger('reloadModalContent');
        }

        this.form.find('.delete-new-class--js').removeClass('new');
    }

    /**
     * @param message
     */
    #errorFeedback(message)
    {
        let alertId = `form-alert-error--1`;

        this.#feedbackBlock().show('fast').html(this.#getAlert(message, 'alert-danger', alertId))
    }

    /**
     * @param message
     */
    #successFeedback(message)
    {
        if (this.appendHtml !== false) {
            $(this.appendHtml).html(message).show('fast');

            return true;
        }

        let alertId = `form-alert-success--1`;
        let feedbackBlock = this.#feedbackBlock();

        feedbackBlock.show('fast').html(this.#getAlert(message, 'alert-success', alertId))

        return true;
    }

    /**
     * @returns {*|jQuery|HTMLElement}
     */
    #feedbackBlock() {
        return this.feedbackBlock !== undefined ? $(this.feedbackBlock) : this.form.find('.form-feedback');
    }

    /**
     *
     * @param message
     * @param alertClass
     * @param alertId
     */
    #getAlert(message, alertClass, alertId)
    {
        Alert.initAlertVars(message);

        return Alert.renderAlertHtml(message, alertClass, alertId)
    }
}