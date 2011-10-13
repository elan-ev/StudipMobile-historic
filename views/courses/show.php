<?
$this->set_layout("layouts/single_page");
$page_title = "Stud.IP - Course";
$page_id = "courses-show";
?>

<h2><?= htmlReady($course->name) ?></h2>

<!--
<ul id="course-new-content" data-role="listview" style="margin-top: 1.5em; margin-bottom: 1.5em;">
    <li data-theme="a">News<span class="ui-li-count">1</span></li>
    <li data-theme="a">Forumsbeiträge<span class="ui-li-count">3</span></li>
</ul>
-->

<fieldset class="ui-grid-a">
  <div class="ui-block-a">
    <a href="#" data-role="button" data-iconpos="right" data-icon="star" data-theme="b">News</a>
  </div>
  <div class="ui-block-b">
    <a href="#" data-role="button" data-iconpos="right" data-icon="star" data-theme="b">Forum</a>
  </div>

  <div class="ui-block-a">
    <a href="#" data-role="button">Dateien</a>
  </div>
  <div class="ui-block-b">
    <a href="#" data-role="button">Wiki</a>
  </div>
</fieldset>

<? if ($course->subtitle) { ?>
    <h3><?= htmlReady($course->subtitle) ?></h3>
<? } ?>
<? if ($course->description) { ?>
    <div class="description" data-theme="d"><?= htmlReady($course->description) ?></div>
<? } ?>

<!--
<div data-role="collapsible" style="margin-top: 3em;">
    <h3>var_dump</h3>
    <? var_dump($course->old_settings) ?>
</div>
-->
