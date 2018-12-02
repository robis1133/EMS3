// ==========TIEK DEFINĒTS KEŠATMIŅAS NOSAUKUMS==========
const cacheName = 'v2';

// ==========TIEK IZSAUKTS INSTELĀCIJAS PROCESS==========
self.addEventListener('install', e => {
  console.log('Service Worker: Installed');
});

// ==========TIEK IZSAUKTS AKTIVĀCIJAS PROCESS==========
self.addEventListener('activate', e => {
  console.log('Service Worker: Activated');
  // Remove unwanted caches
  e.waitUntil(
    caches.keys().then(cacheNames => {
      return Promise.all(
        cacheNames.map(cache => {
          if (cache !== cacheName) {
            console.log('Service Worker: Clearing Old Cache');
            return caches.delete(cache);
          }
        })
      );
    })
  );
});

// ==========TIEK IEVĀKTI DATI==========
self.addEventListener('fetch', e => {
  console.log('Service Worker: Fetching');
  e.respondWith(
    fetch(e.request)
      .then(res => {
        // ==========TIEK IZVEIDOTS LAPAS KLONS==========
        const resClone = res.clone();
        // ==========TIEK ATVĒRTA KEŠATMIŅA==========
        caches.open(cacheName).then(cache => {
          // ==========KLONS TIEK PIEVIENOTS KEŠATMIŅAI==========
          cache.put(e.request, resClone);
        });
        return res;
      })
      .catch(err => caches.match(e.request).then(res => res))
  );
});
