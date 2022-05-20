<?php
  /**
   * Sets the message in the session and redirect to the $location.
   *
   * Sets the inputs in the session to keep the inputs value in the template.
   */
  function send_message(string $content, string $type, string $location, array $inputs = []) {
    $_SESSION["alert"] = [
      "content" => $content,
      "type" => $type,
    ];

    foreach($inputs as $input) {
      // Get the variable name as string
      $_SESSION["inputs"][trim(array_search($input, $GLOBALS), " \t.")] = $input;
    }

    header("Location: ".$location.".php");
  }
?>
