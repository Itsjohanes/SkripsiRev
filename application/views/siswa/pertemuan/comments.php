 
    <style>
        .comment-container {
            margin-bottom: 20px;
        }
        .comment {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #f5f5f5;
        }
        .comment-body {
            margin-bottom: 10px;
        }
        .comment-header {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .reply-container {
            margin-left: 40px;
        }
        .reply-form-container {
            margin-top: 10px;
        }
        .reply-form {
            margin-top: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #f5f5f5;
        }
    </style>
</head>
<div class="container">

    <h2>Add Comment</h2>
    <form action="<?php echo site_url('Pertemuan/save_comment'); ?>" method="post">
        <div class="form-group">
            <input type="hidden" name="id_user" value="<?php echo $user['id']; ?>" required class="form-control">
        </div>
        <div class="form-group">
            <input type="hidden" name="pertemuan" value="<?php echo $pertemuan; ?>" required class="form-control">
        </div>
        <div class="form-group">
            <div class="input-group input-group-outline mb-3">
                <textarea name="comment" placeholder="Comment" required class="form-control"></textarea>
            </div>
        </div>
        <input type="submit" value="Submit" class="btn btn-primary">
    </form>

    <h2>Comments List</h2>
    <?php foreach ($comments as $comment) { ?>
        <div class="comment-container">
            <div class="comment">
                <div class="comment-header">
                    User: <?php echo $comment->nama; ?>
                </div>
                <div class="comment-body">
                    <?php echo nl2br(htmlspecialchars($comment->comment)); ?>
                </div>
                <a href="#" class="reply-btn">Reply</a>
                <div class="reply-form-container" style="display: none;">
                    <form action="<?php echo site_url('Pertemuan/save_reply'); ?>" method="post" class="reply-form">
                        <div class="form-group">
                            <input type="hidden" name="id_user" value="<?php echo $user['id']; ?>" required class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="pertemuan" value="<?php echo $pertemuan; ?>" required class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea name="comment" placeholder="Reply" required class="form-control"></textarea>
                        </div>
                        <input type="hidden" name="parent_id" value="<?php echo $comment->id_comment; ?>">
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
            <div class="reply-container">
                <?php foreach ($comment->replies as $reply) { ?>
                    <div class="comment">
                        <div class="comment-header">
                            User: <?php echo $reply->nama; ?>
                        </div>
                        <div class="comment-body">
                            <?php echo nl2br(htmlspecialchars($reply->comment)); ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</div>

<!-- Tambahkan script JavaScript Bootstrap dan jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $(".reply-btn").click(function(e) {
            e.preventDefault();
            $(this).siblings(".reply-form-container").toggle();
        });
    });
</script>