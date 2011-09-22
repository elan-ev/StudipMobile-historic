<?
$this->set_layout("layouts/single_page");
$page_title = "Stud.IP - Activity Feed";
?>

Activities::index
<h3>Current User: <?= $controller->currentUser()->username ?></h3>

<a data-role="button" href="<?= $controller->url_for("session/destroy") ?>">logout</a>
