$('body').show();
$('.version').text(NProgress.version);
NProgress.configure({ showSpinner: false });
NProgress.start();
setTimeout(function() { NProgress.done(); $('.fade').removeClass('out'); }, 1000);