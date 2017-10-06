<?php

/*
 * This file is part of the Slim API skeleton package
 *
 * Copyright (c) 2016 Mika Tuupola
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * Project home:
 *   https://github.com/tuupola/slim-api-skeleton
 *
 */

namespace App;

use App\Todo;
use League\Fractal;

class TodoTransformer extends Fractal\TransformerAbstract
{

    public function transform($todo)
    {
      return [
          'id'      => (int) $todo['id'],
          'title'   => $todo['title'],
          'year'    => (int) $todo['yr'],
          'author'  => [
            'name'  => $todo['author_name'],
            'email' => $todo['author_email'],
          ],
          'links'   => [
              [
                  'rel' => 'self',
                  'uri' => '/todos/'.$todo['id'],
              ]
          ]
      ];
    }
}
