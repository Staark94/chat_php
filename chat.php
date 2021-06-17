<?php $chat_rows = $chatbox->__retrive($_GET['id'], $_GET['to']); ?>
<div class="row">
    <div class="col-lg col-md-8">
        <div id="chats" class="card-body msg_card_body">
            <?php foreach($chat_rows as $key => $value): ?>
            <div class="d-flex justify-content-<?php if($value['from'] === $_GET['id']) { $avatar = $chat->getAvatar($_GET['id']); echo 'start'; } else { $avatar = $chat->getAvatar($_GET['to']); echo 'end'; }; ?> mb-4" id="chat_row_<?=$key; ?>">
                <div class="img_cont_msg">
                    <img src="<?=$avatar; ?>" class="rounded-circle user_img_msg">
                </div>
                <div class="msg_cotainer">
                <?=$value['content']; ?>
                <span class="msg_time"><?php echo date("h:i A", strtotime($value['date'])); ?>, Today</span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="input-group">
            <div class="input-group-append">
                <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
            </div>
            <textarea name="content" class="form-control type_msg" placeholder="Type your message..."></textarea>
            
            <div class="input-group-append">
                <input type="hidden" name="from" value="" />
                <input type="hidden" name="to" value="" />
                <span class="input-group-text send_btn"><i class="fas fa-location-arrow" onclick="send();"></i></span>
            </div>
        </div>
    </div>
</div>

<script>
    function send() {
        $.ajax({
            type: 'POST',
            url: "index.php?send=msg",
            data: {
                data_send: {
                    from: <?php echo $_GET['id']; ?>,
                    to: <?php echo $_GET['to']; ?>,
                    content: $('textarea[name="content"]').val()
                }
            },
        }).done(function(e) {
            _conv();
            $('textarea[name="content"]').val("");
        });
    }

    function _conv() {
        var fromUser = <?php echo $_GET["id"]; ?>;
        var toUser = <?php echo $_GET["to"]; ?>;
        
        $.ajax({
            type: 'GET',
            url: "index.php?update&onload=true",
            data: {
                data_send: {
                    from: fromUser,
                    to: toUser
                }
            },
        }).done(function(result) {
            //alert(result);
            document.getElementById('chats').innerHTML = "";
            
            $.each(jQuery.parseJSON(result), function(key, value) {
                if(value.from == <?=$_GET['id']; ?>) {
                    var time = new Date(value.date);
                    let options = {  
                        hour: "2-digit", minute: "2-digit"
                    };

                    document.getElementById('chats').innerHTML += '<div class="d-flex justify-content-start mb-4" id="chat_row_'+ value.id +'">'+
                        '<div class="img_cont_msg">'+
                            '<img src="<?php echo $chat->getAvatar($_GET['id'] ?? $_GET['data_send']['from']); ?>" class="rounded-circle user_img_msg">'+
                        '</div>'+
                        '<div class="msg_cotainer">'+
                            value.content +
                            '<span class="msg_time">'+ time.toLocaleTimeString("en-us", options) +', Today</span>'+
                        '</div>'
                    +'</div>';
                }

                if(value.from == <?=$_GET['to']; ?>) {
                    var time = new Date(value.date);
                    let options = {  
                        hour: "2-digit", minute: "2-digit"
                    };

                    document.getElementById('chats').innerHTML += '<div class="d-flex justify-content-end mb-4" id="chat_row_'+ value.id +'">'+
                    '<div class="msg_cotainer_send">'+
                            value.content +
                            '<span class="msg_time">'+ time.toLocaleTimeString("en-us", options) +', Today</span>'+
                    '</div>'+
                    '<div class="img_cont_msg">'+
                            '<img src="<?php echo $chat->getAvatar($_GET['to'] ?? $_GET['data_send']['to']); ?>" class="rounded-circle user_img_msg">'+
                        '</div>'
                    +'</div>';
                }
            });

            $("#chats").animate({
                scrollTop: $('#chats')[0].scrollHeight - $('#chats')[0].clientHeight
            }, 10);
        });
    }

    window.onload = function() {
        $("#chats").animate({
            scrollTop: $('#chats')[0].scrollHeight - $('#chats')[0].clientHeight
        }, 10);
    };

    setInterval(function() {
        _conv();
        console.log("update");
        $("#chats").animate({
            scrollTop: $('#chats')[0].scrollHeight - $('#chats')[0].clientHeight
        }, 10);
    }, 60 * 3 * 5);
</script>