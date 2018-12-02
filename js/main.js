// ==========PĀRBAUDĀM VAI SERVICE WORKER TIEK ATBALSTĪTS==========
if ('serviceWorker' in navigator) {
  navigator.serviceWorker
    .register('./sw_cached_pages.js', { scope: './' })
    .then(function(registration) {
      console.log("Service Worker Registered", registration);
    })
    .catch(function(err) {
      console.log("Service Worker Failed to Register", err);
    })
}
