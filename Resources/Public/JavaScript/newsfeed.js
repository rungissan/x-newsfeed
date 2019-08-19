$(function () {
  $('.newsfeed').each(function () {
    var feed = $(this)
    var imgLoad = new imagesLoaded(feed.find('img').get())

    feed.data('shuffleInstance', new Shuffle(this, {itemSelector: '.newsfeed-item'}))

    imgLoad.on('always', function () {
      feed.data('shuffleInstance').update()
    })
  })
})
