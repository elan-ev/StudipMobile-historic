console.log($('#activities-index'));
$('#activities-index').live("pagecreate", function() {

    console.log("show");
    $.mobile.showPageLoadingMsg();

    var activities;

    function readableDate(unix) {
        var date = new Date(unix * 1000);
        return date.between(Date.parse('today'), Date.parse('tomorrow'))
            ? date.toString('HH:mm')
            : date.toString('dd.MM. HH:mm');
    }

    function list() {
        var ul = $("#activities").empty();
        var url = STUDIP.ABSOLUTE_URI_STUDIP + "plugins.php/studipmobile/activities/json";
        var template = $("#template-timeline").text().trim();

        console.log(url);
        $.getJSON(url, function(json) {
            $.each(json, function (i, activity) {
                activity.readableTime = readableDate(activity.updated);
            });
            activities = json;

            ul.append($.mustache(template, {activities: activities})).listview("refresh");
        });
    }

    list();


});
