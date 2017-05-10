$(document).ready(function () {
  if ($('.item.prev').hasClass('disbled')) {
    $('.changepage.prev').addClass('disbled')
  } else {
    var prevLink = $('.item.prev').attr('href')
    var prevContent = $('.changepage.prev').html()
    $('.changepage.prev').html('<a href="' + prevLink + '">' + prevContent + '</a>')
  }

  if ($('.item.next').hasClass('disbled')) {
    $('.changepage.next').addClass('disbled')
  } else {
    var nextLink = $('.item.next').attr('href')
    var nextContent = $('.changepage.next').html()
    $('.changepage.next').html('<a href="' + nextLink + '">' + nextContent + '</a>')
  }
})
