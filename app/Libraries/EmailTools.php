<?php

namespace App\Libraries;

class EmailTools
{
   public function sendMail($mailTemplate = null, $to = array(), $cc = array(), $subject = null, $mailContent = array())
   {
      $config['protocol'] = 'smtp';
      $config['SMTPHost'] = 'postmaster.mygovuc.gov.my';
      $config['SMTPUser'] = '';
      $config['SMTPPass'] = '';
      $config['SMTPPort'] = 25;
      $config['charset'] = 'utf-8';
      $config['mailType'] = 'html';
      $config['newline'] = "\r\n";

      $email = \Config\Services::email(); // loading for use

      $email->initialize($config);

      $email->setFrom("donotreply@mardi.gov.my", NAMA_SISTEM);

      $email->setTo($to);

      if (!is_null($cc)) $email->setCC($cc);

      $email->setSubject($subject);

      // Using a custom template
      $template = view("EmailTemplate/" . $mailTemplate, $mailContent);

      $email->setMessage($template);

      // Send email
      if ($email->send()) {
         return true;
      } else {
         $data = $email->printDebugger(['headers']);
         print_r($data);
      }
   }
}
