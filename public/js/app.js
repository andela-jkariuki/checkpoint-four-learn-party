$(document).ready(function ()
{
    $("#category_list").select2();
    $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });

    $('a.delete-video').on("click", function (event) {
        event.preventDefault();
        var this_ = $(this);

        swal({
          title: "Are you sure?",
          text: "Your will not be able to recover this Video",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Yes, delete it!",
          closeOnConfirm: false,
          showLoaderOnConfirm: true
        },
        function(){
            $deleteVideo = $.ajax({
                method: 'DELETE',
                'url': this_.attr('href')
            });

            $deleteVideo.done(function (response) {
                if (response.message === "redirect") {
                    window.location = '/dashboard/videos';
                }
            });
        });
    });

    $('#scroll-to-content').on('click', function (event) {
          event.preventDefault();

          $('html,body').animate({
              scrollTop: $('#main-content').offset().top -10
          }, 2000);
    });
});