<?php 

class Controller {
    public function accessDenied() {
        $view = new View('AccessDenied');
        $view->generate(['title' => 'Accès refusé']);
    }
}