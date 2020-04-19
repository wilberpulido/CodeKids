<?php

use Phalcon\Mvc\Controller;

class HomeController extends Controller
{
    public function homeAction()
    {
        $this->view->setVar('if1', 1);
        $this->view->setVar('if2', 2);
        $this->view->setVar('if3', 3);
        $this->view->setVar('then1', 'Funciona4');
        $this->view->setVar('then2', 'Funciona5');
        $this->view->setVar('then3', 'Funciona6');
        $this->view->render('funciones','ifElse');
        $this->view->finish();
        echo $this->view->getContent();
    }

}