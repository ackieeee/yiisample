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
            {foreach from=$users item=$user}
                <tr>
                    <td>{$user->id}</td>
                    <td>{$user->name}</td>
                    <td>{$user->email}</td>
                    <td>
                        <button onclick="location.href='/users/{$user->id}/update'" class="btn btn-primary">更新</button>
                        <button onclick="location.href='/users/{$user->id}/delete'" class="btn btn-danger">削除</button>
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>
{*  <ul>*}
{*    {foreach from=$users item=$user}*}
{*      <li>{$user->name}</li>*}
{*    {/foreach}*}
{*  </ul>*}
</div>