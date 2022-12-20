<div class="container_onlineUsers">
    <div class="onlineUsers">
        <h1>Online Users</h1>

        <?php if (isset($errors) && (!empty($errors))): ?>
        <p class="error">
            <?="*" . $errors['UserName'] ?>
        </p>
        <?php endif; ?>
    </div>

</div>