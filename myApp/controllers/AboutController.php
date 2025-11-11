<?php

class AboutController extends AppController
{
    public function __construct() {
        $this->init();
    }

    public function init() {
        echo $this->render(APP_PATH . VIEWS . 'AboutView.html');
    }
}
