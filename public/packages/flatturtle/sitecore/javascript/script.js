// Exists method
jQuery.fn.exists = function(){return this.length>0;}

$(document).ready(function(){

    // Carousel
    $('.carousel').carousel({
        interval: 5000
    });

    // Open external links in new window
    $("a[href^='http']").not("[href*='" + location.hostname + "']").attr('target', '_blank');

    /*
    |--------------------------------------------------------------------------
    | Reservations
    |--------------------------------------------------------------------------
    */
    if ($('#reservations').exists())
    {
        // Some "global" data
        var cluster = $('#reservations').data('cluster');
        var things; // all things
        var thing; // current thing
        var timeline_start = 0; // timepicker start
        var timeline_end = 86400; // timepickser end

        // Datepicker
        $('.date').datepicker({
            dateFormat: 'yy-mm-dd',
            firstDay: 1
        });

        // Re-highlight "done" parts
        var wasDoneOnHover = false;
        $('#reservations > div > div').hover(function()
        {
            if ($(this).hasClass('done'))
            {
                wasDoneOnHover = true;
                $(this).removeClass('done');
            }
        },
        function()
        {
            if (wasDoneOnHover)
            {
                wasDoneOnHover = false;
                $(this).addClass('done');
            }
        });


        // Get reservable things
        $.getJSON("https://reservations.flatturtle.com/" + cluster + "/things", function(data)
        {
            var things = data;

            // Add thing labels
            for (var i in data)
            {
                var thing = data[i];

                // Create label
                var label = $('<span class="label">' + thing.name + '</span>');

                // Set data
                label.attr('data-name', thing.name);
                label.attr('data-type', thing.type);

                // Add label
                $('#reservations #things').append(label);
            }


            // Thing click event
            $('#reservations #things .label').click(function()
            {
                // Set thing
                for (var i in things)
                {
                    if (things[i].name == $(this).data('name'))
                    {
                        thing = things[i];
                    }
                }

                // Mark thing
                $('#reservations #things .label').removeClass('colorful');
                $(this).addClass('colorful');

                showAvailability();

                // Show date picker
                $('#reservations #datepicker').slideDown('slow', function()
                {
                    // Mark as done
                    $('#reservations #things').addClass('done');
                });

            });


            // Date change event
            $('#reservations #datepicker input').change(function()
            {
                showAvailability();

                // Add some color
                $('#reservations #datepicker input').addClass('colorful');

                // Show datepicker
                $('#reservations #timepicker').slideDown('slow', function()
                {
                    // Mark as done
                    $('#reservations #datepicker').addClass('done');
                });
            });


            // Time change event
            $('#reservations #timepicker input').change(function()
            {
                var from = $('#reservations #timepicker #from').val();
                if (!from) return;

                var to = $('#reservations #timepicker #to').val();
                if (!to) return;

                showSelection();

                // Show details
                $('#reservations #details').slideDown('slow', function()
                {
                    // Mark as done
                    $('#reservations #timepicker').addClass('done');
                });
            });


            $('#reservations #details button').click(function()
            {
                var from = $('#reservations #timepicker #from').val();
                var to = $('#reservations #timepicker #to').val();
                var date = $('#reservations #datepicker input').val();

                // Form data
                data = {
                    name:       thing.name,
                    type:       thing.type,
                    cluster:    cluster,
                    company:    $('#reservations input#company').val(),
                    email:      $('#reservations input#email').val(),
                    subject:    $('#reservations input#subject').val(),
                    from:       date + " " + from,
                    to:         date + " " + to,
                    comment:    $('#reservations textarea#comment').val(),
                }

                // Clear error message
                $('#reservations #details #message').removeClass('error').removeClass('success').html('');

                // Send data to "proxy"
                $.ajax
                ({
                    type: "POST",
                    url: "reserve",
                    data: data,
                    dataType: "json",
                    success: function(response)
                    {
                        // Set success message
                        $('#reservations #details #message').addClass('success').html(response.message);
                    },
                    error: function(response)
                    {
                        // Get JSON exception
                        exception = response.responseJSON;

                        if (exception && exception.error && exception.error.message)
                        {
                            $('#reservations #details #message').addClass('error').html(exception.error.message);
                        }
                        else
                        {
                            // Fallback
                            $('#reservations #details #message').addClass('error').html("Something went wrong");
                        }
                    }
                });
            });


            /**
             * Display the availability on the timepicker
             */
            function showAvailability()
            {
                var date = $('#reservations #datepicker input').val();
                if (!date) return;

                // Remove existing blocks
                $('#reservations #timepicker #bar span').remove();

                // Remove existing labels
                $('#reservations #timepicker #labels span').remove();

                // Monday is first day of the week
                var dotw  = new Date(date).getDay();
                dotw = dotw > 0 ? dotw - 1 : 6;

                // Get opening hours
                var hours = thing.opening_hours[dotw];

                // Convert start and end to seconds
                opens = convertTime(hours.opens[0]);
                closes = convertTime(hours.closes[hours.closes.length - 1]);

                // Round opening hours
                timeline_start = Math.floor(opens / 3600) * 3600;
                timeline_end = Math.ceil(closes / 3600) * 3600;

                // Draw disabled regions
                for (var i in hours.opens)
                {
                    if (i == 0)
                    {
                        // first block
                        drawBlock(timeline_start, hours.opens[i], 'disabled');
                    }
                    else if (i == hours.opens.length - 1)
                    {
                        // last block
                        drawBlock(hours.closes[i], timeline_end, 'disabled');
                    }
                    if (i > 0)
                    {
                        drawBlock(hours.closes[i-1], hours.opens[i], 'disabled');
                    }
                }

                // Add time labels
                for (var i=timeline_start; i<= timeline_end; i+=3600)
                {
                    hour = Math.floor(i / 3600);
                    perc = (i-timeline_start) / (timeline_end-timeline_start) * 100;

                    var label = $('<span>' + hour + ':00</span>');
                    label.css('left', perc + '%');

                    $('#reservations #timepicker #labels').append(label);
                }

                // Get existing reservations
                $.getJSON("https://reservations.flatturtle.com/" + cluster + "/things/" + thing.name + "/reservations?day=" + date, function(data)
                {
                    // Loop existing reservations
                    for (var i in data)
                    {
                        var reservation = data[i];
                        var from = new Date(reservation.from);
                        var to   = new Date(reservation.to);

                        // Draw reservation
                        drawBlock(from, to);
                    }
                });

                // Draw user selection
                showSelection();
            }


            /**
             * Show the user selection on the timepicker
             */
            function showSelection()
            {
                var from = $('#reservations #timepicker #from').val();
                if (!from) return;

                var to = $('#reservations #timepicker #to').val();
                if (!to) return;

                // Remove existing selection
                $('#reservations #timepicker #bar .selection').remove();

                // Draw selection
                drawBlock(from, to, 'selection colorful');
            }


            /**
             * Draw a time block on the timepicker
             */
            function drawBlock(from, to, style)
            {
                // Convert time to seconds
                from = convertTime(from);
                to = convertTime(to);

                // No out of bounds
                if (from < timeline_start)
                {
                    from = timeline_start;
                }
                if (to > timeline_end)
                {
                    to = timeline_end;
                }

                if (from == to)
                {
                    // Don't draw blocks that you can't see
                    return;
                }

                // Convert to percentages
                from = (from-timeline_start) / (timeline_end-timeline_start) * 100;
                to = (to-timeline_start) / (timeline_end-timeline_start) * 100;

                var block = $('<span></span>');
                block.css('left', from + '%');
                block.css('width', (to - from) +'%');

                // Add optional class
                if (style)
                {
                    block.addClass(style);
                }

                // Add block to timepicker
                $('#reservations #timepicker #bar').append(block);
            }


            /**
             * Convert a time string or object to seconds since the beginning of the day
             */
            function convertTime(time)
            {
                if (typeof time == 'string')
                {
                    parts = time.split(':');
                    seconds = parts[0] * 60*60 + parts[1] * 60;
                }
                else if (time instanceof Date)
                {
                    seconds = time.getTime() % (86400 * 1000) / 1000;
                }

                return seconds;
            }


        });
    }

});
