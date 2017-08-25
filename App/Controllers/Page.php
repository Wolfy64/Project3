<?php

class Page
{
    protected $head   = 'Views/Template/head.php';
    protected $header = 'Views/Template/header.php';
    protected $nav    = 'Views/Template/nav.php';
    protected $body;
    protected $footer = 'Views/Template/footer.php';
    protected $data = [];

    /**
     * Build the template of the page
     * @param string $body
     */
    public function template(string $body, $data = null)
    {
        $this->setBody($body);
        $this->addData($data);
        require_once $this->head;
        require_once $this->header;
        require_once $this->nav;
        require_once $this->body;
        require_once $this->footer;
    }

    /**
     * Defined which file to use for body
     * @param string $body
     */
    public function setBody(string $body)
    {
        if ( file_exists('Views/' . $body . '.php') ){
            $this->body = 'Views/' . $body . '.php';
        } else{
            $this->body = 'Views/404.php';
        }      
    }

    public function addData($data)
    {
        return $this->data[] = $data;
    }
}