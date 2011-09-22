$('#activities-index').live("pagecreate", function() {

    // seems that the page loading msg isn't there yet,
    // thus defer the dynamic list fetching
    setTimeout(function() {
        $.mobile.showPageLoadingMsg();

        // for testing the page loading msg
        setTimeout(function () {
            list();
            $.mobile.hidePageLoadingMsg();
        }, 200);
    }, 0);

    function list() {
        var url = STUDIP.ABSOLUTE_URI_STUDIP + "plugins.php/studipmobile/activities/json";
        var template = $("#template-timeline").text().trim();

        $.getJSON(url, function(activities) {
            $.each(activities, function (i, activity) {
                activity.readableTime = readableDate(activity.updated);
            });

            $("#activities")
                .empty()
                .append($.mustache(template, {activities: activities}))
                .listview("refresh");
        });
    }

    function readableDate(unix) {
        var date = new Date(unix * 1000);
        return date.between(Date.parse('today'), Date.parse('tomorrow'))
            ? date.toString('HH:mm')
            : date.toString('dd.MM. HH:mm');
    }
});
