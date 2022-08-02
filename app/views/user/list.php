<div class="mt-5">
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>ユーザ名</th>
                <th>メールアドレス</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user->id ?></td>
                    <td><?= $user->name ?></td>
                    <td><?= $user->email ?></td>
                    <td>
                        <button onclick="location.href='/users/<?php echo $user->id ?>/update'" class="btn btn-primary">更新</button>
                        <button onclick="location.href='/users/<?php echo $user->id ?>/delete'" class="btn btn-danger">削除</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
