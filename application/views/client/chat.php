<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Chat Dashboard</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/styles.css') ?>">
    <script type="text/javascript" src="<?= base_url('assets/jquery.min.js') ?>"></script>
</head>

<body>

    <div id="container">


        <div id="body">
            <p>Silahkan pilih teman:</p>
            <table style="width: 100%" id="table-friend">
                <?php foreach ($notaris->result() as $item) { ?>
                    <tr>
                        <td><a href="javascript:;" data-friend="<?= $item->id_notaris ?>"><?= $item->nama ?></a></td>
                    </tr>
                <?php } ?>
            </table>
            <br />
            <br />
            <a href="<?= site_url('welcome/logout') ?>">Logout</a>
        </div>
    </div>


    <!-- TEMPLATE -->
    <div id="wgt-container-template" style="display: none">
        <div class="msg-wgt-container">
            <div class="msg-wgt-header">
                <a href="javascript:;" class="online"></a>
                <a href="javascript:;" class="name"></a>
                <a href="javascript:;" class="close">x</a>
            </div>
            <div class="msg-wgt-message-container">
                <table width="100%" class="msg-wgt-message-list">
                </table>
            </div>
            <div class="msg-wgt-message-form">
                <textarea name="pesan" placeholder="Type your message. Press Shift + Enter for newline"></textarea>
            </div>
        </div>
    </div>

    <script type="text/x-template" id="msg-template" style="display: none">
        <tbody>
        <tr class="msg-wgt-message-list-header">
            <td rowspan="2"><img src="<?= base_url('assets/avatar.png') ?>"></td>
            <td class="nama"></td>
            <td class="waktu"></td>
        </tr>
        <tr class="msg-wgt-message-list-body">
            <td colspan="2"></td>
        </tr>
        <tr class="msg-wgt-message-list-separator"><td colspan="3"></td></tr>
    </tbody>
</script>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            var chatPosition = [
                false, // 1
                false, // 2
                false, // 3
                false, // 4
                false, // 5
                false, // 6
                false, // 7
                false, // 8
                false, // 9
                false // 10
            ];

            // New chat
            $(document).on('click', 'a[data-friend]', function(e) {
                var $data = $(this).data();
                if ($data.notaris !== undefined && chatPosition.indexOf($data.notaris) < 0) {
                    var posRight = 0;
                    var position;
                    for (var i in chatPosition) {
                        if (chatPosition[i] == false) {
                            posRight = (i * 270) + 20;
                            chatPosition[i] = $data.notaris;
                            position = i;
                            break;
                        }
                    }
                    var tpl = $('#wgt-container-template').html();
                    var tplBody = $('<div/>').append(tpl);
                    tplBody.find('.msg-wgt-container').addClass('msg-wgt-active');
                    tplBody.find('.msg-wgt-container').css('right', posRight + 'px');
                    tplBody.find('.msg-wgt-container').attr('data-chat-position', position);
                    tplBody.find('.msg-wgt-container').attr('data-chat-with', $data.notaris);
                    $('body').append(tplBody.html());
                    initializeChat();
                }
            });

            // Minimize Maximize
            $(document).on('click', '.msg-wgt-header > a.name', function() {
                var parent = $(this).parent().parent();
                if (parent.hasClass('minimize')) {
                    parent.removeClass('minimize')
                } else {
                    parent.addClass('minimize');
                }
            });

            // Close
            $(document).on('click', '.msg-wgt-header > a.close', function() {
                var parent = $(this).parent().parent();
                var $data = parent.data();
                parent.remove();
                chatPosition[$data.chatPosition] = false;
                setTimeout(function() {
                    initializeChat();
                }, 1000)
            });

            var chatInterval = [];

            var initializeChat = function() {
                $.each(chatInterval, function(index, val) {
                    clearInterval(chatInterval[index]);
                });

                $('.msg-wgt-active').each(function(index, el) {
                    var $data = $(this).data();
                    var $that = $(this);
                    var $container = $that.find('.msg-wgt-message-container');

                    chatInterval.push(setInterval(function() {

                        var oldscrollHeight = $container[0].scrollHeight;
                        var oldLength = 0;
                        $.post('<?= site_url('chat/getChats') ?>', {
                            chatWith: $data.chatWith
                        }, function(data, textStatus, xhr) {
                            $that.find('a.nama').text(data.nama);
                            // from last
                            var chatLength = data.chats.length;
                            var newIndex = data.chats.length;
                            $.each(data.chats, function(index, el) {
                                newIndex--;
                                var val = data.chats[newIndex];

                                var tpl = $('#msg-template').html();
                                var tplBody = $('<div/>').append(tpl);
                                var id = (val.id_chat + '_' + val.id + '_' + val.id_notaris).toString();


                                if ($that.find('#' + id_notaris).length == 0) {
                                    tplBody.find('tbody').attr('id_notaris', id_notaris); // set class
                                    tplBody.find('td.nama').text(val.nama); // set name
                                    tplBody.find('td.waktu').text(val.waktu); // set time
                                    tplBody.find('.msg-wgt-message-list-body > td').html(nl2br(val.pesan)); // set message
                                    $that.find('.msg-wgt-message-list').append(tplBody.html()); // append message

                                    //Auto-scroll
                                    var newscrollHeight = $container[0].scrollHeight - 20; //Scroll height after the request
                                    if (newIndex === 0) {
                                        $container.animate({
                                            scrollTop: newscrollHeight
                                        }, 'normal'); //Autoscroll to bottom of div
                                    }
                                }
                            });
                        });
                    }, 1000));

                    $that.find('textarea').on('keydown', function(e) {
                        var $textArea = $(this);
                        if (e.keyCode === 13 && e.shiftKey === false) {
                            $.post('<?= site_url('chat/sendMessage') ?>', {
                                message: $textArea.val(),
                                chatWith: $data.chatWith
                            }, function(data, textStatus, xhr) {});
                            $textArea.val(''); // clear input

                            e.preventDefault(); // stop 
                            return false;
                        }
                    });
                });
            }
            var nl2br = function(str, is_xhtml) {
                var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br ' + '/>' : '<br>'; // Adjust comment to avoid issue on phpjs.org display
                return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
            }


            // on load
            initializeChat();
        });
    </script>

</body>

</html>