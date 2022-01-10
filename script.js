(function () {
    var conn = new WebSocket('ws://localhost:8080/chat'),
        input = document.getElementById('echo-input'),
        output = document.getElementById('echo-output');

    conn.onmessage = function (e) {
        output.value = output.value + e.data.trim() + '\n';
    };

    conn.onopen = function () {
        conn.send('Echo started.');
    };

    document.getElementById('echo-send').addEventListener('click', function () {
        if (input.value.trim().length) {
            conn.send(input.value.trim());
            input.value = '';
        }
    });
})();