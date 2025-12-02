/**
 * Класс для отображения универсальной кнопки загрузки
 *
 * Для установи своего текста загрузки нужно задать свойство - data-load-text="<text>"
 */
class AnimatedButton
{
    static loaderIcon = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>\n';
    static errorIcon = '<span class="text-danger"><i class="fas fa-times"></i></span>';
    static successIcon = '<span class="text-mint"><i class="fas fa-check"></i></span>';

    /**
     * @param selector
     */
    constructor(selector) {
        this.button = selector;
        this.defoultText = this.button.html();
        this.loadText = this.#getLoadText()
        this.sucessText = this.#getSuccessText()
    }

    /**
     * Отображение загрузки
     */
    setLoad() {
        this.disableButton()

        let loadedText = AnimatedButton.loaderIcon;

        if (this.loadText !== '') {
            loadedText = loadedText + `&nbsp;` + this.loadText;
        }

        if (loadedText === '') {
            loadedText = loadedText + '...';
        }

        this.button.html(loadedText);
    }

    /**
     * Отображение текста по умолчанию
     */
    setDefault() {
        this.enableButton()
        this.button.html(this.defoultText);
    }

    setErrorIcon() {
        this.enableButton()
        this.button.html(AnimatedButton.errorIcon);
    }

    setSuccessIcon() {
        this.enableButton()
        this.button.html(AnimatedButton.successIcon);
    }

    /**
     * Отображение успешного текста
     */
    setSuccess() {
        this.button.html(this.sucessText);
    }

    enableButton() {
        this.button.removeAttr('disabled');
    }

    disableButton() {
        this.button.attr('disabled', 'disabled');
    }

    /**
     * Успешный текст
     *
     * @returns {string}
     */
    #getSuccessText() {

        let loadMessage = this.button.data('success-text');

        if (loadMessage !== undefined) {
            return loadMessage;
        }

        return 'Успешно';
    }

    /**
     * Текст загрузки
     *
     * @returns {string}
     */
    #getLoadText() {
        let loadMessage = this.button.data('load-text');

        if (loadMessage !== undefined) {
            return  loadMessage;
        }

        return 'Обработка';
    }
}