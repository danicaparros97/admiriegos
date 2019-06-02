$(document).ready(function () {
    $("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });

    $('#dismiss, .overlay').on('click', function () {
        $('#sidebar').removeClass('active');
        $('.overlay').removeClass('active');
    });

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').addClass('active');
        $('.overlay').addClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
});
document.addEventListener('DOMContentLoaded', function () {
    var calendario = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendario, {
        plugins: [ 'dayGrid', 'timeGrid', 'list', 'interaction' ],
        defaultDate: '2019-04-01',
        editable: true,
        eventLimit: true,
        contentHeight: 'auto', 
        defaultView: 'timeGridWeek',
        events: [{
                title: 'All Day Event',
                start: '2019-04-01'
            },
            {
                title: 'Long Event',
                start: '2019-04-07',
                end: '2019-04-10'
            },
            {
                groupId: 999,
                title: 'Repeating Event',
                start: '2019-04-09T16:00:00'
            },
            {
                groupId: 999,
                title: 'Repeating Event',
                start: '2019-04-16T16:00:00'
            },
            {
                title: 'Conference',
                start: '2019-04-11',
                end: '2019-04-13'
            },
            {
                title: 'Meeting',
                start: '2019-04-12T10:30:00',
                end: '2019-04-12T12:30:00'
            },
            {
                title: 'Lunch',
                start: '2019-04-12T12:00:00'
            },
            {
                title: 'Meeting',
                start: '2019-04-12T14:30:00'
            },
            {
                title: 'Happy Hour',
                start: '2019-04-12T17:30:00'
            },
            {
                title: 'Dinner',
                start: '2019-04-12T20:00:00'
            },
            {
                title: 'Birthday Party',
                start: '2019-04-13T07:00:00'
            },
            {
                title: 'Click for Google',
                url: 'http://google.com/',
                start: '2019-04-28'
            }
        ]
    });

    calendar.render();
});
