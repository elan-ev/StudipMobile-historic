<?php

class StudipMobileController extends Trails_Controller
{

    /**
     * Applikationsübergreifender before_filter mit Trick:
     *
     * Controller-Methoden, die mit "before" anfangen werden in
     * Quellcode-Reihenfolge als weitere before_filter ausgeführt.
     * Geben diese FALSE zurück, bricht Trails genau wie beim normalen
     * before_filter ab.
     */
    function before_filter(&$action, &$args)
    {
        $this->plugin_path = URLHelper::getURL($this->dispatcher->plugin->getPluginPath());

        # call before filters
        foreach (get_class_methods($this) as $filter) {
            if ($filter !== "before_filter" && !strncasecmp("before", $filter, 6)) {
                if (FALSE === call_user_func(array($this, $filter), $action, $args)) {
                    return FALSE;
                }
            }
        }
    }

    /**
     * Return currently logged in user
     */
    function currentUser()
    {
        global $user;

        if (!is_object($user) || $user->id == 'nobody') {
            return null;
        }

        return $user;
    }


    /**
     * Helper method to ensure a logged in user
     */
    function requireUser()
    {
        if (!$this->currentUser()) {
            # TODO (mlunzena): store_location
            $this->flash["notice"] = "You must be logged in to access this page";
            $this->redirect("session/new");
            return FALSE;
        }
    }
}
