$(document).ready(function () {
  if ($('.item.prev').hasClass('disabled')) {
    $('.changepage.prev').addClass('disabled')
  } else {
    var prevLink = $('.item.prev').attr('href')
    var prevContent = $('.changepage.prev').html()
    $('.changepage.prev').html('<a href="' + prevLink + '">' + prevContent + '</a>')
  }

  if ($('.item.next').hasClass('disabled')) {
    $('.changepage.next').addClass('disabled')
  } else {
    var nextLink = $('.item.next').attr('href')
    var nextContent = $('.changepage.next').html()
    $('.changepage.next').html('<a href="' + nextLink + '">' + nextContent + '</a>')
  }
})
