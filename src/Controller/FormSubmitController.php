<?php

namespace Drupal\formsubmit\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;

/**
 * A form submit controller.
 */
class FormSubmitController extends ControllerBase
{

  /**
   * Returns a render-able array for a test page.
   */
  public function data()
  {
    $request = Request::createFromGlobals();
    $request->getPathInfo();
    $name = $request->query->get('name');
    $message = $request->query->get('message');
    $to = $request->query->get('to');


    $result = formsubmit_mail($name, $message, $to);

    $build = [
      '#markup' => $this->t('Hello World ') . $name . '! <p>' . $result . '</p>',
    ];
    return $build;
  }
}
