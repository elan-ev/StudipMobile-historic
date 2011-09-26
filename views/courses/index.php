<?php

$this->set_layout("layouts/single_page");
$page_title = "Stud.IP - Courses";
$page_id = "courses-index";


#var_dump($courses);
/*
   array
      'sem_nr' => string '1234' (length=4)
      'Name' => string 'Test Lehrveranstaltung' (length=22)
      'Seminar_id' => string '834499e2b8a2cd71637890e5de31cba3' (length=32)
      'sem_status' => string '1' (length=1)
      'status' => string 'autor' (length=5)
      'gruppe' => string '2' (length=1)
      'chdate' => string '1178289956' (length=10)
      'admission_binding' => string '0' (length=1)
      'admission_prelim' => string '0' (length=1)
      'modules' => string '4271' (length=4)
      'sem_number' => string '2' (length=1)
      'sem_number_end' => string '2' (length=1)
      'visible' => string '1' (length=1)
      'visitdate' => string '0' (length=1)
*/

?>

<ul id="courses" data-role="listview" data-filter="true">
    <? foreach ($courses as $course) { ?>
        <li class="course" data-course="<?= $course['Seminar_id'] ?>">
             <h3><?= htmlReady($course['Name']) ?></h3>
 <!--
             <p><strong>This weekend in Maine</strong></p>
             <p>Sounds good, let me check into our plans.</p>
             <p class="ui-li-aside"><strong>6:24</strong>AM</p>
-->
        </li>
    <? } ?>
</ul>
