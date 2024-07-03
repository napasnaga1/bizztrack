<?php
require '../Expoo/vendor/autoload.php';


use LucianoTonet\GroqPHP\Groq;

$groq = new Groq('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');

$chatCompletion = $groq->chat()->completions()->create([
  'model'    => 'llama3-8b-8192',
  'messages' => [
    [
      'role'    => 'user',
      'content' => 'presiden indonesia saat ini'
    ],
  ]
]);

echo $chatCompletion['choices'][0]['message']['content'];
?>