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
        $this->semester = \SemesterData::GetSemesterArray();
        $this->courses = Course::findAllByUser($this->currentUser()->id);
    }

    function show_action($id = null)
    {

        $this->course = Course::find($id);
        if (!$this->course) {
            throw new Trails_Exception(404);
        }

        if (!$this->course->isAuthorized($this->currentUser()->id)) {
            throw new Trails_Exception(403);
        }
    }
}
