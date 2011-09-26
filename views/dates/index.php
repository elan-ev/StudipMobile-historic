<?
$this->set_layout("layouts/single_page");
$page_title = "Stud.IP - Meine Termine";
$page_id = "dates-index";
?>

<ul id="dates" data-role="listview" data-filter="true">
    <? foreach ($dates as $date) : ?>
    <li class="dates" data-dates="<?= $date['id'] ?>">
        <?= Assets::img('icons/16/blue/schedule.png', array('class' => 'ui-li-icon')) ?>

        <?= strftime('%x', $date['start']) ?>,
            <?= date('H:i', $date['start']) ?> -
            <?= date('H:i', $date['end']) ?>

        <? if ($date['room']) : ?>
        - <?= $date['room'] ?>
        <? endif ?>
        <br>

        <? if ($date['semname']) : ?>
        <strong><?= $date['semname'] ?></strong><br>
        <?= $date['title'] ?><br>
        <? else : ?>
        <strong><?= $date['title'] ?></strong><br>
        <? endif ?>
    </li>
    <? endforeach ?>
</ul>