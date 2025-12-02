var socket = null;

const actionSubscribe = 'subscribe';
const actionPushServer = 'pushToServer';
const actionPushClients = 'pushToClients';

$(document).ready(function () {
    let reconnectTimeout = 30000 //30 sec

    updateSocketConnection(socketUrl, socketPort);

    setInterval(function () {
        if (socket === null) {
            updateSocketConnection(socketUrl, socketPort);
        } else {
            console.log(`Socket status OK`);
        }
    }, reconnectTimeout)
})

/**
 * Init socket connection
 *
 * @param socketUrl
 * @param socketPort
 */
function updateSocketConnection(socketUrl, socketPort) {
    let protocol = location.protocol === 'https:' ? 'wss' : 'ws';

    let socketServerUrl = `${protocol}://${socketUrl}:${socketPort}`;

    console.log(`Trying connect to socket ${socketServerUrl}`);

    socket = new WebSocket(socketServerUrl);

    /**
     * Process socket open
     */
    socket.onopen = function () {
        console.log(`Successfully connect to socket ${socketServerUrl}`);

        $(document).trigger('socket.ready');
    };

    /**
     * Process socket close
     *
     * @param event
     */
    socket.onclose = function (event) {
        console.log(`Close connect to socket ${socketServerUrl}`);

        $(document).trigger('socket.close', {event: event});

        socket = null;
    };

    /**
     * Process socket error
     *
     * @param event
     */
    socket.onerror = function (event) {
        console.log(`Error in socket ${socketServerUrl}`);

        $(document).trigger('socket.error', {event: event});

        socket = null;
    };

    /**
     * Trigger received event client calback (socket.event:<event>)
     *
     * @param event
     */
    socket.onmessage = function (event) {
        let serverMessage = JSON.parse(event.data);
        let frontEventName = `socket.event:${serverMessage.event}`;

        $(document).trigger(frontEventName, serverMessage);
    };
}

/**
 * Subscribe to event
 *
 * @param event
 *
 * @returns {boolean}
 */
function subscribe(event) {
    let message = wsFormEventMessage(actionSubscribe, event);

    return wsSend(message);
}

/**
 * Push event to server queue
 *
 * @param event
 * @param content
 *
 * @returns {boolean}
 */
function pushToServer(event, content) {
    let message = wsFormEventMessage(actionPushServer, event, content);

    return wsSend(message);
}

/**
 * Push event to another clients
 *
 * @param event
 * @param content
 *
 * @returns {boolean}
 */
function pushToClients(event, content) {
    let message = wsFormEventMessage(actionPushClients, event, content);

    return wsSend(message);
}

/**
 * Form event data
 *
 * @param action
 * @param event
 * @param content
 *
 * @returns {{data: {}, action, event}}
 */
function wsFormEventMessage(action, event, content = {}) {
    return {
        action: action,
        event: event,
        data: content
    };
}

/**
 * Send message to ws server
 *
 * @param message from wsFormEventMessage
 *
 * @returns {boolean}
 */
function wsSend(message) {
    if (socket === null) {
        console.log('Files send message - Socket not connected');

        return false;
    }

    socket.send(JSON.stringify(message));

    return true;
}
