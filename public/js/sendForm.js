$(function() {

    $('#showForecastForm').submit(function(e) {
        var selectType = document.getElementById('exampleInputSelectType');
        var selectZodiacId = document.getElementById('zodiacId');
        var typeId = selectType.value;
        var zodiacId = selectZodiacId.value;


        var formForecast = document.getElementById('showForecastForm');
        formForecast.setAttribute('action', '/forecasts/' + zodiacId + '/' + typeId + '');

    });
});