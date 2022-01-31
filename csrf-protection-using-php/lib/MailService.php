<?php
namespace Phppot;

class MailService
{

    function sendContactMail($postValues)
    {
        $name = $postValues["userName"];
        $email = $postValues["userEmail"];
        $subject = $postValues["subject"];
        $content = $postValues["content"];

        $toEmail = "ADMIN EMAIL";
        $mailHeaders = "From: " . $name . "(" . $email . ")\r\n";
        $response = mail($toEmail, $subject, $content, $mailHeaders);

        return $response;
    }
}