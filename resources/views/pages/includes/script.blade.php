<!-- JS Scripts -->
<script src="{{ asset('theme/socialyte/js/jQuery/jquery-3.4.1.js') }}"></script>
<script src="{{ asset('theme/socialyte/js/libs/jquery.appear.js') }}"></script>
<script src="{{ asset('theme/socialyte/js/libs/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('theme/socialyte/js/libs/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('theme/socialyte/js/libs/jquery.matchHeight.js') }}"></script>
<script src="{{ asset('theme/socialyte/js/libs/svgxuse.js') }}"></script>
<script src="{{ asset('theme/socialyte/js/libs/imagesloaded.pkgd.js') }}"></script>
<script src="{{ asset('theme/socialyte/js/libs/Headroom.js') }}"></script>
<script src="{{ asset('theme/socialyte/js/libs/velocity.js') }}"></script>
<script src="{{ asset('theme/socialyte/js/libs/ScrollMagic.js') }}"></script>
<script src="{{ asset('theme/socialyte/js/libs/jquery.waypoints.js') }}"></script>
<script src="{{ asset('theme/socialyte/js/libs/jquery.countTo.js') }}"></script>
<script src="{{ asset('theme/socialyte/js/libs/popper.min.js') }}"></script>
<script src="{{ asset('theme/socialyte/js/libs/material.min.js') }}"></script>
<script src="{{ asset('theme/socialyte/js/libs/bootstrap-select.js') }}"></script>
<script src="{{ asset('theme/socialyte/js/libs/smooth-scroll.js') }}"></script>
<script src="{{ asset('theme/socialyte/js/libs/selectize.js') }}"></script>
<script src="{{ asset('theme/socialyte/js/libs/swiper.jquery.js') }}"></script>
<script src="{{ asset('theme/socialyte/js/libs/moment.js') }}"></script>
<script src="{{ asset('theme/socialyte/js/libs/daterangepicker.js') }}"></script>
<script src="{{ asset('theme/socialyte/js/libs/fullcalendar.js') }}"></script>
<script src="{{ asset('theme/socialyte/js/libs/isotope.pkgd.js') }}"></script>
<script src="{{ asset('theme/socialyte/js/libs/ajax-pagination.js') }}"></script>
<script src="{{ asset('theme/socialyte/js/libs/Chart.js') }}"></script>
<script src="{{ asset('theme/socialyte/js/libs/chartjs-plugin-deferred.js') }}"></script>
<script src="{{ asset('theme/socialyte/js/libs/circle-progress.js') }}"></script>
<script src="{{ asset('theme/socialyte/js/libs/loader.js') }}"></script>
<script src="{{ asset('theme/socialyte/js/libs/run-chart.js') }}"></script>
<script src="{{ asset('theme/socialyte/js/libs/jquery.magnific-popup.js') }}"></script>
<script src="{{ asset('theme/socialyte/js/libs/jquery.gifplayer.js') }}"></script>
<script src="{{ asset('theme/socialyte/js/libs/mediaelement-and-player.js') }}"></script>
<script src="{{ asset('theme/socialyte/js/libs/mediaelement-playlist-plugin.min.js') }}"></script>
<script src="{{ asset('theme/socialyte/js/libs/ion.rangeSlider.js') }}"></script>
<script src="{{ asset('theme/socialyte/js/libs/leaflet.js') }}"></script>
<script src="{{ asset('theme/socialyte/js/libs/MarkerClusterGroup.js') }}"></script>

<script src="{{ asset('theme/socialyte/js/main.js') }}"></script>
<script src="{{ asset('theme/socialyte/js/libs-init/libs-init.js') }}"></script>
<script defer src="{{ asset('theme/socialyte/fonts/fontawesome-all.js') }}"></script>

<script src="{{ asset('theme/socialyte/Bootstrap/dist/js/bootstrap.bundle.js') }}"></script>

<script src="{{ asset('js/search_people.js') }}"></script>
<script src="{{ asset('js/friend_requests.js') }}"></script>
<script src="{{ asset('js/control_block.js') }}"></script>
<script src="{{ asset('js/notifications.js') }}"></script>
<script src="{{ asset('js/reply_comment.js') }}"></script>
<script src="https://js.pusher.com/5.1/pusher.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="{{ asset('js/functions.js') }}"></script>

<script src="{{ asset('js/preview_image.js') }}"></script>
<script src="{{ asset('js/preview_avatar.js') }}"></script>
<script src="{{ asset('js/preview_cover.js') }}"></script>
<script src="{{ asset('js/view_more_comment.js') }}"></script>
<script src="{{ asset('js/store_comment.js') }}"></script>
<script src="{{ asset('js/update_delete_comment.js') }}"></script>
<script src="{{ asset('js/store_react.js') }}"></script>
<script src="{{ asset('js/store_react_comment.js') }}"></script>
<script>
    function errorMessage() {
        Swal.fire({
            icon: 'error',
            title: "@lang('Oops...')",
            text: "@lang('Something went wrong!')",
        });

        location.reload();
    }

    function errorEmptyContent() {
        Swal.fire({
            icon: 'question',
            text: "@lang('Content can\'t be empty!')",
        });
    }

    function errorImages() {
        Swal.fire({
            icon: 'warning',
            text: "@lang('Please select only images!')",
        });
    }

    function resultNotFound() {
        Swal.fire({
            icon: 'warning',
            text: "@lang('Search result not found..')",
        });
    }
</script>

@yield('script')
