(function() {

    var bar = $('.progress-bar');

    $('form').ajaxForm({
        beforeSend: function() {
            var percentVal = '0%';
            bar.width(percentVal)
        },
        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal)
        },
        success: function() {
            var percentVal = '100%';
            bar.width(percentVal);
            setTimeout(function() {
                window.location.href = './download.php';
            }, 1500);
        },
        complete: function(xhr) {}
    });

})();