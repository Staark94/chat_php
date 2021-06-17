<?php
    @session_start();
    require 'vendor/autoload.php';

    use Staark\Chat\Database as DB;
    use Staark\Chat\ChatHelper;

    $chat = new DB();
    $chatbox = new ChatHelper();

    if(isset($_GET['send'])) {
        $chatbox->__send();
    }

    if(isset($_GET['update'])) {
        echo json_encode($chatbox->__retrive($_GET['data_send']['from'], $_GET['data_send']['to']));
        exit;
    }

    $_SESSION['user'] = 1;
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-startup-image" href="https://www.wepora.com/asset/img/wepora-logo.png">
        <link rel="icon" type="image/x-icon" href="https://www.wepora.com/asset/img/wepora-logo.png">
        <link rel="stylesheet" href="style.css">
        <meta name="description" content="Wepora is a best Graphics, software and Web Development company  and provides all IT solutions to their client. In india.."/>
        <meta name="Keywords" content="website design | website development | website logo  |  website hosting  | logo design| logo design ideas  | SEO | android |  best software company in india | cheapest | graphic design | Shrikant Kushwaha">
        <meta name="author" content="contain by Wepora team">
        <meta name="copyright" content="Copyright © 2020 Wepora" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <title>Chat - PHP & MySQL</title>
    </head>
    <body>
        <!--content start-->
        <div class="container mt-5 mb-5 p5">
                <div class="h5">Chats</div>
                <br>
                <div class="card">
                    <div class="card-header msg_head">
                    <?php if(isset($_GET['chats'])): ?>
                        <div class="d-flex bd-highlight">
								<div class="img_cont">
									<img src="<?=$chat->getAvatar($_GET['to']); ?>" class="rounded-circle user_img">
									<span class="online_icon"></span>
								</div>
								<div class="user_info">
									<span>Chat with <?=$chat->toUser(); ?></span>
									<p>1767 Messages</p>
								</div>
								<div class="video_cam">
									<span><i class="fas fa-video"></i></span>
									<span><i class="fas fa-phone"></i></span>
								</div>
							</div>
							<span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
							<div class="action_menu">
								<ul>
									<li><i class="fas fa-user-circle"></i> View profile</li>
									<li><i class="fas fa-users"></i> Add to close friends</li>
									<li><i class="fas fa-plus"></i> Add to group</li>
									<li><i class="fas fa-ban"></i> Block</li>
								</ul>
							</div>
                    <?php else: ?> Chats Lists <?php endif; ?></div>
                    <div class="card-body">
                        <?php if(empty($_GET)): ?>
                        <!--  Fetch Chats -->
                        <div class="row">
                        <?php foreach($chat->_chats() as $chats): ?>
                            <div class="col-md col-md-2">
                                <img src="<?=$chats->avatar;?>" alt="" class="user_img" />
                                <strong><a href="?chats&id=<?=$_SESSION['user'];?>&to=<?=$chats->id;?>"><?=$chats->name?></a></strong>
                            </div>
                        <?php endforeach; ?>
                        </div>
                        <!-- END Fetch Chats -->
                        <?php endif; ?>

                        <?php if(isset($_GET['chats']) && $_GET['id'] != 0): ?>
                            <?php require_once 'chat.php'; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <!--content end-->
        <!-- JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    </body>
</html>