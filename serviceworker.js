const staticmoovingo = "V1"
const assets = [
  "register.php",
  "css/",
  "scripts/"
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


