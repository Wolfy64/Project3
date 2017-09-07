<?php

require_once '../Controllers/Router.php';
require_once '../Models/UserConnection.php';

class Page
{
    protected $commentsManager;
    protected $userConnection;
    protected $router;

    public function __construct(Router $router, string $methodName)
    {
        $this->commentsManager = new CommentsManager();
        $this->userConnection = new UserConnection();
        $this->router = $router;
    }

    // METHOD BUILD UP TEMPLATE

    /**
     * Build the template of page
     * @param string $body
     * @param $data = null
     * @return Void
     */
    public function template(string $body, $data = null)
    {
        $bodyFile = '../Views/' . $body . '.php';

        if ( !file_exists( $bodyFile ) ){
            $bodyFile = "../Views/Errors/404.php";
        } 

        // Load template config from template.ini
        $config = parse_ini_file('../Config/template.ini');

        require_once $config['head'];
        require_once $config['header'];
        require_once $config['nav'];;
        require_once $bodyFile;
        require_once $config['footer'];;

        // Set $data[] propertie dynamically
        $this->data[] = $data;
    }

    // METHODS PAGES

    /**
     * Built the 404 error page
     * @return Void
     */
    public function error404()
    {
        $this->template('Errors/404');
    }

    /**
     * Built the 500 error page
     * @return Void
     */
    public function error500()
    {
        $this->template('Errors/500');
    }

}