<?php

require "StudipMobileController.php";
require dirname(__FILE__) . "/../models/course.php";

use Studip\Mobile\Course;

class CoursesController extends StudipMobileController
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
        $this->courses = Course::findAllByUser($this->currentUser()->id);
    }
}
