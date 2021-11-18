const staticmoovingo = "Doom"
const assets = [
  "/",
  "/mapage.php",
  "./css/style.css",
  "/scriptes/app.js",
  "/css/img/logodj2.png",
  
]

self.addEventListener("install", installEvent => {
  installEvent.waitUntil(
    caches.open(staticmoovingo).then(cache => {
      cache.addAll(assets)
    })
  )
})


self.addEventListener("fetch", fetchEvent => {
    fetchEvent.respondWith(
      caches.match(fetchEvent.request).then(res => {
        return res || fetch(fetchEvent.request)
      })
    )
  })