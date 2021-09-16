<!doctype html>
<html lang="ca">
<head>

    <?php if (isset($_GET['subject'])) {
        unset($_SESSION['subject_id']);
        $_SESSION['subject_id'] = $_GET['subject'];
    }?>


    <title>Horari - Pàgina de suport a la gestió de la contractació UAB</title>
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



    </style>
    <script type='text/javascript' src='scripts/jquery-1.4.4.min.js'></script>
    <script type='text/javascript' src='scripts/jquery-ui-1.8.11.custom.min.js'></script>
    <script type="text/javascript" src="scripts/date.js"></script>
    <script type='text/javascript' src='scripts/jquery.weekcalendarView.js'></script>

    <?php require __DIR__ . './controllers/prepare_view.php'; ?>
    <script type='text/javascript'>
        //check usar dias 21 05 2021 lunes, 22 05 2021 martes, 23 05 2021 miercoles, 24 05 2021 jueves, 25 05 2021 viernes
        var aux=1;
        function prepareData(fringe_number){
            for (let x = 0; x< fringe_number; x++ ){

                //console.log(aux);
                eventData.events.push({ //referencia
                    'id': x,
                    'start': new Date(2021, 5,
                        document.getElementById('dia_'+aux).innerText,
                        document.getElementById('hora_inici_'+aux).innerText,
                        document.getElementById('minut_inici_'+aux).innerText),
                    'end': new Date(2021, 5,
                        document.getElementById('dia_'+aux).innerText,
                        document.getElementById('hora_fi_'+aux).innerText,
                        document.getElementById('minut_fi_'+aux).innerText),
                    'title': document.getElementById('tipus_'+aux).innerText
                });
                aux =aux+1;
            }
        }

        const eventData = {
            events: []
            //{'id':3, 'start': new Date( 2021,5,22,11), 'end': new Date(2021,5,22, 13, 35),'title':'TeoriaProva'}
            /*events : [
                {'id':1, 'start': new Date(year, month, day, 12), 'end': new Date(year, month, day, 13, 35),'title':'Lunch with Mike'},
                {'id':2, 'start': new Date(year, month, day, 14), 'end': new Date(year, month, day, 14, 45),'title':'Dev Meeting'},
                {'id':3, 'start': new Date(year, month, day + 1, 18), 'end': new Date(year, month, day + 1, 18, 45),'title':'Hair cut'},
                {'id':4, 'start': new Date(year, month, day - 1, 8), 'end': new Date(year, month, day - 1, 9, 30),'title':'Team breakfast'},
                {'id':5, 'start': new Date(year, month, day + 1, 14), 'end': new Date(year, month, day + 1, 16),'title':'Product showcase'},
                {'id':5, 'start': new Date(year, month, day + 1, 15), 'end': new Date(year, month, day + 1, 17),'title':'Overlay event'}
            ]*/
        };
        $(document).ready(function() {
            prepareData(document.getElementById('count').innerText);
            $('#calendar').weekCalendar({
                data: eventData,
                timeslotsPerHour: 4,
                allowCalEventOverlap: true,
                overlapEventsSeparate: true,
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
<?php $branch_id='';
$branch_id= $_SESSION['branch_id'];
require __DIR__ . './controllers/view_schedule.php'; ?>
</body>
<footer>
    <?php require __DIR__ . './controllers/footer.php';
    //echo $_SESSION['subject_id']?>
</footer>

</html>