<?php
namespace App\Lib;

class RequestTool {

   public function createRequest(
      $uri = '/',
      $method,
      $parameters = [],
      $cookies = [],
      $files = [],
      $server = ['CONTENT_TYPE' => 'application/json'],
      $content = null
  ) {
      $request = new \Illuminate\Http\Request;
      return $request->createFromBase(
          \Symfony\Component\HttpFoundation\Request::create(   
              $uri,
              $method,
              $parameters,
              $cookies,
              $files,
              $server,
              $content
          )
      );
  }
}
