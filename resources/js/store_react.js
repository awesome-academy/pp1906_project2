$(document).ready(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('body').on('click', '.btn-react-post-like', function () {
    event.preventDefault();
    var url = 'reacts';
    var like = parseInt($(this).data('react-type'));
    var reactableId = parseInt($(this).data('post-id'));
    var _thisUnLike = $(this).find('.not-like-post');
    var _thisLike = $(this).find('.like-post');

    $.ajax({
            url: url,
            type: 'POST',
            data: {
                'type': like,
                'reactable_id': reactableId,
            },
            cache: false,
            success: function (result) {
                if (result.status) {
                    if (!_thisUnLike.attr('hidden')) {
                        _thisUnLike.attr('hidden', '');
                    } else {
                        _thisUnLike.removeAttr('hidden');
                    }

                    if (_thisLike.attr('hidden')) {
                        _thisLike.removeAttr('hidden');
                    } else {
                        _thisLike.attr('hidden', '');
                    }

                } else {
                    errorMessage();
                }
            },
            error: function () {
                errorMessage();
            }
        });
  });

  $('body').on('click', '.btn-react-post-love', function () {
    event.preventDefault();
    var url = 'reacts';
    var love = parseInt($(this).data('react-type'));
    var reactableId = parseInt($(this).data('post-id'));
    var _thisUnLove = $(this).find('.not-love-post');
    var _thisLove = $(this).find('.love-post');

    $.ajax({
        url: url,
        type: 'POST',
        data: {
            'type': love,
            'reactable_id': reactableId,
        },
        cache: false,
        success: function (result) {
            if (result.status) {
                if (!_thisUnLove.attr('hidden')) {
                    _thisUnLove.attr('hidden', '');
                } else {
                    _thisUnLove.removeAttr('hidden');
                }

                if (_thisLove.attr('hidden')) {
                    _thisLove.removeAttr('hidden');
                } else {
                    _thisLove.attr('hidden', '');
                }

            } else {
                errorMessage();
            }
        },
        error: function () {
            errorMessage();
        }
    });
  });

});
