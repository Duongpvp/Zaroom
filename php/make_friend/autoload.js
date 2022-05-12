$.ajaxSetup({cache:false});
// Thiết lập thời gian thực vòng lặp 1 giây
setInterval(function() {$('.list_friend').load('list_request_relation.php');}, 1000);