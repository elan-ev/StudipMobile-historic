<?php

class StudipMobile extends StudipPlugin implements SystemPlugin
{
    /**
     * plugin template factory
     */
    protected $template_factory;

    /**
     * Initialize a new instance of the plugin.
     */
    public function __construct()
    {

        global $user;

        parent::__construct();

        $template_path = $this->getPluginPath() . '/templates';
        $this->template_factory = new Flexi_TemplateFactory($template_path);

        if (!is_object($user) || $user->id == 'nobody') {
            return;
        }

    }

    private function check_user_access()
    {
        global $template_factory;

        $username = $_SERVER['PHP_AUTH_USER'];
        $password = $_SERVER['PHP_AUTH_PW'];

        if (isset($username) && isset($password)) {
            $result = StudipAuthAbstract::CheckAuthentication($username, $password);
        }

        if (isset($result) && $result['uid'] !== false) {
            $user_id = get_userid($username);
        } else {
            header('WWW-Authenticate: Basic realm="Stud.IP Login"');
            header('HTTP/1.1 401 Unauthorized');

            $exception = new AccessDeniedException('invalid password');
            echo $template_factory->render('access_denied_exception', compact('exception'));
        }

        return $user_id;
    }

    public function show_action()
    {
        global $user;

        // does not return
        $user_id = $this->check_user_access();

        var_dump($user_id);

    }

    /**
     * This method dispatches and displays all actions. It uses the template
     * method design pattern, so you may want to implement the methods #route
     * and/or #display to adapt to your needs.
     *
     * @param  string  the part of the dispatch path, that were not consumed yet
     *
     * @return void
     */
    function perform($unconsumed_path) {
        $trails_root = $this->getPluginPath();
        $dispatcher = new Trails_Dispatcher($trails_root, rtrim(PluginEngine::getURL($this, null, ''), '/'), 'session');
        $dispatcher->plugin = $this;
        $dispatcher->dispatch($unconsumed_path);
    }
}
