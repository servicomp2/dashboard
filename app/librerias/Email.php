<?php

class Email
{
    private $smtpServer;
    private $port;
    private $username;
    private $password;
    private $socket;

    public function __construct()
    {
        $this->smtpServer = ""; //Servidor del SMTP
        $this->port = ""; //Puerto de salida
        $this->username = ""; //Usuario = correo electrónico
        $this->password = ""; //Clave del correo electrónico
    }

    private function sendCommand($command, $expectedResponse)
    {
        fputs($this->socket, $command . "\r\n");
        $response = '';
        while ($str = fgets($this->socket, 512)) {
            $response .= $str;
            if (substr($str, 3, 1) == ' ') {
                break;
            }
        }
        if (strpos($response, $expectedResponse) === false) {
            throw new Exception("Error: Expected response not received. Command: $command, Response: $response");
        }
    }

    private function connect()
    {
        $this->socket = fsockopen($this->smtpServer, $this->port, $errno, $errstr, 30);
        if (!$this->socket) {
            throw new Exception("Error: Could not connect to SMTP server. $errstr ($errno)");
        }
        $response = fgets($this->socket, 512);
        if (strpos($response, '220') === false) {
            throw new Exception("Error: Expected response not received. Response: $response");
        }
        $this->sendCommand("EHLO " . $this->smtpServer, "250");
        $this->sendCommand("STARTTLS", "220");

        // Enable encryption for the socket
        if (!stream_socket_enable_crypto($this->socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT)) {
            throw new Exception("Error: Unable to start TLS encryption");
        }

        $this->sendCommand("EHLO " . $this->smtpServer, "250");
        $this->sendCommand("AUTH LOGIN", "334");
        $this->sendCommand(base64_encode($this->username), "334");
        $this->sendCommand(base64_encode($this->password), "235");
    }

    private function disconnect()
    {
        $this->sendCommand("QUIT", "221");
        fclose($this->socket);
    }

    public function send($to, $subject, $message, $headers = '')
    {
        $this->connect();

        $this->sendCommand("MAIL FROM: <" . $this->username . ">", "250");
        $this->sendCommand("RCPT TO: <" . $to . ">", "250");
        $this->sendCommand("DATA", "354");

        $headers .= "From: " . $this->username . "\r\n";
        $headers .= "To: " . $to . "\r\n";
        $headers .= "Subject: " . $subject . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        $data = $headers . "\r\n\r\n" . $message . "\r\n.";
        $this->sendCommand($data, "250");

        $this->disconnect();
    }
}
