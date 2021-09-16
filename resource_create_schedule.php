<!doctype html>
<html>
<head>
    <title>Menú - Pàgina de suport a la gestió de la contractació UAB</title>
    <link rel="stylesheet" href='styles/schedule.css'/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <link rel='stylesheet' type='text/css' href='styles/jquery-ui-1.8.11.css' />

    <style type='text/css'>
        body {
            font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
            margin: 0;
        }

        h1 {
            margin: 0 0 1em;
            padding: 0.5em 0.5em 0;
        }

        #message {
            font-size: 0.7em;
            position: absolute;
            top: 1em;
            right: 1em;
            width: 350px;
            display: none;
            padding: 1em;
            background: #ffc;
            border: 1px solid #dda;
        }
    </style>
    <script type='text/javascript' src='scripts/jquery-1.4.4.min.js'></script>
    <script type='text/javascript' src='scripts/jquery-ui-1.8.11.custom.min.js'></script>
    <script type="text/javascript" src="scripts/date.js"></script>
    <script type='text/javascript' src='scripts/jquery.weekcalendar.js'></script>

    <script type='text/javascript'>
        var year = new Date().getFullYear();
        var month = new Date().getMonth();
        var day = new Date().getDate();

        var eventData = {
            events : []
        };
        $(document).ready(function() {
            $('#calendar').weekCalendar({
                data: eventData,
                timeslotsPerHour: 4,
                allowCalEventOverlap: false,
                overlapEventsSeparate: false,
                totalEventsWidthPercentInOneColumn : 95,

                height: function($calendar) {
                    return $(window).height() - $('h1').outerHeight(true);
                },
                eventRender: function(calEvent, $event) {
                     {
                        $event.css('backgroundColor', '#aaa');
                        $event.find('.time').css({
                            backgroundColor: '#999',
                            border:'1px solid #888'
                        });
                    }
                },
                eventNew: function(calEvent, $event) {
                    //displayMessage('<strong>Added event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end);
                },
                eventDrop: function(calEvent, $event) {
                    //displayMessage('<strong>Moved Event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end);
                },
                eventResize: function(calEvent, $event) {
                    //displayMessage('<strong>Resized Event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end);
                },
                eventClick: function(calEvent, $event) {
                    //displayMessage('<strong>Clicked Event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end);
                },
                eventMouseover: function(calEvent, $event) {
                    //displayMessage('<strong>Mouseover Event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end);
                },
                eventMouseout: function(calEvent, $event) {
                    //displayMessage('<strong>Mouseout Event</strong><br/>Start: ' + calEvent.start + '<br/>End: ' + calEvent.end);
                },
                noEvents: function() {
                    //displayMessage('There are no events for this week');
                }
            });

            function displayMessage(message) {
                $('#message').html(message).fadeIn();
            }

            $('<div id="message" class="ui-corner-all"></div>').prependTo($('body'));
        });
    </script>
</head>
<body>
    <?php require __DIR__ . './controllers/create_schedule.php'; ?>
</body>
<footer>
    <?php require __DIR__ . './controllers/footer.php'; ?>
</footer>
<script type="text/javascript" src="scripts/saver.js"></script>
</html>