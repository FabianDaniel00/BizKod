<?php
  function send_message(string $content, string $type, string $location, array $inputs = []) {
    $_SESSION["alert"] = [
      "content" => $content,
      "type" => $type,
    ];
    foreach($inputs as $input) {
      $_SESSION["inputs"][trim(array_search($input, $GLOBALS), " \t.")] = $input;
    }

    header("location: ".$location.".php");
  }
?>
