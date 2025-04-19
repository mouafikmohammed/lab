window.weatherWidgetConfig = window.weatherWidgetConfig || [];
window.weatherWidgetConfig.push({
   selector: ".weatherWidget",
   apiKey: "J3NYBVUJEPZFZWL5TLL9EAZUU", //Sign up for your personal key
   location: "Morocco", //Enter an address
   unitGroup: "metric", //"us" or "metric"
   forecastDays: 7, //how many days forecast to show
   title: "Morocco", //optional title to show in the 
   showTitle: true,
   showConditions: true
});

(function() {
   var d = document,
      s = d.createElement('script');
   s.src = 'js/weather.js';
   s.setAttribute('data-timestamp', +new Date());
   (d.head || d.body).appendChild(s);
})();