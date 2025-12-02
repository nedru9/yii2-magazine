class Helper {
    static queriesInProgress = {};

    /**
     * @param length
     *
     * @returns {string}
     */
    static generateRandomString(length) {
        let result = '';
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        const charactersLength = characters.length;

        let counter = 0;

        while (counter < length) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
            counter += 1;
        }

        return result;
    }

    /**
     * @param element
     */
    static scrollToBlock(element) {
        let scrollTop = element.offset().top - 50;

        this.scrollTo(scrollTop)
    }

    /**
     * @param scrollTop
     * @param delay
     */
    static scrollTo(scrollTop, delay = 100) {
        $('html, body').animate({scrollTop: scrollTop}, delay);
    }

    /**
     * Ссылка вида #mortgage
     *
     * @param href
     */
    static isHashLink(href) {
        let regex = new RegExp(/[#][\w]+/);

        return regex.test(href);
    }

    /**
     * Лоадер для блока
     *
     * @returns {string}
     */
    static blockLoader() {
        return '<div class="d-flex justify-content-center align-items-center">' +
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="width: 35px;height: 35px;">' +
                    '</span>' +
                '</div>';
    }

    /**
     * Поиск формы
     *
     * @param block
     * @param maxIterations
     *
     * @returns {undefined|*}
     */
    static findParentForm(block, maxIterations = 20) {
        let currentBlock = block;
        let iteration = 1;

        while (iteration <= maxIterations) {
            currentBlock = currentBlock.parent();

            if (currentBlock.is('form')) {
                return currentBlock;
            }

            iteration++;
        }

        return undefined;
    }

    /**
     * Преобразование формы в JSON
     *
     * @param form
     *
     * @returns {{}}
     */
    static convertFormToJSON(form) {
        let array = $(form).serializeArray();
        let json = {};

        $.each(array, function () {
            json[this.name] = this.value || "";
        });

        return json;
    }

    /**
     * Поиск элемента выше
     *
     * @param element
     * @param selector
     * @param limit
     *
     * @returns {undefined|*}
     */
    static findUpperElement(element, selector, limit = 10) {
        let count = 1;
        let searchedElement = element;

        while (count <= limit) {
            searchedElement = searchedElement.parent();

            if (searchedElement.is(selector)) {
                return searchedElement;
            }

            count++;
        }

        return undefined
    }

    /**
     * Преобразование даты d.m.Y в Date
     *
     * @param date
     *
     * @returns {string|Date}
     */
    static dateObjectByString(date) {
        let [day, month, year] = date.split('.')
        let formatedDate = `${year}-${month}-${day}`;

        return new Date(formatedDate);
    }

    /**
     * Изменялись ли поля формы
     *
     * @param formElement
     */
    static isFormChanged(formElement) {
        let hasChanged = false;

        formElement.find(':input').each(function () {
            let input = $(this);

            if (input.hasClass('is-valid') === true || input.hasClass('is-invalid') === true) {
                hasChanged = true;

                return true;
            }
        });

        return hasChanged;
    }

    /**
     * @param number
     * @param accuracy
     */
    static toFixed(number, accuracy = 2) {
        return Number(Math.round(number + 'e' + accuracy) + 'e-' + accuracy);
    }

    /**
     * Вызов окна подтверждения
     *
     * @param element
     *
     * @return {boolean}
     */
    static confirmAction(element) {
        if ($(element).hasClass('confirm')) {
            let confirmMessage = $(element).data('confirm-text');

            if (!confirm(confirmMessage)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Обработка в процессе
     *
     * @param queryType
     *
     * @returns {boolean}
     */
    static isQueryInProgress(queryType) {
        let status = Helper.queriesInProgress[queryType];

        return status === true;
    }

    /**
     * Обработка закрыта
     *
     * @param queryType
     */
    static setQueryComplete(queryType) {
        Helper.queriesInProgress[queryType] = false;
    }

    /**
     * Запуск обработки
     *
     * @param queryType
     */
    static startQuery(queryType) {
        Helper.queriesInProgress[queryType] = true;
    }

    /**
     * Редирект
     *
     * @param url
     */
    static redirectTo(url) {
        window.location.href = url;
    }
}
