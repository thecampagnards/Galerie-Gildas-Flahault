$(document).ready(function () {
    if($('.item.prev').hasClass('disbled')) {
        $('.changepage.prev').addClass('disbled')
    } else {
        $prev_link = $('.item.prev').attr('href')
        $prev_content = $('.changepage.prev').html()
        $('.changepage.prev').html('<a href="' + $prev_link + '">' + $prev_content + '</a>')
    }

    if($('.item.next').hasClass('disbled')) {
        $('.changepage.next').addClass('disbled')
    } else {
        $next_link = $('.item.next').attr('href')
        $next_content = $('.changepage.next').html()
        $('.changepage.next').html('<a href="' + $next_link + '">' + $next_content + '</a>')
    }
})