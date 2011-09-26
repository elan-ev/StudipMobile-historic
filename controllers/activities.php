<?php

require "StudipMobileController.php";
require dirname(__FILE__) . "/../models/activity.php";

use Studip\Mobile\Activity;

class ActivitiesController extends StudipMobileController
{
    /**
     * custom before filter (see StudipMobileController#before_filter)
     */
    function before()
    {
        # require a logged in User or else redirect to session/new
        $this->requireUser();
    }

    function index_action()
    {
        # just render the template
    }

    function json_action()
    {
        # TODO besser mit trails
        header('Content-Type: application/json');

        $this->render_text(json_encode(Activity::findAllByUser($this->currentUser()->id)));
    }
}
