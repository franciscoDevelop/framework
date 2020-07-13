<?php

/**
 *
 * View render
 * @param string $path
 * @param array $data
 * @return mixed
 */
if (! function_exists('view')) {
  function view($path, $data = [])
  {
    return Phpkain\View\View::render($path, $data);
  }
}

/**
 *
 * Request get
 * @param string $key
 * @return mixed
 */
if (! function_exists('request')) {
  function request($key)
  {
    return Phpkain\Http\Request::value($key);
  }
}

/**
 *
 * Redirect
 * @param string $path
 * @return mixed
 */
if (! function_exists('redirect')) {
  function redirect($path)
  {
    return Phpkain\Url\Url::redirect($path);
  }
}

/**
 *
 * Previous
 * @return mixed
 */
if (! function_exists('previous')) {
  function previous()
  {
    return Phpkain\Url\Url::previous();
  }
}

/**
 *
 * Url path
 * @param string $path
 * @return mixed
 */
if (! function_exists('url')) {
  function url($path)
  {
    return Phpkain\Url\Url::path($path);
  }
}

/**
 *
 * Full url path
 * @param string $path
 * @return mixed
 */
if (! function_exists('checkactive')) {
  function checkactive($path)
  {
    if (\Phpkain\Http\Request::url() == $path) {
      echo 'active';
    } else {
      echo '';
    }
  }
}

/**
 *
 * Asset path
 * @param string $path
 * @return mixed
 */
if (! function_exists('asset')) {
  function asset($path)
  {
    return Phpkain\Url\Url::path($path);
  }
}

/**
 *
 * Dump and die
 * @param string $data
 * @return void
 */
if (! function_exists('dd')) {
  function dd($data)
  {
    echo "<pre>";
    if (is_string($data)) {
      echo $data;
    } else {
      print_r($data);
    }
    echo "</pre>";
    die();
  }
}

/**
 *
 * Get session data
 * @param string $data
 * @return string $data
 */
if (! function_exists('session')) {
  function session($key)
  {
    return Phpkain\Session\Session::get($key);
  }
}

/**
 *
 * Get session flash data
 * @param string $data
 * @return string $data
 */
if (! function_exists('flash')) {
  function flash($key)
  {
    return Phpkain\Session\Session::flash($key);
  }
}

/**
 *
 * Show pagination links
 * @param string $current_page
 * @param string $pages
 * @return string
 */
if (! function_exists('links')) {
  function links($current_page, $pages)
  {
    return Phpkain\Database\Database::links($current_page, $pages);
  }
}

/**
 *
 * Table auth
 * @param string $table
 * @return string
 */
if (! function_exists('auth')) {
  function auth($table)
  {
    $auth = \Phpkain\Session\Session::get($table) ?: \Phpkain\Cookie\Cookie::get($table);
    return \Phpkain\Database\Database::table($table)->where('id', '=', $auth)->first();
  }
}
