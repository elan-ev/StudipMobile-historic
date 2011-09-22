<?
$this->set_layout("layouts/single_page");
$page_title = "Stud.IP - Activity Feed";
$page_id = "activities-index";
?>

Activities::index
<h3>Current User: <?= $controller->currentUser()->username ?></h3>

<a data-role="button" href="<?= $controller->url_for("session/destroy") ?>">logout</a>

<hr style="margin: 1em; visibility: hidden;"/>

<ul id="activities" data-role="listview" data-filter="true">
</ul>

<script id="template-timeline" type="text/x-mustache-tmpl">
  {{#activities}}
  <li class="activity" data-activity="{{id}}">
    <!--
    -->
    <img src="<?= $controller->url_for("avatars/show/{{author_id}}") ?>" alt="{{category}}" class="ui-li-icon" style="padding-top: 20px">
    <img src="<?= $plugin_path ?>/public/images/activities/{{category}}.png" alt="{{category}}" class="ui-li-icon">
    <h3><a href="#">{{title}}</a></h3>
    <p><strong>{{author}}</strong></p>
    <p>{{content}}</p>
    <p class="ui-li-aside"><strong>{{readableTime}}</strong></p>
  </li>
  {{/activities}}
</script>
