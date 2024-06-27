<?php

namespace App\Libraries;

class SimpleTools
{
   // This function converts a string into slug format
   public function slugify($text)
   {
      // replace non letter or digits by -
      $text = preg_replace('~[^\pL\d]+~u', '-', $text);

      // transliterate
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

      // remove unwanted characters
      $text = preg_replace('~[^-\w]+~', '', $text);

      // trim
      $text = trim($text, '-');

      // remove duplicate -
      $text = preg_replace('~-+~', '-', $text);

      // lowercase
      $text = strtolower($text);

      if (empty($text)) {
         return 'n-a';
      }

      return $text;
   }

   public function genSimpleRandomCode($length = 12)
   {
      //generate simple random code
      $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $code = substr(str_shuffle($set), 0, $length);

      return $code;
   }

   //rujukan dari https://getridbug.com/php/remove-script-tag-from-html-content/
   //rujukan dari https://www.petanikode.com/codeigniter-xss/
   static function removeTags($html, $tag)
   {
      try {
         /* $dom = new \DOMDocument();
         $dom->loadHTML($html);
         foreach (iterator_to_array($dom->getElementsByTagName($tag)) as $item) {
            $item->parentNode->removeChild($item);
         }
         return $dom->saveHTML(); */

         return preg_replace("/<script.*?\/script>/s", "", $html);
      } catch (\Throwable $th) {
         return $th;
      }
   }

   public function generateLinkId($recordID)
   {
      $randNo = rand(10, 99);
      $maskNo = $randNo * 10000000000;
      $rawLink = ($maskNo + (int)$recordID) * 100;
      $linkID = base_convert($rawLink, 10, 16);
      return $linkID;
   }

   public function extractRecordId($link)
   {
      $rawLink = base_convert($link, 16, 10);
      $rawLink = $rawLink / 100;
      $split = str_split($rawLink, 2);
      $randNo = $split[0];
      $maskNo = (int)$randNo * 10000000000;
      $recordID = $rawLink - $maskNo;
      return $recordID;
      //Bitwise AND
   }
}
