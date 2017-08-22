/**
 * Created by sobhaneskandari on 5/14/17.
 */
// Docs at http://simpleweatherjs.com
$(document).ready(function() {
    $.simpleWeather({
        location: 'Rasht',
        woeid: '',
        unit: 'c',
        success: function(weather) {
            html = weather.temp;
            var windspeed = weather.wind.speed + ' mph';
            var humidity = weather.humidity + '% رطوبت';
            var low = weather.low + ' درجه  ';

            $("#weather").html(html);
            $("#wind").html(windspeed);
            $("#humidity").html(humidity);
            $("#pressure").html(low);
            console.log(windspeed);
        },
        error: function(error) {
            $("#weather").html('<p>'+error+'</p>');
        }
    });

});
