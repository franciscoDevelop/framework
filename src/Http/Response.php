<?php

namespace Phpkain\Http;

class Response
{
  /**
   *
   * Response constructor
   *
   */
  private function __construct() {}

  /**
   *
   * Return json response
   * @param mixed $data
   * @return mixed
   */
  public static function json($data)
  {
    return json_encode($data);
  }

  public static function output($data)
  {
    if (!$data) {
      return;
    }
    if (!is_string($data)) {
      $data = static::json($data);
    }
    echo $data;
  }
}
