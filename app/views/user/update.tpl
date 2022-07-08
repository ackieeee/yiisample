<div class="user_update_page">
    <form action="/users/{$user->id}/update" method="POST">
        <label for="update_update_username_input" class="form-label">ユーザー名</label>
        <input type="text" class="form-control" id="update_update_username_input" name="name" placeholder="ユーザー名" value="{$user->name}">
        <label for="update_update_email_input" class="form-label">メールアドレス</label>
        <input type="email" class="form-control" id="update_update_email_input" name="email" placeholder="メールアドレス" value="{$user->email}">
        <button type="submit" class="btn btn-primary">更新</button>
    </form>
</div>